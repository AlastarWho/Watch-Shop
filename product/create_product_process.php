<?php
session_start();
include('../includes/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $target = "../asset/images/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $query = "INSERT INTO products (name, description, price, image) VALUES ('$name', '$description', '$price', '$image')";
        if (mysqli_query($conn, $query)) {
            header('Location: product.php'); // Perbaiki path menuju product.php
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Failed to upload image";
    }
}

mysqli_close($conn);
?>
