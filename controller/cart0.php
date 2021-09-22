<?php
session_start();
//session_destroy();
include '../config/database.php';
$list1 = $pdo->query("SELECT * FROM users");
$list2 = $pdo->query("SELECT * FROM client");

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    $quantity = isset($_GET['q']) ? $_GET['q'] : 1;
    $tr = isset($_GET['t']) ? $_GET['t'] : 1;
    if ($product && $quantity > 0) {
        if (isset($_SESSION['cartt']) && is_array($_SESSION['cartt'])) {
            if (array_key_exists($id, $_SESSION['cartt'])) {
                //$_SESSION['cart'][$id][0] += $quantity;
                echo "error";
                exit;
            } else {
                $_SESSION['cartt'][$id][0] = $quantity;
                $_SESSION['cartt'][$id][1] = $tr;
            }
        } else {
            $_SESSION['cartt'] = array($id => array($quantity, $tr));
        }
    }
    echo "good";
    // header('location: operation.php');
    exit;
}


if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cartt']) && isset($_SESSION['cartt'][$_GET['remove']])) {
    unset($_SESSION['cartt'][$_GET['remove']]);
}

if (isset($_POST['update']) && isset($_SESSION['cartt'])) {
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
            if (is_numeric($id) && isset($_SESSION['cartt'][$id]) && $quantity > 0) {
                $_SESSION['cartt'][$id][0] = $quantity;
            }
        }
        if (strpos($k, 'tr') !== false && is_numeric($v)) {
            $id = str_replace('tr-', '', $k);
            $tr = (float)$v;

            if (is_numeric($id) && isset($_SESSION['cartt'][$id]) && $tr >= 0) {
                $_SESSION['cartt'][$id][1] = $tr;
            }
        }
    }
    header('location: cart0.php');
    exit;
}


$products_in_cart = isset($_SESSION['cartt']) ? $_SESSION['cartt'] : array();
$products = array();
$subtotal = 0.00;
// If there are products in cart
if ($products_in_cart) {
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id IN (' . $array_to_question_marks . ')');
    $stmt->execute(array_keys($products_in_cart));
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($products as $product) {
        $subtotal += (float)$product['pu'] * (float)$products_in_cart[$product['id']][0] - ((float)$product['pu'] * (float)$products_in_cart[$product['id']][0] * (float)$products_in_cart[$product['id']][1] * 0.01);
        $subtotal = number_format((float)$subtotal, 1, '.', '');
    }
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>UPA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <!-- <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/flaticon/font/flaticon.css" rel="stylesheet"> -->
    <!--   <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" /> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Nav Bar Start -->
    <div class="navbar navbar-expand-lg bg-light navbar-light">
        <div class="container-fluid">
            <a href="../index.php" class="navbar-brand">Union pièces <span>agricoles</span></a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto">
                    <a href="../index.php" class="nav-item nav-link active">Accueil</a>
                    <a href="../admin.php" class="nav-item nav-link">Administrateur</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Nav Bar End -->


    <!-- Page Header Start -->
    <div class="page-header mb-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Panier</h2>
                </div>
                <div class="col-12">
                    <a href=""></a>
                    <a href=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <form action="#" method="post">
        <table style="width: 100%;">
            <thead>
                <tr>
                    <td colspan="">Designation</td>
                    <td>prix</td>
                    <td>casier</td>
                    <td>Quantite</td>
                    <td>Taux de remise</td>
                    <td>Total</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)) : ?>
                    <tr>
                        <td colspan="5" style="text-align:center;">Pas de produit (en cas de probleme veuillez nous contacter)</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($products as $product) :
                      $totaal = ($product['pu'] * $products_in_cart[$product['id']][0]) - ($product['pu'] * $products_in_cart[$product['id']][0] * $products_in_cart[$product['id']][1] * 0.01);
                      $totaal = number_format((float)$totaal, 1, '.', '');
                       ?>
                        <tr>
                            <td>
                                <a href="product-details.php?id=<?= $product['id'] ?>"><?= $product['designation'] ?></a>
                            </td>
                            <td class="price" id="price-<?= $product['id'] ?>"><?= $product['pu'] ?> Dh</td>
                            <td><?= $product['casier'] ?></td>
                            <td class="quantity">
                                <input type="number" id="quantity-<?= $product['id'] ?>"name="quantity-<?= $product['id'] ?>" value="<?= $products_in_cart[$product['id']][0] ?>" min="1" max="<?= $product['quantite'] ?>" placeholder="Quantity" required>
                            </td>
                            <td class="tr">
                                <input id="tr-<?= $product['id'] ?>" step="0.01" type="number" name="tr-<?= $product['id'] ?>" value="<?= $products_in_cart[$product['id']][1] ?>" min="0" max="<?= $product['taux_remise'] ?>" placeholder="taux de remise" required> %
                            </td>
                            <td class="price">
                              <input id="mm-<?= $product['id'] ?>" class="dd" step="0.1" type="number" value="<?= $totaal ?>" > Dh
                            </td>
                            <td>
                                <a href="cart0.php?remove=<?= $product['id'] ?>" class="remove">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="subtotal">
            <span class="text">total</span>
            <span class="price"><?= $subtotal ?> Dh</span>
        </div>
        <div class="bb " style=" position:fixed; left: 10px; bottom:10px;">
          <input type="submit" id="maj" class="button " value="Mise à jour" name="update">
        </div>
    </form>
    <button type="button" onclick="document.getElementById('idg1').style.display = 'block';" class="button " style=" position:fixed; right: 10px; bottom:10px;"> Terminer </button>




    <div id="idg1" class="modal">
        <form class="modal-content animate" style="width: 50%;" method="post" action="../controller/finish_command.php">
            <div class="imgcontainer">
                <span onclick="document.getElementById('idg1').style.display='none'" class="close" title="Close Modal">&times;</span>
                <div id="cont">
                    <div id="first">
                        <h5>veuillez selectionner le vendeur</h5>
                        <select name="user" id="" required>
                            <option value="" selected>selectionner le vendeur</option>
                            <?php
                            foreach ($list1 as $l1) {
                                $id = $l1['id'];
                                $nom = $l1['nom'];
                                echo "<option value='$id'> $nom";
                            }
                            ?>
                        </select>
                    </div>
                    <div id="second">
                        <h5>veuillez selectionner le client</h5>
                        <select name="client" id="" required>
                            <option value="" selected>selectionner le client</option>
                            <?php
                            foreach ($list2 as $l2) {
                                $id = $l2['id'];
                                $nom = $l2['nom'];
                                echo "<option value='$id'> $nom";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                Montant : <input type="number" step="0.5" name="montant" placeholder="le montant donne" min="1" max="<?= $subtotal ?>">
                <input class="cart" id="<?php echo $r['id'] ?>" type="submit" value="terminer">
            </div>
        </form>
    </div>
    <style>
        #cont {
             width: 100%;
            overflow: hidden;
            /* will contain if #first is longer than #second */
            margin-bottom: 20px;
        }

        #first {
            width: 50%;
            float: left;
            /* add this */
            border-right: 1px solid black;
        }

        #second {
            width: 50%;

            overflow: hidden;
            /* if you don't want #second to wrap below #first */
        }

        .bb::after {
        content: '';
        width: 30px; height: 30px;
        border-radius: 100%;
        border: 6px solid #00FFCB;
        position: absolute;
        z-index: -1;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        animation: none;
        }

        @keyframes ring {
        0% {
        	width: 30px;
        	height: 30px;
        	opacity: 1;
        }
        100% {
        	width: 300px;
        	height: 300px;
        	opacity: 0;
        }
        }
    </style>
    <script>
        var modalg1 = document.getElementById('idg1');


        window.onclick = function(event) {

            if (event.target == modalg1) {
                modalg1.style.display = "none";
            }

        }
        $("#mm").bind('keyup mouseup', function () {
          alert("goo");
          var a = document.getElementById("mm").value;
          var b = a / x ;
          b = b * 100
          b = b - 100
          b = b * (-1)
          b = b.toFixed(2);
          document.getElementById("tr").value = b;
        });
        $(".dd").bind('keyup mouseup', function () {
          var idd = this.id;
          idd = idd.substring(3,);
          var price = "price-" + idd;
          var x1 = document.getElementById(price).innerText;
          var quantity = "quantity-" + idd;
          var q1 = document.getElementById(quantity).value;
          var x = parseInt(x1) * parseInt(q1);
          var tr = "tr-" + idd;
          var y = document.getElementById(tr).value;
          var a = document.getElementById(this.id).value;
          var b = a / x ;
          b = b * 100
          b = b - 100
          b = b * (-1)
          b = b.toFixed(2);
          document.getElementById(tr).value = b;
        });
        $(function() {
          // assigns a onChange event to all inputs with ids that start with "color-box"
            $("input").change(function () {
            $( "<style>.bb::after{animation: ring 1.5s infinite;}</style>" ).appendTo( "body" )
        });
      });
    </script>
</body>
