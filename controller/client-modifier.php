<?php
include '../config/database.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $reponse1 = $bdd->query("SELECT * FROM  client WHERE `id` = $id");
}

if(isset($_POST['update']))
{
    $nom = isset($_POST['nom']) ? $_POST['nom'] : "";
    $cin = isset($_POST['cin']) ? $_POST['cin'] : "";
    $num = isset($_POST['num']) ? $_POST['num'] : "";
    $adresse = isset($_POST['adresse']) ? $_POST['adresse'] : "";
    $rib = isset($_POST['rib']) ? $_POST['rib'] : "";
    $id = isset($_POST['id']) ? $_POST['id'] : "";
    
    $req = $bdd->prepare('UPDATE client SET nom=:n, cin=:c, numero=:nm, adresse=:a, rib=:r WHERE id=:i ');
    $req->execute(array(
        'n' => $nom,
        'c' => $cin,
        'nm' => $num,
        'a' => $adresse,
        'r' => $rib,
        'i' => $id
    ));
    header('Location: ../views/client.php?g=3');
}

if(isset($_POST['delete']))
{
    $id = $_POST['id'];
    $req1 = $bdd->prepare('DELETE FROM client WHERE id=:i ');
    $req1->execute(array(
        'i' => $id
    ));
    header('Location: ../views/client.php?g=4');
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
                    <h2>Modifier un produit</h2>
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



    <form action="#" method="post">
        <input type="hidden" value="<?= $_GET['id'] ?>" name="id">
        <div style="margin: auto; margin-top: 50px;">
            <center>
                <div>
                    <?php if (isset($_GET['id'])) { ?>
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                        <table class="taaaable table-bordered" id="table_abc">
                            <thead>
                                <th>nom</th>
                                <th>cin</th>
                                <th>numero</th>
                                <th>adresse</th>
                                <th>Rib</th>
                            </thead>
                            <?php
                            foreach ($reponse1 as $r) :
                            ?>
                                <tr>
                                    <td> <input type="text" value="<?php echo $r['nom'] ?>" name="nom"> </td>
                                    <td><input type="text" value="<?php echo $r['cin'] ?>" name="cin"> </td>
                                    <td><input type="text" value="<?php echo $r['numero'] ?>" name="num"> </td>
                                    <td><input type="text" value="<?php echo $r['adresse'] ?>" name="adresse"> </td>
                                    <td><input type="text" value="<?php echo $r['rib'] ?>" name="rib"> </td>
                                </tr>
                            <?php endforeach;  ?>
                        </table>
                    <?php } ?>
                </div>
            </center>
        </div>
        <input class="button" onclick="return confirm('Êtes-vous sure?');" style="background-color: red; position: fixed; left: 10px; bottom: 10px;" type="submit" value="supprimer" name="delete">
        <input class="button"  style="position: fixed; right: 10px; bottom: 10px;" type="submit" value="Mise à jour" name="update">
    </form>
    <!-- JavaScript Libraries -->
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