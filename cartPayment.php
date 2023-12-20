<?php
include('./connexion.php');
include('./header/header.php');
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Check if a product is added to the cart
if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    // Check if the product is not already in the cart
    if (!isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] = [
            'quantity' => 1, // Initial quantity is 1
            'product_id' => $productId
        ];
    }
}

// Check if quantity is updated
if (isset($_POST['update_quantity'])) {
    // Check if product_id and quantity are set
    if (isset($_POST['product_id'], $_POST['quantity'])) {
        $productId = $_POST['product_id'];
        $quantity = $_POST['quantity'];

        // Check if the product is in the cart
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] = $quantity;
        } else {
            echo "Product not found in the cart.";
        }
    } else {
        echo "Product ID or quantity not provided.";
    }
}

// Check if a product is removed from the cart
if (isset($_POST['remove_product'])) {
    // Check if product_id is set
    if (isset($_POST['product_id'])) {
        $productId = $_POST['product_id'];

        // Check if the product is in the cart
        if (isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
        } else {
            echo "Product not found in the cart.";
        }
    } else {
        echo "Product ID not provided.";
    }
}

// Check if the checkout button is clicked
if (isset($_POST['checkout'])) {
    // Redirect to the confirm.php page for order confirmation
    header("Location: order.php");
    exit();
}
?>


<body>
    <center><h3>Shopping Cart</h3></center>
<?php
// Check if the cart is not empty
if (!empty($_SESSION['cart'])) {
    $totalAmount = 0;
    ?>
    <div class="container mt-5">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Product Image</th>
                    <th>Product Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
<?php
foreach ($_SESSION['cart'] as $cartItem) {
    $productId = $cartItem['product_id'];
    $productQuery = "SELECT * FROM `product` WHERE `id` = $productId";
    $result = mysqli_query($con, $productQuery);

    if ($result) {
        $product = mysqli_fetch_assoc($result);
        $productPrice = $product['price'];
        $quantity = $cartItem['quantity'];
        $totalPrice = $quantity * $productPrice;

        $totalAmount += $totalPrice;
        ?>
        <tr>
            <td><img src="<?php echo $product['img_url']; ?>" alt="<?php echo $product['name']; ?>" width="50"></td>
            <td><?php echo $productPrice; ?></td>
            <td>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                    <div class="input-group">
                        <input type="number" name="quantity" value="<?php echo $quantity; ?>" min="1" class="form-control">
                        <div class="input-group-append">
                            <input type="submit" name="update_quantity" value="Mettre à jour" class="btn btn-outline-secondary">
                        </div>
                    </div>
                </form>
            </td>
            <td><?php echo $totalPrice; ?></td>
            <td>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                    <input type="submit" name="remove_product" value="Supprimer" class="btn btn-danger">
                </form>
            </td>
        </tr>
        <?php
    }
}
?>
            </tbody>
        </table>
        
        <p class="lead">Total Amount: $<?php echo $totalAmount; ?></p>
        
        <!-- Add a checkout button -->
        <form action="confirm.php" method="post">
            <input type="submit" name="checkout" value="Checkout" class="btn btn-primary">
        </form>
    </div>

<?php } else { ?>
    <div class="container mt-5">
        <p class="lead">Your cart is empty.</p>
    </div>
<?php } ?>

<div class="container mt-3">
    <a href="products.php" class="btn btn-info">Continue Shopping</a>
</div>


</body>
</html>