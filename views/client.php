<?php
include '../config/database.php';
$var1 = !empty($_POST['nom']) ? $_POST['nom'] : '%';
$var2 = !empty($_POST['cin']) ? $_POST['cin'] : "%";
$reponse1 = $bdd->query("SELECT * FROM  client WHERE `nom` LIKE '$var1' AND cin LIKE '$var2' ");


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <style>
        .button {
            background-color: #719a0a;
            /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }

        #add_new {
            position: fixed;
            right: 10px;

        }
    </style>
    <script>
        if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
            console.info("This page is reloaded");
            window.location.replace("client.php");
        } else {
            console.info("This page is not reloaded");
        }
    </script>
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
<?php
if (isset($_GET['g'])) {
    echo "<body onload='document.getElementById(\"idg1\").style.display=\"block\"' style='width:auto;'>";
} else
    echo "<body>";
?>
<!-- Nav Bar Start -->
<div class="navbar navbar-expand-lg bg-light navbar-light">
    <div class="container-fluid">
        <a href="../index.php" class="navbar-brand">Union pi??ces <span>agricoles</span></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav ml-auto">
                <a href="../index.php" class="nav-item nav-link ">Accueil</a>
                <a href="../admin.php" class="nav-item nav-link active">Administrateur</a>
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
                <h2>filtrer les client</h2>
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
<div class="booking">
    <div class="booking-form">
        <center>
            <form action="client.php" method="post">
                filtrer par: <br>
                <label for="ref">nom</label>
                <input type="text" name="nom" id="nom">
                <label for="designation">C.I.N</label>
                <input type="text" name="cin" id="cin">
                <span style=""><input type="submit" value="chercher" class="button"></span>
            </form>
        </center>
        <div id="add_new">
            <button class="button" onclick="document.getElementById('id02').style.display='block'"> Ajouter un nouveau client</button>
        </div>
    </div>


</div>
<!-- Booking End -->

<div style="margin: auto; margin-bottom: 50px;">
    <div>
        <?php if (isset($_POST['nom'])) { ?>
            <table class="taaaable table-bordered" id="table_abc">
                <thead>
                    <th>nom</th>
                    <th>C.I.N</th>
                    <th>Numero telephone</th>
                    <th>Adresse</th>
                    <th>RIB</th>
                    <!-- <th>quantite</th> -->
                </thead>
                <?php
                foreach ($reponse1 as $r) :
                ?>
                    <tr class='clickable-row' data-href='../controller/client-modifier.php?id=<?php echo $r['id'] ?>'>
                        <td> <?php echo $r['nom'] ?> </td>
                        <td> <?php echo $r['cin'] ?> </td>
                        <td> <?php echo $r['numero'] ?> </td>
                        <td> <?php echo $r['adresse'] ?> </td>
                        <td> <?php echo $r['rib'] ?> </td>
                    </tr>
                <?php endforeach;  ?>
            </table>
        <?php } ?>
    </div>
</div>
<script>
    jQuery(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>
<style>
    tr:hover {
        background: #a9dfbf;
    }

    .taaaable {
        width: 80%;
        margin: auto;
    }
</style>

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
<div id="id02" class="modal">
    <form class="modal-content animate" action="../controller/client.php?path=2" method="post">
        <div class="container">
            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
            <center> <label for="nom">nom et prenom</label> <br>
                <input type="text" name="nom" id="nom" required> <br>
                <label for="cin">cin</label><br>
                <input type="text" name="cin" id="cin"> <br>
                <label for="numero">numero</label><br>
                <input type="text" name="numero" id="numero"> <br>
                <label for="rib">adresse</label><br>
                <input type="text" name="adresse" id="adresse"> <br>
                <label for="rib">rib</label><br>
                <input type="text" name="rib" id="rib"> <br> <br>
                <input type="submit" value="ajouter" class="button"></center>
        </div>
    </form>
</div>

<div id="idg1" class="modal">
    <form class="modal-content animate" action="/action_page.php" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('idg1').style.display='none'" class="close" title="Close Modal">&times;</span>
            <?php
            if (isset($_GET['g']) && $_GET['g'] == '2')
                echo '<img src="../img/dd.png" alt="Avatar" class="avatar">';
            else
                echo '<img src="../img/error.png" alt="Avatar" class="avatar">';
            ?>
            <?php
            if (isset($_GET['g']) && $_GET['g'] == '1')
                echo "<h3>le client a ete ajoute avec succes</h3>";
            elseif (isset($_GET['g']) && $_GET['g'] == '2')
                echo "<h3>il y a deja un client avec ce nom, veuillez reesayer</h3>";
            elseif (isset($_GET['g']) && $_GET['g'] == '3')
                echo "<h3>Le client a ete modifie avec succes</h3>";
            elseif (isset($_GET['g']) && $_GET['g'] == '4')
                echo "<h3>Le client a ete supprime avec succes</h3>";

            ?>
        </div>
    </form>
</div>

<script>
    var modal2 = document.getElementById('id02');
    var modalg1 = document.getElementById('idg1');


    window.onclick = function(event) {

        if (event.target == modal2) {
            modal2.style.display = "none";
        }
        if (event.target == modalg1) {
            modalg1.style.display = "none";
        }

    }
</script>
</body>

</html>