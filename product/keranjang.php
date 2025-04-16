<?php
session_start();
include('../includes/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['product_id'])) {
        $productId = $_POST['product_id'];

        // untuk menambahkan product
        if (!isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] = 1;
        } else {
            $_SESSION['cart'][$productId]++;
        }

        // untuk kembali halamn
        header('Location: keranjang.php');
        exit();
    }

    if (isset($_POST['delete_product_id'])) {
        $productId = $_POST['delete_product_id'];

        // buat menghapus product
        if (isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
        }

        // kembali pada halaman 
        header('Location: keranjang.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
    <link rel="shortcut icon" href="../asset/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/css/produk.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">Detik Damai.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="product.php">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout <i class="fas fa-sign-out-alt"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container cart-container">
    <h2 class="text-center mb-4">Keranjang Anda</h2>
    <?php
    if (empty($_SESSION['cart'])) {
        echo "<p>Keranjang Anda kosong.</p>";
    } else {
        $productIds = implode(',', array_keys($_SESSION['cart']));
        $query = "SELECT * FROM products WHERE id IN ($productIds)";
        $result = mysqli_query($conn, $query);

        $totalPrice = 0;
        ?>
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <?php
                $quantity = $_SESSION['cart'][$row['id']];
                $productTotal = $row['price'] * $quantity;
                $totalPrice += $productTotal;
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card cart-card">
                        <img src="../asset/images/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <p class="card-text">Harga per unit: $<?php echo $row['price']; ?></p>
                            <p class="card-text">Jumlah: <?php echo $quantity; ?></p>
                            <p class="card-text">Total: $<?php echo $productTotal; ?></p>
                            <form action="keranjang.php" method="POST" style="display:inline;">
                                <input type="hidden" name="delete_product_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-danger btn-delete">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="row">
            <div class="col-12 text-right">
                <h3 class="total-price">Total Harga: $<?php echo $totalPrice; ?></h3>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6 mb-2 mb-md-0">
                <a href="product.php" class="btn btn-shop btn-block">Kembali Belanja</a>
            </div>
            <div class="col-md-6">
                <a href="checkout.php" class="btn btn-checkout btn-block">Checkout</a>
            </div>
        </div>
        <?php
    }
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
