<?php
include("../connexion.php");
session_start();

// Check if the user is logged in and is a superadmin
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect product data
    $productName = $_POST['product_name'];
    $productQuantity = $_POST['product_quantity'];
    $productPrice = $_POST['product_price'];
    $productImageUrl = $_POST['img_url'];
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
if (isset($_FILES['img_url'])) {
    $uploadDir = '/img_shop';
    $uploadFile = $uploadDir . basename($_FILES['img_url']['name']);

    if (move_uploaded_file($_FILES['img_url']['tmp_name'], $uploadFile)) {
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
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-control textarea {
            resize: vertical;
        }

        .btn-primary,
        .btn {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }

        .btn-primary:hover,
        .btn:hover {
            background-color: #0056b3;
        }

        .btn-list {
            display: block;
            margin-top: 10px;
            text-align: center;
            color: #007BFF;
            text-decoration: none;
        }

        .btn-list:hover {
            text-decoration: underline;
        }
    </style>

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
                <label for="product_name" class="form-label">Nom produit:</label>
                <input type="text" name="product_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="product_quantity" class="form-label">Quantite:</label>
                <input type="number" name="product_quantity" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="product_price" class="form-label">Prix:</label>
                <input type="text" name="product_price" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="img_url" class="form-label">Image URL:</label>
                <input type="file" name="img_url" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="product_description" class="form-label">Description:</label>
                <textarea name="product_description" class="form-control" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter Produit</button>
            <a class="btn" href="./products.php">Liste produits</a>
            <a class="btn" href="../Users/adminTab.php">Admin Table</a>
        </form>
    </div>


</body>
</body>

</html>