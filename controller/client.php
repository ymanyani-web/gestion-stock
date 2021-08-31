<?php
include '../config/database.php';
if (isset($_POST['nom'])) {
    $db = mysqli_connect('localhost', 'root', 'root', 'gestion');
    $nom = isset($_POST['nom']) ? trim($_POST['nom']) : "";
    $sql_u = "SELECT * FROM client WHERE nom='$nom'";
    $res_u = mysqli_query($db, $sql_u);
    if (mysqli_num_rows($res_u) > 0) {
        header('location: ../views/client.php?g=2');
        exit;
    }
    $cin = isset($_POST['cin']) ? trim($_POST['cin']) : "";
    $rib = isset($_POST['rib']) ? trim($_POST['rib']) : "";
    $numero = isset($_POST['numero']) ? $_POST['numero'] : "";
    $adresse = isset($_POST['adresse']) ? $_POST['adresse'] : "";


    $req = $bdd->prepare('INSERT INTO client(nom, cin, rib, numero, adresse) VALUES(:n, :c, :r, :nm, :a)');
    $req->execute(array(
        'n' => $nom,
        'c' => $cin,
        'r' => $rib,
        'nm' => $numero,
        'a' => $adresse
    ));
    if ($_GET['path'] == 2)
        header('location: ../views/client.php?g=1');
    else
        header('location: ../admin.php?g=1');
}
echo 'erreuur//// veuillez nous contacter';
