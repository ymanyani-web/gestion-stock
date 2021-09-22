<?php
include '../config/database.php';

$idf = $_POST['idf'];
if(isset($_POST['delete'])){
echo $_POST['id'];
}
elseif(isset($_POST['update'])) {
  $quantite = $_POST['quantite'];
  $id = $_POST['id'];
  $r = $bdd->prepare('UPDATE operation SET quantite=:qq WHERE id=:id ');
  $r->execute(array(
      'id' => $id,
      'qq' => $quantite
  ));
}
$list1 = $bdd->query("SELECT products.designation AS prdct, operation.* FROM products, operation WHERE numero_facture = '$idf' AND operation.idProduit = products.id");
$list2 = $bdd->query("SELECT * FROM operation_tt WHERE id_facture = '$idf'");
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
                    <h2>Modifier une facture</h2>
                </div>
                <div class="col-12">
                    <a href=""></a>
                    <a href=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Booking Start -->

    <!-- Booking End -->

        <div style="margin: auto; margin-top: 50px;" id="fct">
            <center>
                <div>
                        <table class="taaaable table-bordered" id="table_abc" style="width: 50%;">
                          <tr>
                            <th>Desigantion</th>
                            <th>Quantite</th>
                            <th></th>
                            <th></th>
                          </tr>
                            <?php
                            foreach ($list1 as $l1) :
                            ?>
                            <form action="#" method="post">
                              <input type="hidden" name="idf" value="<?= $idf ?>">
                              <input type="hidden" name="id" value="<?= $l1['id'] ?>">
                              <tr>
                                <td><?= $l1['prdct']?></td>
                                <td> <input type="number" name="quantite" value="<?= $l1['quantite']?>"></td>
                                <td><input type="submit" name="update" value="Mise a jour"></td>
                                <td> <input type="submit" name="delete" value="supprimer"> </td>
                              </tr>
                            </form>
                            <?php endforeach;  ?>
                        </table>
                </div>
            </center>
        </div>
        <input class="button" style="position: fixed; right: 10px; bottom: 10px;" type="submit" value="TERMINER" name="finish">    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>

</html>
