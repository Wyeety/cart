<?php 
   session_start();
?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Food Ordering System</title>
      <link rel="stylesheet" href="style/style1.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <!-- Start navbar -->
      <nav>
         <div class="menu-icon">
            <span class="fas fa-bars"></span>
         </div>
         <div class="logo">
            MithoFood
         </div>
         <div class="nav-items">
            <li><a href="#">Home</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
            <!-- <li><a href="login1.php">Login</a></li> -->
            <?php
						if(empty($_SESSION["email"])) // if user is not login
							{
								echo '<li><a href="login.php">Login</a> </li>';
							  // echo '<li><a href="registration.php">Register</a> </li>';
							}
						else
							{

									
									// echo  '<li><a href="your_orders.php">My Orders</a> </li>';
									echo  '<li><a href="logout.php">Logout</a> </li>';
							}

						?>
         </div>
         <div class="cancel-icon">
            <span class="fas fa-times"></span>
         </div>
      </nav>
      <!-- End navbar -->

      <!-- Display login message -->
<?php
if(isset($_SESSION['login_message'])){
    echo "<div class='message' id=loginMessage>
          <p>" . $_SESSION['login_message'] . "</p>
          </div> <br>";
    // Clear the message after displaying it
    unset($_SESSION['login_message']);
}
?>

      <!-- Start header -->
        <header>
            <div class="header__content">
              <h2>"Hard Work should be rewarded by Good Food."</h2>
              <h1>Mitho Food</h1>
            </div>
            <div class="header__image">
              <img src="assets/momo.png" alt="header" />
            </div>
          </header>
      <!-- End header -->  

      <!-- Starts menu -->
    <div class="menu">
      <div class="heading">
          <h1>POPULAR</h1>
          <h3>&mdash; MENU &mdash; </h3>
      </div>
      <div class="food-items">
          <img src="assets/aloo_chop.jpg">
          <div class="details">
              <div class="details-sub">
                  <h5>Aloo Chop</h5>
                  <h5 class="price"> 200 </h5>
              </div>
              <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit reiciendis nam non quia! Earum eveniet minus. Facilis explicabo natus nihil voluptatem eveniet pariatur.</p>
              <button><a href="menu.php">Add To Cart</a></button>
          </div>
      </div>

      <div class="food-items">
          <img src="assets/chicken_chili.jpg">
          <div class="details">
              <div class="details-sub">
                  <h5>Chicken Chili</h5>
                  <h5 class="price"> 300 </h5>
              </div>
              <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit reiciendis nam non quia! Earum eveniet minus. Facilis explicabo natus nihil voluptatem eveniet pariatur.</p>
              <button><a href="menu.php">Add To Cart</a></button>
          </div>
      </div>

      <div class="food-items">
          <img src="assets/chicken_pakora.jpg">
          <div class="details">
              <div class="details-sub">
                  <h5>Chicken Pakora</h5>
                  <h5 class="price"> 400 </h5>
              </div>
              <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit reiciendis nam non quia! Earum eveniet minus. Facilis explicabo natus nihil voluptatem eveniet pariatur.</p>
              <button><a href="menu.php">Add To Cart</a></button>
          </div>
      </div>

      <div class="food-items">
          <img src="assets/duck_choila.jpg">
          <div class="details">
              <div class="details-sub">
                  <h5>Duck Choila</h5>
                  <h5 class="price"> 500 </h5>
              </div>
              <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit reiciendis nam non quia! Earum eveniet minus. Facilis explicabo natus nihil voluptatem eveniet pariatur.</p>
              <button><a href="menu.php">Add To Cart</a></button>
          </div>
      </div>

      <div class="food-items">
          <img src="assets/rice_pudding.jpg">
          <div class="details">
              <div class="details-sub">
                  <h5>Rice Pudding</h5>
                  <h5 class="price"> 200 </h5>
              </div>
              <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit reiciendis nam non quia! Earum eveniet minus. Facilis explicabo natus nihil voluptatem eveniet pariatur.</p>
              <button><a href="menu.php">Add To Cart</a></button>
          </div>
      </div>

      <div class="food-items">
          <img src="assets/nepali_doughnuts.jpg">
          <div class="details">
              <div class="details-sub">
                  <h5>Nepali Doughnuts</h5>
                  <h5 class="price"> 100 </h5>
              </div>
              <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit reiciendis nam non quia! Earum eveniet minus. Facilis explicabo natus nihil voluptatem eveniet pariatur.</p>
              <button><a href="menu.php">Add To Cart</a></button>
          </div>
      </div>
  </div>
  <!-- Ends menu -->

  <!-- Starts review -->
  <div class="testimonials">
   <div class="heading">
     <h1>Testimonials</h1>
   </div>
   
   <div class="inner">

   <div class="row">
     <div class="col">
       <div class="testimonial">
         <img src="assets/p1.png" alt="">
         <div class="name">Full name</div>
         <div class="stars">
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
         </div>

         <p>
           Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
         </p>
       </div>
     </div>

     <div class="col">
       <div class="testimonial">
         <img src="assets/p2.png" alt="">
         <div class="name">Full name</div>
         <div class="stars">
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="far fa-star"></i>
           <i class="far fa-star"></i>
         </div>

         <p>
           Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
         </p>
       </div>
     </div>

     <div class="col">
       <div class="testimonial">
         <img src="assets/p3.png" alt="">
         <div class="name">Full name</div>
         <div class="stars">
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="far fa-star"></i>
         </div>

         <p>
           Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
         </p>
       </div>
     </div>
   </div>
 </div>
</div>
<!-- Ends review -->
  
<!-- Starts address -->
 <section class="address" id="contact">
   <div class="section__container address__container">
     <h3>DELIVERY ADDRESS</h3>
     <form action="/">
       <input type="text" placeholder="Enter your delivery address" />
       <button class="btn" type="submit">FIND</button>
     </form>
   </div>
 </section>

 <!-- Starts footer -->
 <footer class="footer">
   <div class="section__container footer__container">
      <div class="footer__logo">
         MithoFood
      </div>
     <div class="footer__content">
       <p>
         Welcome to Mitho Food Company, where passion for exceptional food and
         genuine hospitality come together. Our story is one of dedication to
         crafting the perfect food experience, from sourcing the finest
         ingredients to delivering unparalleled taste in every bite.
       </p>
     </div>
   </div>
   <div class="footer__bar">
     Copyright © 2024 Mitho Food. All rights reserved.
   </div>
 </footer>
 <!-- Ends footer -->

      <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus vitae et atque? Ipsum, voluptatibus ducimus ex iure voluptas blanditiis eum facere, quisquam id, harum fugiat. Pariatur, earum. Quas, laboriosam nam.</p> -->
       <script src="main.js"></script> 
</body>
</html>

