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
    header("Location: ../../index.php");
    exit();
}

// Simply display the list of users for now
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Users</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e6e6e6;
            /* Couleur de fond légèrement grise */
            margin: 0;
            padding: 0;
        }

        h2 {
            /* Bleu clair */
            color: black;
            padding: 10px;
            text-align: center;
        }

        table {
            width: 70%;
            margin: 20px auto;
            background-color: #fff;
            border: 1px solid;
            border-radius: 5px;
            /* Coins arrondis */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3399ff;
            /* Bleu vif */
            color: #fff;
        }

        tr:hover {
            background-color: #66a3ff;
            /* Bleu plus clair au survol */
        }

        a {
            width: 40%;
            text-decoration: none;
            text-align: center;
            color: #007BFF;
            display: block;
            padding: 8px;
            background-color: #fff;
            border: 1px solid #007BFF;
            border-radius: 4px;
            margin-left: 27%;
        }

        a:hover {
            background-color: #007BFF;
            color: black;
        }
    </style>

</head>

<body>
    <h2>Liste d'Utilisateurs</h2>
    <a href="./adminTab.php">Gerer tables</a>

    <?php
    // Connect to the database (adjust the path based on your file structure)
    require_once('../connexion.php');

    // Query to get the list of users
    $sql = "SELECT `id`, `user_name`, `email` FROM `user`";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Display the list of users
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>nom utilisateur</th>
                    <th>Email</th>
                    <th>Modifier</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['user_name']}</td>
                    <td>{$row['email']}</td>
                    <td><a href='upgradeUser.php?user_id={$row['id']}'>Admin</a>  
                    <a href='deleteUser.php?user_id={$row['id']}'>Supprimer</a></td>
                </tr>";
        }

        echo "</table>";

        // Free the result set
        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>

</html>