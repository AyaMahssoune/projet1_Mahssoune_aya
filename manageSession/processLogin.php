<?php
//Connexion à la base de données

require_once('../connexion.php');

session_start();

//Vérification de la méthode de requête HTTP
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userName = $_POST['user_name'];
    $password = $_POST['pwd'];

    // Récupérer les données de l'utilisateur depuis la base de données en utilisant le nom d'utilisateur fourni
    $sql = "SELECT * FROM `user` WHERE `user_name` = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $userName);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        $user = mysqli_fetch_assoc($result);

        // Check if the password matches
        if ($user && password_verify($password, $user['pwd'])) {
            // Password is correct, start the session and store user ID and role
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role_id'];

            // Rediriger en fonction du rôle de l'utilisateur
            if ($user['role_id'] == 1) { // Administrateur
                header("Location: ../Users/adminTab.php");
            } else {
                header("Location: ../Users/userProfil.php");
            }
            exit();
        } else {
            // Rediriger avec un message d'erreur
            header("Location: ./login.php?erreur=Nom d'utilisateur ou mot de passe incorrect");
            exit();
        }
    } else {
        header("Location: ./login.php?erreur=Erreur de la base de données");
        exit();
    }
} else {
    header("Location: ./login.php?erreur=Accès non autorisé");
    exit();
}

// Fermer la connexion à la base de données
mysqli_close($conn);
