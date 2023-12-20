<?php
include('../connexion.php');
include('../header/header.php');
// Vérifie si le paramètre 'product_id' est défini dans l'URL
if (isset($_GET['product_id'])) {
    // Récupère l'ID du produit depuis l'URL
    $productId = $_GET['product_id'];

    // Prépare la requête SQL pour récupérer les détails du produit
    $productQuery = "SELECT * FROM `product` WHERE `id` = $productId";

    // Exécute la requête SQL
    $result = mysqli_query($conn, $productQuery);

    // Vérifie s'il y a des résultats
    if ($result) {
        // Vérifie s'il y a au moins un produit trouvé
        if (mysqli_num_rows($result) > 0) {
            // Récupère les détails du produit
            $product = mysqli_fetch_assoc($result);
        } else {
            // Gère le cas où le produit n'est pas trouvé
            header("Location: products.php");
            exit();
        }
    } else {
        // Gère les erreurs de requête SQL
        echo "Erreur de requête : " . mysqli_error($conn);
        exit();
    }
} else {
    // Gère le cas où l'ID du produit est manquant
    header("Location: products.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail produit</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        h2 {
            color: #007BFF;
            text-align: center;
            margin-bottom: 30px;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2rem;
            color: #343a40;
        }

        .btn-primary,
        .btn-secondary {
            color: #007BFF;
        }

        .btn-primary:hover,
        .btn-secondary:hover {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2><?php echo $product['name']; ?> - Detail de produit</h2>

        <img src="<?php echo $product['img_url']; ?>" alt="<?php echo $product['name']; ?>" class="img-fluid">
        <p>Price: $<?php echo $product['price']; ?></p>

        <form action="cart.php" method="post">
            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
            <button type="submit" class="btn btn-primary">Ajouter au Panier</button>
        </form>

        <p><a href="products.php" class="btn btn-secondary">Liste Products</a></p>
    </div>
</body>

</html>