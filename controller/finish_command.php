<?php
session_start();
if (isset($_POST['user']) && isset($_POST['client'])){
    $_SESSION['seller'] = $_POST['user'];
    $_SESSION['client'] = $_POST['client'];
}
include '../config/database.php';
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
// If there are products in cart
if ($products_in_cart) {
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id IN (' . $array_to_question_marks . ')');
    $stmt->execute(array_keys($products_in_cart));
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
/* $sql = "SELECT MAX(numero_facture) FROM operation"; */
$req1 = $pdo->prepare('SELECT * FROM operation ORDER BY ID DESC LIMIT 1');
$req1->execute();
$nf = $req1->fetch();
$num_facture = $nf['numero_facture'];

$num_facture = substr($num_facture, 5);
$nff = date("Y") . '-' . ($num_facture + 1);
$_SESSION['facture'] = $num_facture;
$total = 0;

foreach ($products as $product) :
    $idd = $product['id'];
    $q = $products_in_cart[$product['id']][0];
    $m = ($product['pu'] * $products_in_cart[$product['id']][0]) - ($product['pu'] * $products_in_cart[$product['id']][0] * $products_in_cart[$product['id']][1] * 0.01);
    $m = number_format((float)$m, 1, '.', '');
    $total += $m;
    $total = number_format((float)$total, 1, '.', '');

    $client = $_POST['client'] ? $_POST['client'] : '-';
    $seller = $_POST['user'] ? $_POST['user'] : '-';
    echo $m;
    $req2 = $pdo->prepare('INSERT INTO operation(numero_facture, clientId, idProduit, quantite, montant, sellerId) VALUES(:n, :c, :i, :q, :m, :s)');
    $req2->execute(array(
        'n' => $nff,
        'c' => $client,
        'i' => $idd,
        'q' => $q,
        'm' => $m,
        's' => $seller
    ));
    echo "good";
    $req3 = $pdo->prepare('UPDATE products SET quantite=quantite-:qq WHERE id=:id ');
    $req3->execute(array(
        'id' => $idd,
        'qq' => $q
    ));
?>
<?php endforeach;
$mm = $_POST['montant'];
$req4 = $pdo->prepare('INSERT INTO operation_tt(id_facture, id_client, total) VALUES(:iff, :ic, :t)');
$req4->execute(array(
    'iff' => $nff,
    'ic' => $client,
    't' => $total,
));
$req5 = $pdo->prepare('INSERT INTO reglements(id_facture, id_client, montant_d) VALUES(:iff, :ic, :m)');
$req5->execute(array(
    'iff' => $nff,
    'ic' => $client,
    'm' => $mm,
));
session_destroy();
header('Location: ../index.php?fn='.$nff.'');

?>
