<?php
include("./connexion.php");
session_start();

// Check if the cart is not empty
if (!empty($_SESSION['cart'])) {
    // Assuming the user is logged in and you have the user_id in $_SESSION
    $userId = $_SESSION['user_id']; 

    // Create an entry in the user_order table
    $orderInsertQuery = "INSERT INTO `user_order` (`user_id`) VALUES ($userId)";
    $con->query($orderInsertQuery);

    // Get the order_id of the newly inserted order
    $orderId = $con->insert_id;

    // Insert products from the cart into the order_details table
    foreach ($_SESSION['cart'] as $cartItem) {
        $productId = $cartItem['product_id'];
        $quantity = $cartItem['quantity'];

        // Insert product details into the order_details table
        $orderDetailsInsertQuery = "INSERT INTO `order_details` (`order_id`, `product_id`, `quantity`) VALUES ($orderId, $productId, $quantity)";
        $con->query($orderDetailsInsertQuery);
    }

    // Clear the cart after checkout
    $_SESSION['cart'] = [];

    echo "Order placed successfully!";
} else {
    echo "Your cart is empty.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation d'ordre</title>
</head>

<body>
    <h2>Confirmation d'achat</h2>
    <!-- You can customize this page to show order details or a thank you message -->
</body>

</html>