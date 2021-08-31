<?php
include 'config/database.php';
$reponse1 = $bdd->query("SELECT * FROM categorie_piece");
$reponse2 = $bdd->query("SELECT * FROM marque_piece");
$reponse3 = $bdd->query("SELECT * FROM marque_vehicule");
$reponse4 = $bdd->query("SELECT * FROM fournisseur");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>UPA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <script>
        if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
            console.info("This page is reloaded");
            window.location.replace("admin.php");
        } else {
            console.info("This page is not reloaded");
        }
    </script>
</head>


<?php
if (!empty($_GET['g'])) {
    echo "<body onload='document.getElementById(\"idg1\").style.display=\"block\"' style='width:auto;'>";
} else {
    echo "<body>";
}
?>
<!-- Nav Bar Start -->
<div class="navbar navbar-expand-lg bg-light navbar-light">
    <div class="container-fluid">
        <a href="index.php" class="navbar-brand">Union pièces <span>agricoles</span></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav ml-auto">
                <a href="index.php" class="nav-item nav-link">Accueil</a>
                <a href="#" class="nav-item nav-link active">Administrateur</a>
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
                <h2>######</h2>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Food Start -->
<div class="food mt-0">
    <div class="container">
        <div class="row align-items-center">
            <a onclick="window.location.replace('views/products.php')" href="views/products.php">
                <div class="col-md-4" onclick="window.location.replace('views/products.php')">
                    <div class="food-item">
                        <i class="fas fa-plus"></i>
                        <h3>Produit</h3>
                        <a href=""></a>
                    </div>
                </div>
            </a>
            <a onclick="window.location.replace('views/client.php')" href="views/client.php">
                <div class="col-md-4" onclick="window.location.replace('views/client.php')">
                    <div class="food-item">
                        <i class="fas fa-users"></i>
                        <h3>Client</h3>
                        <a href=""></a>
                    </div>
                </div>
            </a>
            <a onclick="window.location.replace('views/fournisseur.php')" href="views/fournisseur.php">
                <div class="col-md-4" onclick="window.location.replace('views/fournisseur.php')">
                    <div class="food-item">
                        <i class="fas fa-user-plus"></i>
                        <h3>Fournisseur</h3>
                        <a href=""></a>
                    </div>
                </div>
            </a>
            <a onclick="document.getElementById('id011').style.display='block'">
                <div class="col-md-4" onclick="document.getElementById('id011').style.display='block'">
                    <div class="food-item">
                        <i class="fas fa-tractor"></i>
                        <h5>Ajouter marque de vehicule</h5>
                        <a href=""></a>
                    </div>
                </div>
            </a>
            <a onclick="document.getElementById('id012').style.display='block'">
                <div class="col-md-4" onclick="document.getElementById('id012').style.display='block'">
                    <div class="food-item">
                        <i class="fas fa-tractor"></i>
                        <h5>Ajouter marque de piece</h5>
                        <a href=""></a>
                    </div>
                </div>
            </a>
            <a onclick="document.getElementById('id013').style.display='block'">
                <div class="col-md-4" onclick="document.getElementById('id013').style.display='block'">
                    <div class="food-item">
                        <i class="fas fa-tractor"></i>
                        <h5>Ajouter categorie de piece </h5>
                        <a href=""></a>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- Food End -->



































<div id="id02" class="modal">
    <form class="modal-content animate" action="controller/client.php" method="post">
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



<div id="id03" class="modal">
    <form class="modal-content animate" action="controller/fournisseur.php" method="post">
        <div class="container">
            <center><label for="nom">nom et prenom</label><br>
                <input type="text" name="nom" id="nom" required> <br>
                <label for="telephone">telephone</label><br>
                <input type="text" name="telephone" id="telephone"> <br>
                <label for="adresse">adresse</label><br>
                <input type="text" name="adresse" id="adresse"> <br>
                <label for="ville">ville</label><br>
                <input type="text" name="ville" id="ville"> <br>
                <label for="email">email</label><br>
                <input type="email" name="email" id="email"> <br> <br>
                <input type="submit" value="ajouter" class="button"></center>
        </div>
    </form>
</div>









<div id="id011" class="modal">
    <form class="modal-content animate" action="controller/add.php?type=1" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id011').style.display='none'" class="close" title="Close Modal">&times;</span>
            <h1>Veuillez ecrire la marque </h1>
            <label for="nom"> nom : </label>
            <input type="text" name="nom" id="nom"> <br>
            <input type="submit" name="" id="" value="ajouter" class="button">
        </div>
    </form>
</div>
<div id="id012" class="modal">
    <form class="modal-content animate" action="controller/add.php?type=2" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id012').style.display='none'" class="close" title="Close Modal">&times;</span>
            <label for="nom"> nom : </label>
            <input type="text" name="nom" id="nom">
            <input type="submit" name="" id="" value="ajouter" class="button">
        </div>
    </form>
</div>
<div id="id013" class="modal">
    <form class="modal-content animate" action="controller/add.php?type=3" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id013').style.display='none'" class="close" title="Close Modal">&times;</span>
            <label for="nom"> nom : </label>
            <input type="text" name="nom" id="nom">
            <input type="submit" name="" id="" value="ajouter" class="button">
        </div>
    </form>
</div>








<div id="idg1" class="modal">
    <form class="modal-content animate" action="/action_page.php" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('idg1').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="img/error.png" alt="Avatar" class="avatar">
            <?php
            if (isset($_GET['g']) && $_GET['g'] == '1')
                echo "<h3>l'utilisateure a ete ajoute avec succes</h3>";
            elseif (isset($_GET['g']) && $_GET['g'] == '2')
                echo "<h3>votre produit a ete ajoute avec succes</h3>";
            elseif (isset($_GET['g']) && $_GET['g'] == '3')
                echo " <h3>votre fournisseur a ete ajoute avec succes</h3>";
            elseif (isset($_GET['g']) && $_GET['g'] == '4')
                echo " <h3></h3>";
            ?>
        </div>
    </form>
</div>




<script>
    var modal11 = document.getElementById('id011');
    var modal12 = document.getElementById('id012');
    var modal13 = document.getElementById('id013');

    var modal1 = document.getElementById('id01');
    var modal2 = document.getElementById('id02');
    var modal3 = document.getElementById('id03');

    var modalg1 = document.getElementById('idg1');


    window.onclick = function(event) {
        if (event.target == modal11) {
            modal11.style.display = "none";
        }
        if (event.target == modal12) {
            modal12.style.display = "none";
        }
        if (event.target == modal13) {
            modal13.style.display = "none";
        }
        if (event.target == modal1) {
            modal1.style.display = "none";
        }
        if (event.target == modal2) {
            modal2.style.display = "none";
        }
        if (event.target == modal3) {
            modal3.style.display = "none";
        }
        if (event.target == modalg1) {
            modalg1.style.display = "none";
        }
    }
</script>
<style>
    input[type=text],
    input[type=email],
    input[type=password] {
        width: 100%;
        padding: .5em 1em;
    }

    .modal {
        overflow-y: scroll;
        overflow-x: hidden;
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        /* overflow: auto; */
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        padding-top: 60px;
    }

    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto;
        /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 35%;
        /* Could be more or less, depending on screen size */
    }

    .modal-content1 {
        background-color: #fefefe;
        margin: 5% auto 15% auto;
        /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 50%;
        /* Could be more or less, depending on screen size */
    }

    .close {
        position: absolute;
        right: 25px;
        top: 0;
        color: #000;
        font-size: 35px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: red;
        cursor: pointer;
    }

    /* Add Zoom Animation */
    .animate {
        -webkit-animation: animatezoom 0.6s;
        animation: animatezoom 0.6s
    }

    @-webkit-keyframes animatezoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes animatezoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
        position: relative;
    }

    img.avatar {
        width: 40%;
        border-radius: 50%;
    }

    .container {
        padding: 16px;
    }
</style>
<!-- ajouter divs end -->


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