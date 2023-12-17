<?php
// Inclure le fichier de configuration de la base de données
require_once('../connexion.php');

// Supposant que les informations de l'utilisateur sont stockées dans une session après la connexion
session_start();

// Rediriger vers la page de connexion si l'utilisateur n'est pas authentifié
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Récupérer l'ID utilisateur depuis la session
$user_id = $_SESSION['user_id'];

// Récupérer les informations de l'utilisateur depuis la base de données
$sql = "SELECT * FROM `user` WHERE `id` = $user_id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profil de l'utilisateur</title>
    <link rel="stylesheet" href="../../public/css/cursor.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e0f2f1;
            /* Couleur de fond */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h2 {
            color: #004d40;
            /* Couleur du texte */
            text-align: center;
            padding-top: 40px;
            margin-bottom: 20px;
        }

        form {
            background-color: #fafafa;
            /* Couleur de fond du formulaire */
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #004d40;
            /* Couleur du texte des libellés */
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #b0bec5;
            /* Couleur de la bordure */
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #004d40;
            /* Couleur du fond du bouton */
            color: #ffffff;
            /* Couleur du texte du bouton */
            cursor: pointer;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #004d40;
            /* Couleur du texte des liens */
            text-decoration: none;
        }

        a:last-child {
            padding-bottom: 30px;
        }

        a:hover {
            text-decoration: underline;
        }

        img {
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .error {
            color: #c62828;
            /* Couleur du texte des messages d'erreur */
        }
    </style>
</head>

<body>
    <h2>Profil de l'utilisateur</h2>
    <form action="process_update_profile.php" method="post" enctype="multipart/form-data">
        <!-- Affichage des informations de l'utilisateur et ajout de champs de formulaire en fonction de la structure de votre base de données -->
        <img src="../../public/images/avatar.jpg" alt="Image de profil par défaut" width="100">
        <br>
        <label for="user_name">Nom d'utilisateur :</label>
        <input type="text" name="user_name" value="<?php echo $user['user_name']; ?>" readonly>
        <br>
        <label for="email">Email :</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>">
        <br>
        <label for="fname">Prénom :</label>
        <input type="text" name="fname" value="<?php echo $user['fname']; ?>">
        <br>
        <label for="lname">Nom :</label>
        <input type="text" name="lname" value="<?php echo $user['lname']; ?>">
        <br>
        <input type="submit" value="Enregistrer">
        <?php
        // Affichage des messages d'erreur s'ils existent
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
            echo "<p class='error'>$error</p>";
        }
        ?>
    </form>
    <a href="./change_password.php">Changer le mot de passe</a>
    <br>
    <a href="../manageSession/logout.php">déconnexion</a>
    <br>
    <a href="../../index.php">Accueil</a>
</body>

</html>