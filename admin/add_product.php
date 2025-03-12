<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

include '../php/config.php';

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_qty = $_POST['product_qty'];
    $product_image = $_FILES['product_image']['name']; // Image name
    $target = "../assets/" . basename($product_image); // Target directory

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO product (product_name, product_price, product_qty, product_image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdss", $product_name, $product_price, $product_qty, $product_image); // "sdss" means string, double, string, string

    if ($stmt->execute() && move_uploaded_file($_FILES['product_image']['tmp_name'], $target)) {
        header("Location: product.php");
        exit();
    } else {
        echo "Error adding product: " . $stmt->error;
    }

    $stmt->close(); // Close the statement
}

$conn->close(); // Close the connection
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Sahil Kumar">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Product - MithoFood</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
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
            <li><a href="product.php">Product List</a></li>
            <li><a href="add_product.php">Add Product</a></li>
            <?php
            if (empty($_SESSION["email"])) {
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
        <h3>Add New Product</h3>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" class="form-control" name="product_name" required>
            </div>
            <div class="form-group">
                <label for="product_price">Product Price:</label>
                <input type="number" class="form-control" name="product_price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="product_qty">Product Quantity:</label>
                <input type="number" class="form-control" name="product_qty" required>
            </div>
            <div class="form-group">
                <label for="product_image">Product Image:</label>
                <input type="file" class="form-control-file" name="product_image" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
</body>
</html>
