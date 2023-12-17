<?php
require_once('../connexion.php');
require_once('../functions/userCrud.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $required_fields = ['user_name', 'email', 'pwd', 'street_name', 'street_nb', 'city', 'province', 'zip_code', 'country'];
    $errors = [];

    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = "The '$field' field is required.";
        }
    }

    if (!empty($errors)) {
        $error_message = implode("<br>", $errors);
        header("Location: ../signUp.php?error=$error_message");
        exit();
    }

    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $street_name = $_POST['street_name'];
    $street_nb = $_POST['street_nb'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $zip_code = $_POST['zip_code'];
    $country = $_POST['country'];

    $hashed_password = password_hash($pwd, PASSWORD_DEFAULT);

    $sql = "INSERT INTO `user` (user_name, email, pwd, fname, lname, billing_address_id,shipping_address_id, token,role_id) 
                 VALUES ('$user_name', '$email', '$hashed_password','','','','','', 3)";


    if (mysqli_query($conn, $sql)) {
        $user_id = mysqli_insert_id($conn);

        $address_sql = "INSERT INTO `address` (`street_name`, `street_nb`, `city`, `province`, `zip_code`, `country`)
                        VALUES ('$street_name', '$street_nb', '$city', '$province', '$zip_code', '$country')";

        if (mysqli_query($conn, $address_sql)) {
            $address_id = mysqli_insert_id($conn);

            $sql_update_user = "UPDATE `user` SET `billing_address_id` = $address_id, `shipping_address_id` = $address_id
                                WHERE `id` = $user_id";
            if (mysqli_query($conn, $sql_update_user)) {
                header("Location: ../managesession/login.php");
            } else {
                echo "Error updating user with address ID: " . mysqli_error($conn);
            }
        } else {
            echo "Error inserting address: " . mysqli_error($conn);
        }
    } else {
        echo "Error registering user: " . mysqli_error($conn);
    }
} else {
    echo "Access not allowed";
}

// Fermer la connexion
mysqli_close($conn);
