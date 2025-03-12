<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

include '../php/config.php';

// Fetch the product to update
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM product WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);
}

// Update product details
if (isset($_POST['update'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    
    // Handle image upload
    if ($_FILES['product_image']['name']) {
        $target_dir = "../assets/"; // Directory to store uploaded images
        $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is an actual image or fake
        $check = getimagesize($_FILES["product_image"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            exit();
        }

        // Allow only certain file formats (JPEG, PNG, GIF)
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Only JPG, JPEG, PNG & GIF files are allowed.";
            exit();
        }

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
            $product_image = basename($_FILES["product_image"]["name"]);
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    } else {
        $product_image = $product['product_image']; // Keep the old image if no new one is uploaded
    }

    // Update product in the database
    $update_query = "UPDATE product SET product_name = '$product_name', product_price = '$product_price', product_image = '$product_image' WHERE id = $id";
    if (mysqli_query($conn, $update_query)) {
        header("Location: product.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h3>Update Product</h3>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $product['product_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="product_price">Product Price:</label>
                <input type="number" class="form-control" id="product_price" name="product_price" value="<?php echo $product['product_price']; ?>" required>
            </div>
            <div class="form-group">
                <label for="product_image">Product Image:</label><br>
                <input type="file" id="product_image" name="product_image">
                <br>
                <img src="../assets/<?php echo $product['product_image']; ?>" alt="Current Image" style="width:100px; height:100px;">
                </div>
            <button type="submit" class="btn btn-primary" name="update">Update Product</button>
        </form>
    </div>
</body>
</html>
