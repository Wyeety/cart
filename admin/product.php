<?php 
session_start(); 
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

include '../php/config.php';

// Fetch all products for display
$result = mysqli_query($conn, "SELECT * FROM product");
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
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="add_product.php">Add Product</a></li>
        <li><a href="orders.php">Orders</a></li>

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
    <h3>Product List</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php echo number_format($row['product_price'], 2); ?>/-</td>
                <td><img src="../assets/<?php echo $row['product_image']; ?>" alt="Image"></td>
                <td>
                    <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                    <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirmDelete()">Delete</a>
                    </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
  </div>

  <script src="../main.js"></script>
  <script type="text/javascript">
function confirmDelete() {
    return confirm("Are you sure you want to delete this product?");
}
</script>

</body>
</html>
