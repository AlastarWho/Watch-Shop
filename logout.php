<?php
session_start();

// Menghapus semua variabel session
session_unset();

// Menghancurkan session
session_destroy();

// Redirect ke halaman login
header("Location: login.php");
exit();
?>
