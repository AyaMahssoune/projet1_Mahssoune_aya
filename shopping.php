<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 4px;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            text-align: center;
        }

        .navbar {
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
    </style>
    <title>XP</title>

</head>

<body>
    <div class="head">
        <div class="navbar">
            <img id="logo" src="./img/logo.jpg" width="50px" alt="">
            <div class="nav"><a href="./Users/userProfil.php">Profile</a></div>
            <div class="nav"><a href="../../projet_aya/manageSession/logout.php">Log out</a></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <p id="eco">Meilleures Promotions </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 sub text-center">
                <p>
                    <a id="eco1" href="">Échangez votre appareil et économisez &nbsp;</a> jusqu’à 500 $ de rabais sur les derniers ordinateurs.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 text-center">
                <a href=""><img class="img-fluid" width="200px" src="./img_shop/first.png" alt=""></a>
                <a href=""><img class="img-fluid" width="200px" src="img_shop/second.png" alt=""></a>
                <a href=""><img class="img-fluid" width="200px" src="img_shop/third.png" alt=""></a>
                <a href=""><img class="img-fluid" width="200px" src="img_shop/fourth.png" alt=""></a>
            </div>
            <div class="col-md-4 text-center">
                <a href=""><img class="img-fluid" width="200px" src="img_shop/fifth.png" alt=""></a>
                <a href=""><img class="img-fluid" width="200px" src="img_shop/sixth.png" alt=""></a>
                <a href=""><img class="img-fluid" width="200px" src="img_shop/seventh.png" alt=""></a>
                <a href=""><img class="img-fluid" width="200px" src="img_shop/eighth.png" alt=""></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 text-center">
                <a href=""><img class="img-fluid" width="200px" src="img_shop/ninth.png" alt=""></a>
                <a href=""><img class="img-fluid" width="200px" src="img_shop/tenth.png" alt=""></a>
                <a href=""><img class="img-fluid" width="200px" src="img_shop/eleventh.png" alt=""></a>
                <a href=""><img class="img-fluid" width="200px" src="img_shop/twelve.png" alt=""></a>
            </div>
        </div>
    </div>
    </main>
</body>

</html>
<?php
include './footer.php';
?>