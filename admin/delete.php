<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

include '../php/config.php';

// Delete product by ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_query = "DELETE FROM product WHERE id = $id";
    
    if (mysqli_query($conn, $delete_query)) {
        header("Location: product.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
