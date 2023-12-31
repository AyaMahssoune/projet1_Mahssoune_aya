<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>XP</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 4px;
            padding: 0;
            box-sizing: border-box;
        }

        .navbar {
            font-family: "Courier New", Courier, monospace;
            border: 1px solid black;
            display: flex;
            justify-content: space-between;
            padding: 10px;
            align-items: center;
        }

        .head {
            font-family: "Courier New", Courier, monospace;
            border: 1px solid black;
            display: flex;
            justify-content: space-between;
            padding: 10px;
            align-items: center;
        }

        .nav a {
            color: black;
            text-decoration: none;
            font-weight: 900;
        }

        .nav a:hover {
            color: cadetblue;
        }

        #eco {
            font-size: large;
            font-weight: 800;
        }

        .nav {
            padding-top: 20px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div>
            <img id="logo" src="./img/logo.jpg" width="60px" alt="">
        </div>
        <div class="nav"><a href="./index.php">Home</a></div>
        <div class="nav"><a href="./manageSession/signUp.php">Sign Up</a></div>
        <div class="nav"><a href="./manageSession/login.php">Login</a></div>
    </div>

    <div class="imageAcceuil">
        <img class="img1" width="100%" src="./img/img1.jpg" alt="" class="img-fluid">
    </div>
    <div>
        <h3>Bienvenue ! </h3>
        <hr>
        <h3> Que Cherchez-vous !</h3>
    </div>

    <!-- container 1-->
    <div class="container1 mt-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h4>UNE GAMME COMPLÈTE DE PRODUITS INFORMATIQUES DE TOUTE SORTE</h4>
                <p>Peu importe le produit dont vous avez besoin, nous l’avons. Nous avons accès à une très grande sélection de produits de haute qualité : imprimantes, ordinateurs, serveurs, écrans… Nous connaissons la réalité des entreprises avec lesquelles nous travaillons, et nous offrons donc un prix avantageux pour une qualité, une durabilité et une performance supérieures.</p>
            </div>
            <div class="col-md-6">
                <img src="./img/img2.png" alt="" width="50%">
            </div>
        </div>
    </div>

    <div class="container1 mt-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h4>DES ÉQUIPEMENTS NEUFS DE HAUTE PERFORMANCE</h4>
                <p>En entreprise, le rythme est souvent effréné; tout va vite et l’équipement informatique doit suivre et offrir un rendement extrêmement efficace. Vous n’avez pas le temps pour des bogues informatiques qui créent un ralentissement de vos affaires. C’est pourquoi nous vous offrons une sélection de produits neufs sur lesquels vous pouvez compter. Lorsque nous vous proposons du matériel, nous mettons toujours la performance de ce dernier à l’avant-plan de nos recommandations.</p>
            </div>
            <div class="col-md-6">
                <img src="./img/img3.png" alt="" width="50%">
            </div>
        </div>
    </div>
    </div>
    </main>
</body>

</html>
<?php
include './footer.php';
?>