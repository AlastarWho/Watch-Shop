<?php
// process_login.php
session_start();
include 'includes/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($user['username'] === 'admin' && $user['password'] === 'admin') {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'admin';
            $_SESSION['message'] = "Login successful as admin.";
            $_SESSION['message_type'] = "success";
            header("Location: product/read_product.php");
        } else {
            $_SESSION['username'] = $username;
            $_SESSION['message'] = "Login successful.";
            $_SESSION['message_type'] = "success";
            header("Location: index.php");
        }
    } else {
        $_SESSION['message'] = "Invalid username or password";
        $_SESSION['message_type'] = "danger";
        header("Location: login.php");
    }
}
?>
