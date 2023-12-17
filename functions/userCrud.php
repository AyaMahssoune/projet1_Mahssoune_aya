<?php

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

//Function to connect to the database
function authentification($email, $pwd)
{
    $conn = connexionDB();
    $sql = "SELECT * FROM  user wHERE email =?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $utilisateur = $stmt->get_result();

    if ($utilisateur->num_rows >= 1) {
        $utilisateur = $utilisateur->fetch_assoc();
        if (password_verify($pwd, $utilisateur['pwd'])) {
            $_SESSION['utilisateur'] = $utilisateur['id'];
            $_SESSION['user_id'] = $utilisateur['id'];
            $_SESSION['utilisateur_nom'] = $utilisateur['nom'];
            $_SESSION['utilisateur_add'] = $utilisateur['addresse'];
            $_SESSION['utilisateur_email'] = $utilisateur['email'];
            $_SESSION['utilisateur_pscode'] = $utilisateur['postal_code'];
            $_SESSION['utilisateur_prenom'] = $utilisateur['prenom'];
            $_SESSION['role_id'] = $utilisateur['role_id'];
            header('Location: ./home.php');
        } else {
            echo "Email or password Incorrect. Try again!!";
        }
    } else {
        echo "User Not Found";
    }
}