<?php
include("../header/header.php");
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

        .card {
            border: none;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .pictures {
            height: 200px;
            object-fit: cover;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #343a40;
        }

        .card-text {
            color: #6c757d;
        }

        .btn-primary,
        .btn-link {
            color: #007BFF;
        }

        .btn-primary:hover,
        .btn-link:hover {
            text-decoration: none;
        }
    </style>
</head>

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
                        <img src="<?php echo $product['img_url']; ?>" class="pictures" alt="<?php echo $product['name']; ?>" class="card-img-top">
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
                            <a href="productDetail.php?product_id=<?php echo $product['id']; ?>" class="btn btn-link" style="margin-left: 10px;">View Details</a>
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