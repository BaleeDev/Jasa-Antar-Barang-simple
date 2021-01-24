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
    <title>PICKUP | AtongBae</title>

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
    <!-- jumbotron -->
    <div class="cek jumbotron-fluid mt-5">
        <div class="container mt-5">
            <div class="col-md-12 mt-5">
                <h2 class="text-center mt-5"><strong>ATONG BAE</strong></h2>
                <P class="text-center">Langkah lagkah menggunakan <i>AtongBae</i></P>
            </div>
            <div class="card shadow">
                <div class="row">
                    <div class="col-sm-4 d-none d-sm-block pb-5">
                        <img src="./assets/img/About.svg " width="350">
                    </div>
                    <div class="col-12 col-sm-8 pt-5 ">
                        <div class="col-md-12 mb-5 shadow p-3 text-center mr-3 ">
                            <h3>Siapkan Barang</h3>
                            <p>Persiapkan terlebih dahulu barang yang akan dikirim menggunakan AtongBae.</p>
                            <img src="./assets/img/l1.png" height="200px" alt="">
                        </div>
                        <div class="col-md-12 mb-5 shadow p-3 text-center mr-3 ">
                            <h3>Masuk Ke Entry</h3>
                            <p>Masuk ke sistem AtongBae dan isilah data yang dibutuhkan dengan mudah atau tarik data dari toko Marketplace.</p>
                            <img src="./assets/img/l2.png" height="200px" alt="">
                        </div>

                        <div class="col-md-12 mb-5 shadow p-3 text-center mr-3 ">
                            <h3>PickUp</h3>
                            <p>Mr. Picker akan tiba dan mengambil barang dengan aman.</p>
                            <img src="./assets/img/l3.png" height="200px" alt="">
                        </div>

                        <div class="col-md-12 mb-5 shadow p-3 text-center mr-3 ">
                            <h3>Antar</h3>
                            <p>Paket akan diantar oleh ekspedisi pilihanmu, kamu cukup duduk santai dan dapatkan update langsung di HP!.</p>
                            <img src="./assets/img/l4.png" height="200px" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end jumbotron -->
    <footer class="text-white" style="background-color: #16a085;">
        <div class="row">
            <div class="foter col-md-3 col-3 pt-2 ml-2">
                <h6>BaleeDev</h6>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>


</body>

</html>