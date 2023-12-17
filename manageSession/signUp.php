<?php
include '../header/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="">
   <title class="p" color='red'>Sign Up</title>
   <style>
      .pageTitle {
         font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
         color: #0056b3;
         text-align: center;
      }

      .signup-container {
         max-width: 400px;
         margin: 50px auto;
         padding: 20px;
         background-color: #ffffff;
         border: 1px solid #dddddd;
         border-radius: 5px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

      input {
         width: 100%;
         padding: 10px;
         margin-bottom: 10px;
         box-sizing: border-box;
         border: 1px solid #ced4da;
         border-radius: 4px;
         font-size: 16px;
      }

      input[type="submit"] {
         background-color: #007bff;
         color: white;
         cursor: pointer;
      }

      input[type="submit"]:hover {
         background-color: #0056b3;
      }

      a {
         text-align: center;
         text-decoration: none;
         color: #007bff;
         margin-top: 15px;
         display: inline-block;
      }

      a:hover {
         text-decoration: underline;
      }

      .error-message {
         color: red;
         text-align: center;
      }
   </style>
</head>

<body>
   <div class="signup-container">
      <h2 class="pageTitle">S'authentifier</h2>
      <form action="./processSignUp.php" method="post">
         <!-- Fields for the 'user' table -->
         <label for="user_name">Username:</label>
         <input type="text" name="user_name">
         <br>
         <label for="email">Email:</label>
         <input type="email" name="email">
         <br>
         <label for="pwd">Password:</label>
         <input type="password" name="pwd">
         <br>

         <!-- Additional fields for the 'address' table -->
         <label for="street_name">Street Name:</label>
         <input type="text" name="street_name">
         <br>
         <label for="street_nb">Street Number:</label>
         <input type="text" name="street_nb">
         <br>
         <label for="city">City:</label>
         <input type="text" name="city">
         <br>
         <label for="province">Province:</label>
         <input type="text" name="province">
         <br>
         <label for="zip_code">Zip Code:</label>
         <input type="text" name="zip_code">
         <br>
         <label for="country">Country:</label>
         <input type="text" name="country">
         <br>

         <input type="submit" value="s'inscrire">
         <label class="form-check-label" for="exampleCheck1">Deja member?<a href="./login.php"> Login</a></label>
         <a href="../index.php">Accueil</a>
      </form>
   </div>
   <?php
   // Display error messages if they exist
   if (isset($_GET['error'])) {
      $error = $_GET['error'];
      echo "<p style='color:red'>$error</p>";
   }
   ?>
   </form>
</body>

</html>
<?php
include '../footer.php';
?>