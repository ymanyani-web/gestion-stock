<?php
include '../config/database.php';
$list1 = $bdd->query("SELECT * FROM products WHERE quantite < `seuil-min`");
$list2 = $bdd->query("SELECT * FROM client");
$list3 = $bdd->query("SELECT * FROM ");
$list4 = $bdd->query("SELECT * FROM ");
$list5 = $bdd->query("SELECT * FROM ");


$credit_t = 0;
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
    </div>
    <!-- Page Header End -->


    <script type="text/javascript">
        //<!--
        function change_onglet(name) {
            document.getElementById('onglet_' + anc_onglet).className = 'onglet_0 onglet';
            document.getElementById('onglet_' + name).className = 'onglet_1 onglet';
            document.getElementById('contenu_onglet_' + anc_onglet).style.display = 'none';
            document.getElementById('contenu_onglet_' + name).style.display = 'block';
            anc_onglet = name;
        }
        //-->
    </script>






    <div class="systeme_onglets" style="height: 100%">
        <div class="onglets">
            <span class="onglet_0 onglet" id="onglet_rupture" onclick="javascript:change_onglet('rupture');"> Rupture de stock </span>
            <span class="onglet_0 onglet" id="onglet_suivi" onclick="javascript:change_onglet('suivi');"> suivi des reglements </span>
            <span class="onglet_0 onglet" id="onglet_inventaire" onclick="javascript:change_onglet('inventaire');"> inventaire </span>
            <span class="onglet_0 onglet" id="onglet_classement" onclick="javascript:change_onglet('classement');"> classement </span>
            <span class="onglet_0 onglet" id="onglet_CA" onclick="javascript:change_onglet('CA');"> CA </span>
        </div>
        <div class="contenu_onglets" style="height: 100%">

            <!-- start onglet rupture -->
            <div class="contenu_onglet" id="contenu_onglet_rupture">
                <main class="grid">
                    <?php foreach ($list1 as $l1) : ?>
                        <div class="img" id="<?php echo $p['id'] ?>">
                            <a><img src="../<?php echo $l1['image'] ?>" width="250px" height="175px" alt=""></a>
                            reference: <span><?= $l1['ref'] ?></span> <br>
                            Designation: <span><?= $l1['designation'] ?></span> <br>
                            Quantite actuelle: <span style="color: red; font-size: 22px"><?= $l1['quantite'] ?></span> <br>
                        </div>
                    <?php endforeach; ?>
                </main>
            </div>
            <!-- end onglet rupture -->


            <!-- start onglet suivi -->
            <div class="contenu_onglet" id="contenu_onglet_suivi">
                <main class="">
                    <table class="taaaable table-bordered" id="table_abc" style="width: 50%; margin: auto; margin-top: 20px;">
                        <tr>
                            <th>Nom client</th>
                            <th>Credit</th>
                        </tr>
                        <?php foreach ($list2 as $l2) : ?>
                            <?php
                            $idcl = $l2['id'];
                            $list2 = $pdo->query("SELECT * FROM operation_tt WHERE id_client = $idcl");
                            $reponse1 = $pdo->query("SELECT SUM(montant_d) AS `montant_d` FROM reglements WHERE id_client = $idcl");
                            $donnes1 = $reponse1->fetch();
                            $total_d = $donnes1['montant_d'];
                            $reponse2 = $pdo->query("SELECT SUM(total) AS `tt` FROM operation_tt WHERE id_client = $idcl");
                            $donnes2 = $reponse2->fetch();
                            $total = $donnes2['tt'];
                            $credit = $total - $total_d;
                            $ccc = $pdo->query("SELECT id, nom, numero FROM client WHERE id = $idcl");
                            $donnes3 = $ccc->fetch(); ?>
                            <?php
                            if ($credit > 0) { ?>
                                <tr class='clickable-row-g clickable-row' data-href='regler_facture.php?id=<?php echo $donnes3['id'] ?>'>
                                    <td><?= $donnes3['nom'] ?></td>
                                    <td> <span style="color: red;">- <?= $credit ?></span></td>
                                </tr>
                            <?php
                            $credit_t = $credit_t + $credit;
                            }
                            ?>
                        <?php endforeach; ?>
                    </table>
                    <h1 style="color: red;"><?= $credit_t ?></h1>
                    <style>
                        .clickable-row-g:hover {
                            background-color: #a9dfbf;
                        }

                        .clickable-row-r:hover {
                            background: #f5b7b1;
                        }
                    </style>
                    <script>
                        jQuery(document).ready(function($) {
                            $(".clickable-row").click(function() {
                                window.location = $(this).data("href");
                            });
                        });
                    </script>
                </main>
            </div>
            <!-- end onglet suivi -->


            <!-- start onglet inventaire -->
            <div class="contenu_onglet" id="contenu_onglet_inventaire">
                <main class="grid">
                    test2
                </main>
            </div>
            <!-- end onglet inventaire -->



            <!-- start onglet classement -->
            <div class="contenu_onglet" id="contenu_onglet_classement">
                <main class="grid">
                    test4
                </main>
            </div>
            <!-- end onglet classement -->


            <!-- start onglet CA -->
            <div class="contenu_onglet" id="contenu_onglet_CA">
                <main class="grid">
                    test5
                </main>
            </div>
            <!-- End onglet CA -->

        </div>
    </div>
    <script type="text/javascript">
        var anc_onglet = 'rupture';
        change_onglet(anc_onglet);
    </script>
    <style>
        html,
        body,
        #main {
            height: 100%;
            width: 100%;
        }

        .onglet {
            display: inline-block;
            margin-left: 3px;
            margin-right: 3px;
            padding: 3px;
            border: 1px solid black;
            cursor: pointer;
        }

        .onglet_0 {
            background: #fbaf32;
            color: black;
            border-bottom: 1px solid black;
        }

        .onglet_1 {
            background: #719a0a;
            color: black;
            border-bottom: 0px solid black;
            padding-bottom: 4px;
        }

        .contenu_onglet {
            color: black;
            background-color: #F5F5F5;
            border: 1px solid black;
            margin-top: -1px;
            padding: 5px;
            display: none;
            width: 100%;
            height: 100%;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            grid-gap: 20px;
            align-items: stretch;

        }

        .grid img {
            border: 1px solid #ccc;
            box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.3);
            max-width: 100%;
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
</body>

</html>