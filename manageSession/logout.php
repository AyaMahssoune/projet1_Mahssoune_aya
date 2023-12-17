<?php
// Supposant que les informations de l'utilisateur sont stockées dans une session après la connexion
session_start();

// Détruire toutes les variables de session
session_destroy();

// Rediriger vers la page de connexion
header("Location: login.php");
exit();
?>
