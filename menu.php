<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>All Menu</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <link rel="stylesheet" href="style/style1.css">
  <style>
    /* Remove container padding and margin */
.container-fluid {
    padding: 0;
}

.row {
    margin-left: -5px; /* Offset the left padding */
    margin-right: -5px; /* Offset the right padding */
}

/* Remove margin from columns */
.col-sm-6, .col-md-4, .col-lg-3 {
    padding-left: 0;
    padding-right: 0;
    margin-bottom: 15px;
}

/* Optional: Adjust card margin if needed */
.card {
  margin-top: 10px; /* Add vertical spacing only */
  margin-bottom: 10px;
}
.menu-heading {
    text-align: center;
    padding: 20px;
    background-color: red; /* Navbar background color */
    color: white;              /* Navbar text color */
    font-size: 2rem;
    font-weight: bold;
    margin-top: 10px;

}

.menu-heading h1 {
    margin: 0;
    padding: 0;
}

  </style>
</head>

<body>
   <!-- Navbar Start -->
<nav>
   <div class="menu-icon">
      <span class="fas fa-bars"></span>
   </div>
   <div class="logo"><a href="index.php">MithoFood</a>
      
   </div>
   <div class="nav-items">
      <li><a href="index.php">Home</a></li>
      <li><a href="menu.php">Menu</a></li>
      <li><a href="checkout.php">Checkout</a></li>
      <li><a href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a></li>
      <!-- User Authentication (Login/Logout) -->
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

<!-- Menu Heading Start -->
<div class="menu-heading">
   <h1>Menu</h1>
</div>
<!-- Menu Heading End -->


  <!-- Displaying Products Start -->
<div class="container-fluid">
    <div id="message"></div>
    <div class="row mt-2 pb-3">
      <?php
        include 'php/config.php';
        $stmt = $conn->prepare('SELECT * FROM product');
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()):
      ?>
      <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
        <div class="card-deck">
          <div class="card p-2 border-secondary mb-2">
            <img src="<?= $row['product_image'] ?>" class="card-img-top" height="250">
            <div class="card-body p-1">
              <h4 class="card-title text-center text-info"><?= $row['product_name'] ?></h4>
              <h5 class="card-text text-center text-danger"><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['product_price'],2) ?>/-</h5>
            </div>
            <div class="card-footer p-1">
              <form action="" class="form-submit">
                <div class="row p-2">
                  <div class="col-md-6 py-1 pl-4">
                    <b>Quantity : </b>
                  </div>
                  <div class="col-md-6">
                    <input type="number" class="form-control pqty" value="<?= $row['product_qty'] ?>">
                  </div>
                </div>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
</div>
<!-- Displaying Products End -->


  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();

      var pqty = $form.find(".pqty").val();

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
  <script src="main.js"></script>
</body>

</html>