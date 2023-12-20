<?php
session_start();

// Check if the user is authenticated
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if the user is not authenticated
    header("Location: ../manageSession/login.php");
    exit();
}

// Get the user's role from the session
$user_role = $_SESSION['user_role'];

// Check if the user has the administrator role
if ($user_role != 1) {
    // Redirect to the homepage if the user is not an administrator
    header("Location: ../../userProfil.php");
    exit();
}

// If the user is an administrator, display the admin dashboard
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Page Admin</title>

    <style>
        /* Style for the page */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Style for the unordered list */
        ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
        }

        /* Style for links */
        a {
            display: block;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>

</head>

<body>
    <h2>Bienvenu SuperAdmin</h2>

    <table>
        <tr>
            <td><a href="../manageProducts/addProduct.php">Ajouter Produit</a></td>
            <td><a href="../manageProducts/products.php">Produit</a></td>
            <td><a href="manage_users.php">Gérer Utilisateurs</a></td>
            <td><a href="../manageSession/logout.php">Logout</a></td>
        </tr>
    </table>


</body>

</html>