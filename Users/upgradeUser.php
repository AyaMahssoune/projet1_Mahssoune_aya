<?php
// Start a session
session_start();

// Check if the user is authenticated
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if the user is not authenticated
    header("Location: ../manageSession/login.php");
    exit();
}

// Get the user role from the session
$user_role = $_SESSION['user_role'];

// Check if the user has the administrator role
if ($user_role != 1) {
    // Redirect to the home page if the user is not an administrator
    header("Location: ../../index.php");
    exit();
}

// Check if the user ID to update is provided
if (isset($_GET['user_id'])) {
    // Get the user ID from the URL
    $user_id = $_GET['user_id'];

    // Connect to the database (adjust the path based on your file structure)
    require_once('../connexion.php');

    // Query to update the user's role to 'admin'
    $update_query = "UPDATE `user` SET `role_id` = 1 WHERE `id` = $user_id";
    $result = mysqli_query($conn, $update_query);

    // Check if the update was successful
    if ($result) {
        // Redirect to the dashboard after a successful update
        header("Location: adminTab.php");
    } else {
        // Display an error message if there's an issue with the database update
        echo "Error updating user role: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Display a message if the user ID is not provided
    echo "User ID not provided.";
}
?>
