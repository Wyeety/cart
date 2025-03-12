<?php 
   session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>About Us - MithoFood</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
  <link rel="stylesheet" href="style/style1.css">
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
      <li><a href="index.php">Home</a></li>
      <li><a href="menu.php">Menu</a></li>
      <li><a href="contact.php">Contact us</a></li>
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

  <!-- About Us Section Start -->
  <section class="about-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h1>About MithoFood</h1>
          <p>
            Welcome to MithoFood, where we take pride in delivering delicious and healthy food to your doorstep.
            Our team is passionate about food, and we ensure every dish is crafted with the finest ingredients.
            Whether you're craving traditional Nepali dishes or something modern, we've got you covered.
            At MithoFood, quality and customer satisfaction are our top priorities.
          </p>
        </div>
        <div class="col-lg-6">
          <img src="assets/p1.png" alt="About Us" class="img-fluid">
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <h2>Our Mission</h2>
          <p>
            To provide an exceptional dining experience by offering an extensive variety of high-quality food, 
            prompt delivery, and outstanding customer service. We aim to satisfy the diverse tastes of our customers while maintaining an affordable menu.
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- About Us Section End -->

  <script src="main.js"></script>
</body>

</html>
