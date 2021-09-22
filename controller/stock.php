<?php
include '../config/database.php';
$productId = $_GET['id'];
$quantite = $_GET['q'];
$nf = $_GET['nf'];
$df = $_GET['df'];

$req = $bdd->prepare('INSERT INTO stock(productId, quantite, numero_facture, date_facture) VALUES(:p, :q, :nf, :df)');
$req->execute(array(
    'p' => $productId,
    'q' => $quantite,
    'nf'=> $nf,
    'df'=> $df
));

$req = $bdd->prepare('UPDATE products SET quantite=quantite+:q WHERE id=:p ');
$req->execute(array(
    'p' => $productId,
    'q' => $quantite
));
?>
