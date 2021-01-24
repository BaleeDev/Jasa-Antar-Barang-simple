<?php
@session_start();
include 'db.php';

// Menyimpan Saran
if (isset($_POST['bsimpan'])) {
    $simpan = mysqli_query($conn, "INSERT INTO tbl_saran (username,email, subjek,  pesan)
    VALUES ('$_POST[username]','$_POST[email]' ,'$_POST[subjek]' , '$_POST[pesan]')
        ");
    if ($simpan) {
        echo "<script>
                    alert('Terimakasi Atas Keritik Dan Saran Anda');
                    document.location='faq.php';
                </script>";
    }
}
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
    <div class="Jum jumbotron-fluid mt-5 mb-3">
        <div class="container ">
            <div class="row">
                <div class="col text-center">
                    <h1>Contact</h1>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6 shadow">
                    <div class="row justify-content-center text-white">
                        <div class="col-md-8 shadow-lg text-center " style="font-size: 25px; margin-top: -3%; background-color: #16a085;">
                            <i class="fas fa-envelope btn-outline-light"></i> <strong>Write to Us</strong>
                        </div>
                    </div>
                    <h5 class="pt-3">Tuliskan pesan / Keritik Anda</h5><br>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-user prefix grey-text"></i></span>
                                        </div>
                                        <input type="text" name="username" class="form-control" id="validationDefaultUsername" placeholder="Username" aria-describedby="inputGroupPrepend2" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="md-form">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-envelope "></i></span>
                                        </div>
                                        <input type="email" name="email" class="form-control" id="validationDefaultUsername" placeholder="Email" aria-describedby="inputGroupPrepend2" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="md-form">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-tag prefix grey-text"></i></span>
                                        </div>
                                        <input type="text" name="subjek" class="form-control" id="validationDefaultUsername" placeholder="Subjek" aria-describedby="inputGroupPrepend2" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="md-form">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-pencil-alt prefix grey-text"></i></span>
                                        </div>
                                        <input type="text" name="pesan" class="form-control" id="validationDefaultUsername" placeholder="Pesan" aria-describedby="inputGroupPrepend2" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="bsimpan" class="btn btn-outline-success mt-3 mb-3 " style="margin-left: 45%;">Kirim</button>
                    </form>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5 col-12 shadow">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1459.020440376511!2d116.19228243917591!3d-8.325454195759507!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOMKwMTknMzIuMSJTIDExNsKwMTEnMzUuMyJF!5e0!3m2!1sid!2sid!4v1611512074110!5m2!1sid!2sid" height="100%" width="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- end jumbotron -->
    <footer class="text-white mt-5" style="background-color: #16a085;">
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