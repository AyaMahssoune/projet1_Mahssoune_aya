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

// Check if the user ID to be deleted is provided
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Connect to the database (adjust the path based on your file structure)
    require_once('../connexion.php');

    // Query to delete the user
    $delete_query = "DELETE FROM `user` WHERE `id` = $user_id";

    // Execute the delete query
    $result = mysqli_query($conn, $delete_query);

    // Check if the deletion was successful
    if ($result) {
        header("Location: adminTab.php");
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "User ID not provided.";
}
