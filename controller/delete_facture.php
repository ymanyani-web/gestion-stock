<?php
include '../config/database.php';

$idf = $_POST['idf'];
echo $idf;
$list1 = $bdd->query('SELECT * FROM operation WHERE numero_facture = "' . $idf . '";');
foreach ($list1 as $l1) {
  $product_id = $l1['idProduit'];
  $quantite = $l1['quantite'];
  echo $product_id;
  echo $quantite;
  $r = $bdd->prepare('UPDATE products SET quantite=quantite+:qq WHERE id=:id ');
  $r->execute(array(
      'id' => $product_id,
      'qq' => $quantite
  ));
}

$req = $bdd->prepare('DELETE FROM operation WHERE numero_facture = :idf');
$req->execute(array(
    'idf' => $idf,
));
$req1 = $bdd->prepare('DELETE FROM operation_tt WHERE id_facture = :idff');
$req1->execute(array(
    'idff' => $idf,
));
header('Location: ../admin.php?msg=5');
