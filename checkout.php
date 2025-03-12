<?php
session_start();
require 'php/config.php';

// Check if there is a session message to show
if (isset($_SESSION['checkout_message'])) {
    echo "<script>alert('" . $_SESSION['checkout_message'] . "');</script>";
    unset($_SESSION['checkout_message']); // Clear the session message after displaying it
}

// Fetch cart items and calculate the total amount
$grand_total = 0;
$allItems = '';
$items = [];

$sql = "SELECT CONCAT(product_name, '(', qty, ')') AS ItemQty, total_price FROM cart";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $grand_total += $row['total_price'];
    $items[] = $row['ItemQty'];
}
$allItems = implode(', ', $items);

// Handle form submission to place an order
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['place_order'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $pmode = $_POST['pmode'];
    
    // Insert order details into the database
    $stmt = $conn->prepare("INSERT INTO orders (name, email, phone, address, pmode, products, amount_paid, order_status) VALUES (?, ?, ?, ?, ?, ?, ?, 'Pending')");
    $stmt->bind_param("ssssssd", $name, $email, $phone, $address, $pmode, $allItems, $grand_total);
    
    if ($stmt->execute()) {
        // Clear the cart after order is placed
        $conn->query("DELETE FROM cart");

        // Store success message
        $_SESSION['status_update_message'] = "Your order has been placed successfully!";
        header("Location: checkout.php");
        exit();
    } else {
        echo "<script>alert('Something went wrong! Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Checkout</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <link rel="stylesheet" href="style/style1.css">
</head>

<body>
    <!-- Navbar Start -->
    <nav>
        <div class="menu-icon">
            <span class="fas fa-bars"></span>
        </div>
        <div class="logo"><a href="index.php">MithoFood</a></div>
        <div class="nav-items">
            <li><a href="index.php">Home</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="checkout.php">Checkout</a></li>
            <li><a href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a></li>
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
        <div class="row justify-content-center">
            <div class="col-lg-6 px-4 pb-4" id="order">
                <h4 class="text-center text-info p-2">Complete your order!</h4>

                <div class="jumbotron p-3 mb-2 text-center">
                    <h6 class="lead"><b>Product(s): </b><?= $allItems; ?></h6>
                    <h6 class="lead"><b>Delivery Charge: </b>Free</h6>
                    <h5><b>Total Amount Payable: </b><?= number_format($grand_total, 2) ?>/-</h5>
                </div>

                <form action="" method="post">
                    <input type="hidden" name="products" value="<?= $allItems; ?>">
                    <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">

                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" required>
                    </div>
                    <div class="form-group">
                        <textarea name="address" class="form-control" rows="3" placeholder="Enter Delivery Address Here..." required></textarea>
                    </div>

                    <h6 class="text-center lead">Select Payment Mode</h6>
                    <div class="form-group">
                        <select name="pmode" class="form-control" required>
                            <option value="" selected disabled>-Select Payment Mode-</option>
                            <option value="cod">Cash On Delivery</option>
                            <option value="netbanking">Net Banking</option>
                            <option value="cards">Debit/Credit Card</option>
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="submit" name="place_order" class="btn btn-danger btn-lg">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
