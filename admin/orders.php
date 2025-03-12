<?php
require '../php/config.php';
session_start();

// Handle the update of order status
if (isset($_POST['update_status'])) {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];

    // Update the order status
    $stmt = $conn->prepare("UPDATE orders SET order_status=? WHERE id=?");
    $stmt->bind_param("si", $status, $order_id);
    $stmt->execute();

    // Store the message in session to show in checkout.php
    $_SESSION['checkout_message'] = "Your order status has been updated to $status.";

    // Redirect back to orders page
    header("Location: orders.php");
    exit();
}

// Handle order deletion
if (isset($_POST['delete_order'])) {
    $order_id = $_POST['order_id'];

    $stmt = $conn->prepare("DELETE FROM orders WHERE id=?");
    $stmt->bind_param("i", $order_id);
    $stmt->execute();

    // Redirect back to orders page after deleting
    header("Location: orders.php");
    exit();
}

// Fetch orders
$result = $conn->query("SELECT * FROM orders");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Orders</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <nav>
        <div class="logo"><a href="#">MithoFood Admin</a></div>
        <ul class="nav-items">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="orders.php">Orders</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="container">
        <h2 class="heading">Order Management</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Products</th>
                    <th>Total (₨)</th>
                    <th>Payment Mode</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['products']) ?></td>
                    <td><?= number_format($row['amount_paid'], 2) ?></td>
                    <td><?= htmlspecialchars($row['pmode']) ?></td>
                    <td>
                        <span class="status <?= strtolower($row['order_status']) ?>">
                            <?= htmlspecialchars($row['order_status']) ?>
                        </span>
                    </td>
                    <td>
                        <form method="post" onsubmit="return confirmStatusChange(this);">
                            <input type="hidden" name="order_id" value="<?= $row['id'] ?>">
                            <select name="status">
                                <option value="Pending" <?= ($row['order_status'] == 'Pending') ? 'selected' : '' ?>>Pending</option>
                                <option value="Delivered" <?= ($row['order_status'] == 'Delivered') ? 'selected' : '' ?>>Delivered</option>
                                <option value="Unavailable" <?= ($row['order_status'] == 'Unavailable') ? 'selected' : '' ?>>Unavailable</option>
                            </select>
                            <button type="submit" name="update_status" class="btn">Update</button>
                        </form>
                    </td>
                    <td>
                        <form method="post" onsubmit="return confirm('Are you sure you want to delete this order?');">
                            <input type="hidden" name="order_id" value="<?= $row['id'] ?>">
                            <button type="submit" name="delete_order" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        function confirmStatusChange(form) {
            var selectedStatus = form.querySelector('select[name="status"]').value;
            if (selectedStatus === "Delivered" || selectedStatus === "Unavailable") {
                alert("You have selected " + selectedStatus + ". The status will be updated accordingly.");
            }
            return true; // Allow form submission
        }
    </script>
</body>
</html>