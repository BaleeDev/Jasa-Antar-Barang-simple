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
    <title>PACKING | AtongBae</title>

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
    <div class="Jum jumbotron-fluid mt-5">
        <div class="container ">
            <div class="card shadow">
                <div class="row">
                    <div class="col-md-6 mt-5 ml-3 d-none  d-sm-block">
                        <img src="./assets/img/tentang.jpg" height="50%" alt="">
                    </div>
                    <div class="col-md-4 mt-5 ml-3">
                        <h3 style="color: #16a085;">Tentang AtongBae</h3>
                        <p style="font-family: sans-serif;">AtongBae adalah agen pengiriman online yang akan membantu kamu menyiapkan dan mengirimkan barang kiriman kamu. Mulai dari pickup barang lalu menigirimkannya ke vendor pengiriman pilihan anda atau dapat juga kami pilihkan vendor terbaik kami(dari segi harga dan performance).</p>
                    </div>
                    <div class="col-md-12 text-center">
                        <h4 style="color: #16a085;">Mengapa harus menggunakan layanan Pickpack?</h4>
                        <p><i>Berikut ini adalah beberapa alasan kuat, mengapa kamu harus menggunakan layanan AtongBae</i></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2 d-none d-sm-block pb-5">
                    </div>
                    <div class="col-12 col-sm-8 pt-5 ">
                        <div class="row justify-content-center text-center pb-5">
                            <div class="col-md-4 mb-5 shadow p-3">
                                <img src="./assets/img/1uang.png" class="im pt-4 mb-2" height="50%" alt="">
                                <p class="text-muted">
                                    Tanpa biaya tambahan, kami urus semua pengiriman anda!
                                </p>
                            </div>
                            <div class="col-md-4 mb-5 ml-2 shadow p-3">
                                <img src="./assets/img/2bebas.png" class="im pt-4 mb-2" height="50%" alt="">
                                <p class="text-muted">
                                    Bebas memilih vendor pengiriman terbaik di Indonesia.
                                </p>
                            </div>
                            <div class="col-md-3 mb-5 ml-2 shadow p-3">
                                <img src="./assets/img/3resi.png" class="im pt-4 mb-2" height="50%" alt="">
                                <p class="text-muted">
                                    Dapat nomor resi di hari yang sama!
                                </p>
                            </div>
                            <div class="col-md-4 mb-5 shadow p-3">
                                <img src="./assets/img/4pickup.png" class="im pt-4 mb-2" height="50%" alt="">
                                <p class="text-muted">
                                    Pickup GRATIS! Dengan minimal 5 kg atau 5 resi per pickup.
                                </p>
                            </div>
                            <div class="col-md-4 mb-5 ml-2 shadow p-3">
                                <img src="./assets/img/5cek.png" class="im pt-4 mb-2" height="50%" alt="">
                                <p class="text-muted">
                                    Cek update status pengiriman secara real-time melalui Smartphone kamu.
                                </p>
                            </div>
                            <div class="col-md-3 mb-5  ml-2 shadow p-3">
                                <img src="./assets/img/6harga.png" class="im pt-4 mb-2" height="50%" alt="">
                                <p class="text-muted">
                                    Harga spesial untuk pengiriman dalam jumlah besar (kargo).
                                </p>
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