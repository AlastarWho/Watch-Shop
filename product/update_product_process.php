<?php
session_start();
include('../includes/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Handle image upload if new image is provided
    if ($_FILES['new_image']['error'] === 0) {
        $newImage = $_FILES['new_image'];
        $newImageName = $newImage['name'];
        $newImagePath = '../assets/images/' . $newImageName;
        move_uploaded_file($newImage['tmp_name'], $newImagePath);

        // Update product with new image
        $query = "UPDATE products SET name = ?, description = ?, price = ?, image = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'ssisi', $name, $description, $price, $newImageName, $id);
    } else {
        // Update product without changing image
        $query = "UPDATE products SET name = ?, description = ?, price = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'ssii', $name, $description, $price, $id);
    }

    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        $_SESSION['message'] = 'Product updated successfully.';
    } else {
        $_SESSION['message'] = 'Failed to update product.';
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

header('Location: read_product.php');
exit();
?>
