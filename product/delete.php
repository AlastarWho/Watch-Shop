<?php
session_start();
include('../includes/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    // Lakukan penghapusan produk dari database
    $query = "DELETE FROM products WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $productId);
        mysqli_stmt_execute($stmt);

        // Cek jika penghapusan berhasil
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            $_SESSION['message'] = "Produk berhasil dihapus.";
        } else {
            $_SESSION['message'] = "Gagal menghapus produk.";
        }

        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['message'] = "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    $_SESSION['message'] = "Akses tidak valid.";
}

// Redirect kembali ke halaman utama
header("Location: ../index.php");
exit();
?>
