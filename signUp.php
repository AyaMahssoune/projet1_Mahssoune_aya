<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>Sign Up</title>
</head>

<body>
   <h2>Sign Up</h2>
   <form action="./process/processSignUp.php" method="post">
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

      <input type="submit" value="Register">
      <a href="../../index.php">Accueil</a>

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