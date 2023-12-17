<?php
session_start();


//Connexion à la base de données

require_once('../connexion.php');

//Vérification de la méthode de requête HTTP
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_utilisateur = $_POST['user_name'];
    $mot_de_passe = $_POST['pwd'];

    // Récupérer les données de l'utilisateur depuis la base de données en utilisant le nom d'utilisateur fourni
    $sql = "SELECT * FROM `user` WHERE `user_name` = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $nom_utilisateur);
    mysqli_stmt_execute($stmt);
    $resultat = mysqli_stmt_get_result($stmt);
    if ($resultat) {
        $user = mysqli_fetch_assoc($resultat);

        // Vérifier si le mot de passe correspond
        if ($user && password_verify($mot_de_passe, $user['pwd'])) {
            // Le mot de passe est correct, démarrer la session et stocker l'ID et le rôle de l'utilisateur
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['role_user'] = $user['id_role'];

            // Rediriger en fonction du rôle de l'utilisateur
            if ($user['id_role'] == 1) { // Administrateur
                header("Location: ../Admin/administrator.php");
            } else {
                header("Location: ../shopping.php");
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
