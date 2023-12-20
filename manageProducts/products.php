<?php
include("../connexion.php");

// Fetch products from the database using MySQLi
$productQuery = "SELECT * FROM `product`";
$result = mysqli_query($conn, $productQuery);

// Check if there are products
if ($result) {
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $products = []; // Empty array if no products found
    echo "Erreur lors de la récupération des produits : " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

// Check if there are products
if (count($products) > 0) {
    // Products found, you can now use the $products array
} else {
    $products = []; // Empty array if no products found
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .container {
            text-align: center;
        }

        h2 {
            text-align: center;
            color: #343a40;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin: 10px 0;
            color: #343a40;
        }

        .image {
            width: 200px;
        }

        input,
        .btn {
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 16px;
        }

        input,
        .btn[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .lien,
        .btn {
            text-align: center;
            text-decoration: none;
            color: #007bff;
            margin-top: 15px;
            display: inline-block;
        }
    </style>
</head>

<div class="navbar">
    <img id="logo" src="../img/logo.jpg" width="60px" alt="">
    <div class="nav"><a href="../index.php">home</a></div>
    <div class="nav"><a href="../manageSession/logout.php">logout</a></div>

</div>

<div class="container mt-5">
    <h2 class="mb-4">Liste des produits</h2>

    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php
        // Check if there are products to display
        if (!empty($products)) {
            foreach ($products as $product) {
        ?>
                <div class="col">
                    <div class="card h-100 square-container">
                        <img class='image' src="<?php echo $product['img_url']; ?>" class="pictures" alt="<?php echo $product['name']; ?>" class="img-fluid">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['name']; ?></h5>
                            <p class="card-text">Prix: $<?php echo $product['price']; ?></p>
                            <p class="card-text">Description: <?php echo $product['description']; ?></p>
                        </div>
                        <div class="card-footer">
                            <form action="../cartPayment.php" method="post" style="display: inline;">
                                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                <input type="submit" value="Add to Cart" class="btn btn-primary">
                            </form>
                            <a href="productDetail.php?product_id=<?php echo $product['id']; ?>" class="btn btn-link" style="margin-left: 10px;">Detail produit</a>
                        </div>
                    </div>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="col">
                <p>No products available.</p>
            </div>
        <?php
        }
        ?>
    </div>
</div>

</html>