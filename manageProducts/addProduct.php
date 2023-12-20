<?php
include("../connexion.php");
include("../header/header.php");
session_start();

// Check if the user is logged in and is a superadmin
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect product data
    $productName = $_POST['product_name'];
    $productQuantity = $_POST['product_quantity'];
    $productPrice = $_POST['product_price'];
    $productImageUrl = $_POST['product_image_url'];
    $productDescription = $_POST['product_description'];

    // Validate the data (you may want to add more validation)
    if (empty($productName) || empty($productQuantity) || empty($productPrice)) {
        $errorMessage = "Please fill in all required fields.";
    } else {
        // Insert the new product into the database
        $insertProductQuery = "INSERT INTO `product` (`name`, `quantity`, `price`, `img_url`, `description`) 
                                   VALUES ('$productName', '$productQuantity', '$productPrice', '$productImageUrl', '$productDescription')";

        if ($conn->query($insertProductQuery)) {
            // Product inserted successfully, you can also add additional logic if needed
            $successMessage = "Product added successfully.";
        } else {
            $errorMessage = "Error adding the product: " . $conn->error;
        }
    }
}
// Process the image upload
if (isset($_FILES['product_image'])) {
    $uploadDir = './images/';
    $uploadFile = $uploadDir . basename($_FILES['product_image']['name']);

    if (move_uploaded_file($_FILES['product_image']['tmp_name'], $uploadFile)) {
        // File uploaded successfully
        // You can store $uploadFile in your database or use it as needed
        echo "Image uploaded successfully.";
    } else {
        // Handle the case when the file upload fails
        echo "Error uploading image.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #f8f9fa;
            text-align: center;
        }

        .container {
            margin-top: 50px;
        }

        h2 {
            color: #007BFF;
            text-align: center;
            margin-bottom: 30px;
        }

        .alert {
            margin-top: 20px;
        }

        form {
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Ajouter Produit</h2>

        <?php if (isset($errorMessage)) : ?>
            <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
        <?php endif; ?>

        <?php if (isset($successMessage)) : ?>
            <div class="alert alert-success"><?php echo $successMessage; ?></div>
        <?php endif; ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name:</label>
                <input type="text" name="product_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="product_quantity" class="form-label">Quantity:</label>
                <input type="number" name="product_quantity" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="product_price" class="form-label">Price:</label>
                <input type="text" name="product_price" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="product_image_url" class="form-label">Image URL:</label>
                <input type="file" name="product_image_url" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="product_description" class="form-label">Description:</label>
                <textarea name="product_description" class="form-control" rows="4" required></textarea>
            </div>

            <!-- <div class="mb-3">
                <label for="product_image_path" class="form-label">Image Path:</label>
                <input type="text" name="product_image_path" class="form-control" required>
            </div> -->

            <button type="submit" class="btn btn-primary">Ajouter Produit</button>
            <a href="./products.php">Liste produits</a>
        </form>
    </div>


</body>
</body>

</html>