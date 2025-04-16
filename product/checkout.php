<?php
session_start();
include('../includes/database.php');

// Function to sanitize user input
function sanitize($conn, $input) {
    return mysqli_real_escape_string($conn, trim($input));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize inputs
    $name = sanitize($conn, $_POST['name']);
    $address = sanitize($conn, $_POST['address']);
    $phone = sanitize($conn, $_POST['phone']);
    $shipping_method = sanitize($conn, $_POST['shipping_method']);
    $shipping_cost = 0;

    // Set shipping cost based on selected method
    switch ($shipping_method) {
        case 'standard':
            $shipping_cost = 10;
            break;
        case 'express':
            $shipping_cost = 20;
            break;
        case 'overnight':
            $shipping_cost = 30;
            break;
    }

    $total_price = $_SESSION['total_price'] + $shipping_cost;

    // Save order details to the database using prepared statements
    $query = "INSERT INTO orders (name, address, phone, shipping_method, shipping_cost, total_price) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssssdi", $name, $address, $phone, $shipping_method, $shipping_cost, $total_price);
    mysqli_stmt_execute($stmt);
    $order_id = mysqli_insert_id($conn);
    mysqli_stmt_close($stmt);

    // Save ordered products to the database using prepared statements
    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        $query = "INSERT INTO order_items (order_id, product_id, quantity) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "iii", $order_id, $product_id, $quantity);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    // Clear the cart
    $_SESSION['cart'] = array();

    // Redirect to a confirmation page
    header('Location: confirmation.php');
    exit();
}

// Fetch products in the cart
if (empty($_SESSION['cart'])) {
    header('Location: keranjang.php');
    exit();
}

$product_ids = implode(',', array_keys($_SESSION['cart']));
$query = "SELECT * FROM products WHERE id IN ($product_ids)";
$result = mysqli_query($conn, $query);

// Check if query executed successfully and result is not null
if (!$result || mysqli_num_rows($result) == 0) {
    // Handle error or redirect
    header('Location: keranjang.php');
    exit();
}

$total_price = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="shortcut icon" href="../asset/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/css/produk.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Additional styles for checkout page */
        .checkout-label i {
            margin-right: 10px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                    <a class="nav-link" href="keranjang.php">Keranjang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout <i class="fas fa-sign-out-alt"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container checkout-container mt-5">
    <h2 class="text-center mb-4">Checkout</h2>
    <div class="row">
        <div class="col-md-8 mb-4">
            <form action="checkout.php" method="POST" class="checkout-form">
                <div class="form-group">
                    <label for="name" class="checkout-label"><i class="fas fa-user"></i> Nama Lengkap</label>
                    <input type="text" class="form-control checkout-input" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="address" class="checkout-label"><i class="fas fa-map-marker-alt"></i> Alamat</label>
                    <textarea class="form-control checkout-input" id="address" name="address" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="phone" class="checkout-label"><i class="fas fa-phone"></i> Nomor HP</label>
                    <input type="text" class="form-control checkout-input" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="shipping_method" class="checkout-label"><i class="fas fa-truck"></i> Pilih Metode Ongkos Kirim</label>
                    <select class="form-control checkout-select" id="shipping_method" name="shipping_method">
                        <option value="standard">JNT Express - $10</option>
                        <option value="express">GOJEK Delivery - $20</option>
                        <option value="overnight">SICEPAT Express - $30</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block checkout-btn">Proses Checkout</button>
            </form>
        </div>
        <div class="col-md-4">
            <h4 class="checkout-title">Detail Order</h4>
            <ul class="list-group checkout-list mb-4">
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <?php
                    $quantity = $_SESSION['cart'][$row['id']];
                    $product_total = $row['price'] * $quantity;
                    $total_price += $product_total;
                    ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center checkout-item">
                        <div>
                            <span class="checkout-item-name"><?php echo htmlspecialchars($row['name']); ?></span>
                            <span class="ml-3 checkout-item-quantity">x <?php echo $quantity; ?></span>
                        </div>
                        <span class="checkout-item-price">$<?php echo $product_total; ?></span>
                    </li>
                <?php endwhile; ?>
            </ul>
            <ul class="list-group checkout-list mb-4">
                <li class="list-group-item d-flex justify-content-between align-items-center checkout-total">
                    <strong class="checkout-total-label">Subtotal</strong>
                    <span class="checkout-total-value">$<?php echo $total_price; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center checkout-shipping">
                    <strong class="checkout-shipping-label">Ongkos Kirim</strong>
                    <span id="shipping-cost" class="checkout-shipping-value">$10</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center checkout-grand-total">
                    <strong class="checkout-grand-total-label">Total</strong>
                    <span id="total-price" class="checkout-grand-total-value">$<?php echo $total_price + 10; ?></span>
                </li>
            </ul>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#shipping_method').change(function() {
            var shipping_cost = 0;
            var selected_method = $(this).val();
            switch (selected_method) {
                case 'standard':
                    shipping_cost = 10;
                    break;
                case 'express':
                    shipping_cost = 20;
                    break;
                case 'overnight':
                    shipping_cost = 30;
                    break;
            }
            $('#shipping-cost').text('$' + shipping_cost);
            var subtotal = <?php echo $total_price; ?>;
            var total_price = subtotal + shipping_cost;
            $('#total-price').text('$' + total_price);
        });
    });
</script>
</body>
</html>
