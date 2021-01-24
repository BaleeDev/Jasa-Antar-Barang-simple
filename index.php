<?php
@session_start();
include 'db.php';

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="icon" href="./assets/img/logo.png" class="rounded-circle">
    <title>Selamat Datang | AtongBae</title>

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark shadow" style="background-color: #16a085">
        <div class="container">
            <a class="navbar-brand" href="index.php"><strong>AtongBae</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item ">
                            <a class="nav-link page-scroll" href="index.php">HOME <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                SERVICE
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="pickup.php">PICK UP</a>
                                <a class="dropdown-item" href="princing.php?user=">CEK ONGKIR</a>
                                <a class="dropdown-item" href="cekresi.php">LACAK KIRIMAN</a>
                                <a class="dropdown-item" href="packing.php">PACKING</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                TENTANG KAMI
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="tentang_kami.php">TENTANG ATONGBAE</a>
                                <a class="dropdown-item" href="faq.php">KONTAK KAMI</a>
                            </div>
                        </li>
                    </ul>
            </div>
        </div>
    </nav>
    <!-- end Nav -->
    <!-- Main -->
    <main class="p-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-8 p-5 d-none  d-sm-block">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="./assets/img/About.svg" height="50%" width="50%" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="./assets/img/motorcycle.svg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="./assets/img/content2.svg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 mt-5 text-white">
                    <h2 class="h2 mb-3 mt-5"><strong>AtongBae </strong> <i>Mengirim Barang Jadi Mudah</i> </h2>
                    <p>
                        Dengan agen pengiriman online yang membantu anda dalam mengirim barang menggunakan website. Kami membantu mulai dari pickup, packing, pengiriman ke vendor hingga memberi real-time status update melalui web, SMS dan email.
                    </p>
                    <div class="row">
                        <div class="col-md-6 col-6">
                            <p><i class="far fa-check-circle"></i> Free Pickup</p>
                            <p><i class="far fa-check-circle"></i> Order Online</p>
                            <p><i class="far fa-check-circle"></i> Bayar Ditempat</p>
                        </div>
                        <div class="col-md-6 col-6">
                            <p><i class="far fa-check-circle"></i> Cek Ongkir Online</p>
                            <p><i class="far fa-check-circle"></i> Pengiriman Cepat</p>
                            <p><i class="far fa-check-circle"></i> Diskon Pengiriman</p>
                        </div>
                    </div>
                    <a href="princing.php?user=" class="btn btn-outline-light mb-5">Selanjutnya... <i class="fas fa-angle-right"></i><i class="fas fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </main>
    <!-- end main -->
    <!-- Jumbotron cek harga-->
    <div class="jumbotron1 jumbotron-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-4 mt-4">
                    <div class="md-form">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-city"></i></span>
                            </div>
                            <select class="form-control">
                                <option>Kota Asal</option>
                                <?php
                                $vi = 'SELECT * FROM tbl_ongkir ';
                                $hasil = mysqli_query($conn, $vi);
                                while ($tampil = mysqli_fetch_object($hasil)) {

                                ?>
                                    <option value=<?= $tampil->Id ?>><?= $tampil->Daerah_Asal ?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-4 mt-4">
                    <div class="md-form">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-city"></i></span>
                            </div>
                            <select class="form-control">
                                <option>Kota Tujuan</option>
                                <?php
                                $vi = 'SELECT * FROM tbl_ongkir ';
                                $hasil = mysqli_query($conn, $vi);
                                while ($tampil = mysqli_fetch_object($hasil)) {

                                ?>
                                    <option value=<?= $tampil->Id ?>><?= $tampil->Daerah_Tujuan ?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-2 mt-4">
                    <a href="princing.php?user=&id=" class="btn btn-outline-success">Cek</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end Jumbotron -->
    <!-- Jumbotron About -->
    <div class="about jumbotron-fluid">
        <div class="container">
            <h1 class="display-4 text-center" style="color: #16a085;">Kenapa Pakai AtongBae?</h1>
            <p class="text-center" style="color: #16a085;"><i>Beberapa value Utama AtongBae</i></p>
            <div class="row">
                <div class="col-md-4 mt-3 ">
                    <img src="./assets/img/tag.svg" height="20%" alt="">
                    <h2>Harga Terbaik</h2>
                    <p>Bandingkan harga dari banyak vendor dan pilih sesuai kebutuhan anda. Dapatkan diskon pengiriman dengan menghubungi customer service kami.</p>
                </div>
                <div class="col-md-4 mt-3">
                    <img src="./assets/img/girl_laptop.svg" height="20%" alt="">
                    <h2>Serba Online</h2>
                    <p>Order, cek ongkir hingga pembayaran semua via online dan bisa diakses kapanpun menggunakan platform web dan Android.</p>
                </div>
                <div class="col-md-4 mt-3">
                    <img src="./assets/img/wallet.svg" alt="">
                    <h2>Bisa Bayar DiTempat</h2>
                    <p>Untuk pembayaran Ongkir nya bisa di lakukan di tempat anda.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- jumbotron end -->
    <!-- <footer class="text-right p-1" style="background-color: #16a085;">
        <div class="text-black text-center">
            <p class="text-right">@BaleeDev</p>
        </div>
    </footer> -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>


</body>

</html>