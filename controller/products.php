<?php
include '../config/database.php';
if (isset($_POST['ref'])) {
    $ref = isset($_POST['ref']) ? trim($_POST['ref']) : "";
    $designation = isset($_POST['designation']) ? trim($_POST['designation']) : "";
    $categorie_pieceId = isset($_POST['categorie_pieceId']) ? $_POST['categorie_pieceId'] : "";
    $marque_pieceId = isset($_POST['marque_pieceId']) ? $_POST['marque_pieceId'] : "";
    $marque_vehiculeId = isset($_POST['marque_vehiculeId']) ? $_POST['marque_vehiculeId'] : "";
    $casier = isset($_POST['casier']) ? trim($_POST['casier']) : "";
    $nn = $_FILES['profile']['name'];
    move_uploaded_file($_FILES['profile']['tmp_name'], "../images/$cb-$nn");
    $path =  "images/$cb-$nn";
    $path =  isset($path) ? "images/$cb-$nn" : "";
    $pu = isset($_POST['pu']) ? $_POST['pu'] : "";
    $remise = isset($_POST['remise']) ? $_POST['remise'] : "";
    $description = isset($_POST['description']) ? $_POST['description'] : "";
    $seuil = isset($_POST['seuil']) ? $_POST['seuil'] : "";

    $fournisseurId = isset($_POST['fournisseurId']) ? $_POST['fournisseurId'] : "";
    $pu_fournisseur = isset($_POST['pu_f']) ? $_POST['pu_f'] : "";

    if (isset($_POST['facturee']) && $_POST['facturee'] == 'SF') {
       echo $ref . "<br>";
      echo $designation . "<br>";
      echo $categorie_pieceId . "<br>";
      echo $marque_pieceId . "<br>";
      echo $marque_vehiculeId . "<br>";
      echo $path . "<br>";
      echo $casier . "<br>";
      echo $fournisseurId . "<br>";
      echo $pu_fournisseur . "<br>";
      echo $pu . "<br>";
      echo $remise . "<br>";
      echo $description . "<br>";
      echo $seuil;
      $db = mysqli_connect('localhost', 'root', 'root', 'gestion');
      $sql_u = "SELECT * FROM sf WHERE ref='$ref' AND fournisseurId='$fournisseurId'";
      $res_u = mysqli_query($db, $sql_u);
      if (mysqli_num_rows($res_u) > 0)
      {
       header('Location: ../views/products.php?g=4');
       exit;
      }
      $req = $bdd->prepare('INSERT INTO sf(`ref`, `designation`, `categorie_pieceId`, `marque_pieceId`, `marque_vehiculeId`, `image`, `casier`, `fournisseurId`, `pu_fournisseur`, `pu`, `taux_remise`, `description`, `seuil-min`) VALUES(:r, :ds, :ci, :mpi, :mvi, :i, :c, :fi, :pf, :p, :tr, :d, :s)');
      $req->execute(array(
          'r' => $ref,
          'ds' => $designation,
          'ci' => $categorie_pieceId,
          'mpi' => $marque_pieceId,
          'mvi' => $marque_vehiculeId,
          'i' => $path,
          'c' => $casier,
          'fi' => $fournisseurId,
          'pf' => $pu_fournisseur,
          'p' => $pu,
          'tr' => $remise,
          'd' => $description,
          's' => $seuil
      ));
    }
    else {
      $sql_u = "SELECT * FROM products WHERE ref='$ref' AND fournisseurId='$fournisseurId'";
      $res_u = mysqli_query($db, $sql_u);
      if (mysqli_num_rows($res_u) > 0)
      {
       header('Location: ../views/products.php?g=4');
       exit;
      }
      $req = $bdd->prepare('INSERT INTO products(`ref`, `designation`, `categorie_pieceId`, `marque_pieceId`, `marque_vehiculeId`, `image`, `casier`, `fournisseurId`, `pu_fournisseur`, `pu`, `taux_remise`, `description`, `seuil-min`) VALUES(:r, :ds, :ci, :mpi, :mvi, :i, :c, :fi, :pf, :p, :tr, :d, :s)');
      $req->execute(array(
          'r' => $ref,
          'ds' => $designation,
          'ci' => $categorie_pieceId,
          'mpi' => $marque_pieceId,
          'mvi' => $marque_vehiculeId,
          'i' => $path,
          'c' => $casier,
          'fi' => $fournisseurId,
          'pf' => $pu_fournisseur,
          'p' => $pu,
          'tr' => $remise,
          'd' => $description,
          's' => $seuil
      ));
  }
}
/* echo $ref . "<br>";
echo $designation . "<br>";
echo $categorie_pieceId . "<br>";
echo $marque_pieceId . "<br>";
echo $marque1 . "<br>";
echo $path . "<br>";
echo $casier . "<br>";
echo $fournisseurId . "<br>";
echo $pu_fournisseur . "<br>";
echo $pu . "<br>";
echo $remise . "<br>";
echo $description . "<br>"; */
header('Location: ../views/products.php?g=1');
