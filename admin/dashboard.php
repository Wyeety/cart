<?php 
session_start(); 
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Dashboard - MithoFood</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- Navbar Start -->
  <nav>
    <div class="menu-icon">
      <span class="fas fa-bars"></span>
    </div>
    <div class="logo">
      <a href="index.php">MithoFood</a>
    </div>
    <div class="nav-items">
        <li><a href="product.php">Product List</a></li>
        <li><a href="add_product.php">Add Product</a></li>
        <?php
        if(empty($_SESSION["email"])) {
            echo '<li><a href="login.php">Login</a></li>';
        } else {
            echo '<li><a href="logout.php">Logout</a></li>';
        }
        ?>
    </div>
    <div class="cancel-icon">
      <span class="fas fa-times"></span>
    </div>
  </nav>
  <!-- Navbar End --> 

  <div class="container">
    <h3>Welcome, Admin!</h3>
    <p>You can manage your products from here.</p>
    <p><a href="product.php" class="btn btn-primary">Go to Product List</a></p>
  </div>

  <script src="../main.js"></script>
</body>
</html>
