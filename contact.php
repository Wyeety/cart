<?php 
   session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Contact Us - MithoFood</title>
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
      <li><a href="about.php">About Us</a></li>
      <li><a href="contact.php">Contact Us</a></li>
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

  <!-- Contact Section Start -->
  <section class="contact-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <div class="contact-form">
            <h2>Contact Us</h2>
            <form action="contact_process.php" method="post">
              <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
              </div>
              <div class="form-group">
                <label for="email">Your Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
              </div>
              <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" class="form-control" placeholder="Enter subject" required>
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" class="form-control" rows="5" placeholder="Enter your message" required></textarea>
              </div>
              <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Send Message</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Contact Section End -->

  <script src="main.js"></script>
</body>

</html>
