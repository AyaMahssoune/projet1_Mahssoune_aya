<?php
// Include the database configuration file
require_once('../connexion.php');

// Assuming that user information is stored in a session after login
session_start();

//Redirect to the login page if the user is not authenticated
if (!isset($_SESSION['user_id'])) {
    header("Location: ../manageSession/login.php");
    exit();
}

// Get the user ID from the session
$user_id = $_SESSION['id_utilisateur'];

// Get user information from the database using prepared statement
$sql = "SELECT * FROM `user` WHERE `id_utilisateur` = ?";
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
    <link rel="stylesheet" href="../css/profilStyle.css">
</head>

<body>
    <h2>Profile</h2>
    <form action="updateprofil.php" method="post" enctype="multipart/form-data">
        <!-- Display user information and add form fields based on your database structure -->
        <img src="../img/profil-pic.png" alt="Default Profile Picture" width="100">
        <br>
        <label for="user_name">Username:</label>
        <input type="text" name="user_name" value="<?php echo $user['user_name']; ?>" readonly>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>">
        <br>
        <label for="fname">First Name:</label>
        <input type="text" name="fname" value="<?php echo $user['fname']; ?>">
        <br>
        <label for="lname">Last Name:</label>
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
    <a href="./change_password.php">Change password</a>
    <br>
    <a href="../manageSession/logout.php">Log out</a>
    <br>
    <a href="../index.php">Accueil</a>
</body>

</html>