<!-- index.php -->
<?php
session_start();

// Cek apakah pengguna sudah login atau belum
if (!isset($_SESSION['username'])) {
    // Jika belum login, redirect ke halaman login
    header("Location: login.php");
    exit();
}

// Ambil username dari session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to WatchShop</title>
    <link rel="shortcut icon" href="asset/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="asset/css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <?php include 'includes/navbar.php'; ?>

    <div id="videoCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="video-container">
                    <video autoplay muted loop>
                        <source src="asset/video.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
            <!-- Add more carousel items as needed -->
        </div>


     
    <section class="service_section">
    <div class="container">
        <div class="heading_container">
            <h2>Service Kami</h2>
            <hr style="width: 50%; margin: auto; margin-bottom: 30px; border-color: black;">
            <p>Detik Damai! menyediakan layanan-layanan eksklusif untuk memenuhi kebutuhan Anda dalam dunia jam tangan. Berikut adalah beberapa layanan unggulan kami:</p>
        </div>
        <div class="service_container">
            <div class="item">
                <i class="fas fa-clock icon"></i>
                <h5>Koleksi Jam Tangan Premium</h5>
                <p>Temukan berbagai koleksi jam tangan premium dari merek terkemuka dengan kualitas terbaik dan desain yang elegan.</p>
            </div>
            <div class="item">
                <i class="fas fa-shipping-fast icon"></i>
                <h5>Pengiriman Cepat</h5>
                <p>Nikmati layanan pengiriman cepat untuk memastikan jam tangan impian Anda tiba tepat waktu.</p>
            </div>
            <div class="item">
                <i class="fas fa-headset icon"></i>
                <h5>Layanan Pelanggan 24/7</h5>
                <p>Tim kami siap membantu Anda 24 jam sehari, 7 hari seminggu untuk menjawab pertanyaan dan membantu dengan pembelian Anda.</p>
            </div>
        </div>
    </div>
</section>

<div id="imageCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="asset/images/foto1.png" class="d-block w-100" alt="Image 1">
            </div>
            <div class="carousel-item">
                <img src="asset/images/foto2.png" class="d-block w-100" alt="Image 2">
            </div>
            <div class="carousel-item">
                <img src="asset/images/foto3.png" class="d-block w-100" alt="Image 3">
            </div>
            <div class="carousel-item">
                <img src="asset/images/foto4.png" class="d-block w-100" alt="Image 3">
            </div>
           
        </div>

    
        <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


 <!-- Testimoni Section -->
 <section class="testimoni_section">
    <div class="container">
        <div class="heading_container">
            <h2>Testimoni Pelanggan</h2>
            <hr>
            <p>Apa yang pelanggan kami katakan tentang kami.</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-box">
                    <p>"Pelayanan sangat memuaskan, kualitas jam tangan sangat bagus!"</p>
                    <h5>- Cristiano Ronaldo</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-box">
                    <p>"Pengiriman cepat dan produk sesuai dengan deskripsi."</p>
                    <h5>- Atta geledeg</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="testimonial-box">
                    <p>"Sangat merekomendasikan WatchShop untuk semua kebutuhan jam tangan."</p>
                    <h5>- Jhon Wick</h5>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include 'includes/footer.php'; ?>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>
