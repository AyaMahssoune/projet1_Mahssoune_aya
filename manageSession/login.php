<?php
include '../header/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>XP</title>
    <style>
      
        .pageTitle {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #0056b3;
            text-align: center;
        }

        .login-container {
            max-width: 400px;
            align-items: center;
            margin-top: 50px;
            margin-left: 33%;
            margin-bottom: 50px;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* h2 {
            text-align: center;
            color: #343a40;
        } */

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin: 10px 0;
            color: #343a40;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .lien {
            text-align: center;
            text-decoration: none;
            color: #007bff;
            margin-top: 15px;
            display: inline-block;
        }

        .lien a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2 class="pageTitle">Login</h2>
        <form action="./processLogin.php" method="post">
            <!-- Add login form fields -->
            <label for="user_name">Username:</label>
            <input type="text" name="user_name">
            <br>
            <label for="pwd">Password:</label>
            <input type="password" name="pwd">
            <br>
            <input type="submit" value="Login">
        </form>
        <a class="lien" href="../index.php">Accueil</a><br>
        <a class="lien" href="./signUp.php">s'authentifier?</a>
    </div>
</body>

</html>
<?php
include '../footer.php';
?>