<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <link rel="stylesheet" href="../css/style.css">
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



        .nav a {
            color: black;
            text-decoration: none;
            font-weight: 900;
        }

        .nav a:hover {
            color: cadetblue;
        }


        .nav {
            padding-top: -6px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <img id="logo" src="../img/logo.jpg" width="60px" alt="">
        <div class="nav"><a href="../index.php">Home</a></div>
        <div class="nav"><a href="../manageSession/signUp.php">Sign Up</a></div>
        <div class="nav"><a href="../manageSession/login.php">Login</a></div>
    </div>
</body>

</html>