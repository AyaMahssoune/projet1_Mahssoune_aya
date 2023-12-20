<?php

include './connexion.php';
function createUser(array $data)
{
    global $conn;

    $query = "INSERT INTO user VALUES (?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param(
            $stmt,
            "sss",
            $data['user_name'],
            $data['email'],
            $data['pwd']
        );

        /* Exécution de la requête */
        $result = mysqli_stmt_execute($stmt);
    }
}
/**
 * Get all users
 */
function getAllUsers()
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM user");

    $data = [];
    $i = 0;
    while ($rangeeData = mysqli_fetch_assoc($result)) {
        $data[$i] = $rangeeData;
        $i++;
    };

    return $data;
}
/**
 * Get user by id
 */

//Todo: edit to prepare
function getUserById(int $id)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id = " . $id);

    $data = mysqli_fetch_assoc($result);

    return $data;
}

function getUserByUsername(string $user_name)
{
    global $conn;

    $query = "SELECT * FROM user WHERE user.user_name = '" . $user_name . "';";

    $result = mysqli_query($conn, $query);

    // avec fetch row : tableau indexé
    $data = mysqli_fetch_assoc($result);
    return $data;
}

/**
 * Update user
 */
function updateUser(array $data)
{
    global $conn;

    $query = "UPDATE user SET user_name = ?, email = ?, pwd = ?
            WHERE user.id = ?;";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param(
            $stmt,
            "sssi",
            $data['user_name'],
            $data['email'],
            $data['pwd'],
            $data['id'],
        );

        /* Exécution de la requête */
        $result = mysqli_stmt_execute($stmt);
    }
}
/**
 * Delete user
 */
function deleteUser(int $id)
{
    global $conn;

    $query = "DELETE FROM user
                WHERE user.id = ?;";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param(
            $stmt,
            "i",
            $id,
        );

        /* Exécution de la requête */
        $result = mysqli_stmt_execute($stmt);
    }
}

//role

function createRole(int $id)
{
    global $conn;

    $query = "INSERT INTO `role`(`id`, `name`, `description`) VALUES ('','','');";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param(
            $stmt,
            "i",
            $id,
        );

        /* Exécution de la requête */
        $result = mysqli_stmt_execute($stmt);
    }
}
function getRoles()
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM role");
    $roles = [];
    $i = 0;
    while ($role = mysqli_fetch_assoc($result)) {
        $roles[$i] = $role;
        $i++;
    };
    return $roles;
}

//selectionner produits
function getAllProducts()
{
    $conn = connexionDB();
    $sql = "SELECT `id`, `name`, `quantity`, `price`, `img_url`, `description` FROM `product` WHERE id =?";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultats = $stmt->get_result();
    $products = array();
    foreach ($resultats as $product) {
        $products[] = $product;
    }
    return $products;
}

//ajouter produit
function addProduct($nom, $price, $quantity, $description)
{
    $conn = connexionDB();
    $sql = "INSERT INTO `product`(`id`, `name`, `quantity`, `price`, `img_url`, `description`) values (?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdis", $nom, $price, $quantity, $description);
    $result = $stmt->execute();
    $id = $conn->insert_id;
    $stmt->close();
    $conn->close();
    if ($result) {
        header('Location: ./manageProduct.php');
        exit();
    } else {
        echo "Error adding product";
    }
    $stmt->close();
    $conn->close();
}
//function get produit par id
function getProductById($id)
{
    $conn = connexionDB();
    $sql = "INSERT INTO `product`(`id`, `name`, `quantity`, `price`, `img_url`, `description`) values (?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $products = $result->fetch_assoc();
    return $products;
}



//CART FUNCTIONS:

function addCart($id, $quantite, $ishome = true)
{
    $_SESSION['cart'][$id] = $quantite;
    if ($ishome) {
        header('Location: ../Products.php');
        exit();
    } else {
        header('Location: ../cartPayment');
        exit();
    }
}
