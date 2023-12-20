<?php
// Include the database configuration file
require_once('../connexion.php');
include('../header/header.php');

// Assuming that user information is stored in a session after login
session_start();

//Redirect to the login page if the user is not authenticated
if (!isset($_SESSION['user_id'])) {
    header("Location: ../manageSession/login.php");
    exit();
}

// Get the user ID from the session
$user_id = $_SESSION['user_id'];



// Get user information from the database using prepared statement
$sql = "SELECT * FROM `user` WHERE `id` = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <style>
        h2 {
            text-align: center;
            color: #007bff;
        }

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
            width: 50%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 16px;
            background-color: aliceblue;
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

        .logout {
            display: inline-block;
            padding: 10px 15px;
            background-color: #dc3545;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-left: 45%;
            margin-bottom: 22px;
            padding: 10px 38px 10px 38px;
        }

        .logout:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <h2>Profile</h2>
    <form action="updateprofil.php" method="post" enctype="multipart/form-data">
        <!-- Display user information and add form fields based on your database structure -->
        <img src="../img/profil-pic.png" alt="Default Profile Picture" width="100">
        <br>
        <label for="user_name">Nom utilisateur:</label>
        <input type="text" name="user_name" value="<?php echo $user['user_name']; ?>" readonly>
        <br>
        <label for="email">Gmail:</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>">
        <br>
        <label for="fname">Prenom:</label>
        <input type="text" name="fname" value="<?php echo $user['fname']; ?>">
        <br>
        <label for="lname">Nom:</label>
        <input type="text" name="lname" value="<?php echo $user['lname']; ?>">
        <br>
        <input type="submit" value="Enregistrer">
        <?php
        // Display error messages if they exist
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
            echo "<p class='error'>$error</p>";
        }
        ?>
    </form>
    <br>
    <a class="logout" href="../manageSession/logout.php">Log out</a>
</body>

</html>
<?php
include '../footer.php';
?>