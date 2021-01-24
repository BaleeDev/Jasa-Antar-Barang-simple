<?php
@session_start();
include 'db.php';

$vnama = $_POST['Nama_User'];
// Jika Button Simpan Diklik
if (isset($_POST['bsimpan'])) {
    $simpan = mysqli_query($conn, "INSERT INTO tbl_user (Nama_Toko,Nama_User, Daerah,  Phone, Email, Deskripsi)
VALUES ('$_POST[Nama_Toko]','$_POST[Nama_User]' ,'$_POST[Daerah]' , '$_POST[Phone]' , '$_POST[Email]', '$_POST[Deskripsi]')
    ");
    if ($simpan) {
        echo "<script>
                // alert('Simpan Data Ongkir Berhasil');
                document.location='princing.php?user=$_POST[Nama_User]';
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
    <!-- jumbotron -->
    <div class="cek jumbotron-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <h2 class="text-center mb-5" style="color: #16a085;">Daftar</h2>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group ">
                            <label>Nama Company / Toko</label>
                            <input type="text" name="Nama_Toko" value="<?= @$vNama_Toko ?>" class="form-control" placeholder="Input Nama Company / Toko" required>
                        </div>
                        <div class="form-group ">
                            <label>Nama Pemilik</label>
                            <input type="text" name="Nama_User" value="<?= @$vNama_User ?>" class="form-control" placeholder="Input Nama Pemilik" required>
                        </div>
                        <div class="form-group ">
                            <label>Daerah</label>
                            <input type="text" name="Daerah" value="<?= @$vDaerah ?>" class="form-control" placeholder="Input Daerah Asal" required>
                        </div>
                        <div class="form-group ">
                            <label>Phone</label>
                            <input type="text" name="Phone" value="<?= @$vPhone ?>" class="form-control" placeholder="Input Phone" required>
                        </div>
                        <div class="form-group ">
                            <label>Email</label>
                            <input type="email" name="Email" value="<?= @$vEmail ?>" class="form-control" placeholder="Input Email" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="Deskripsi" placeholder="Deskripsi Toko Anda" required><?= @$vDeskripsi ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-success mb-3" name="bsimpan">Simpan</button>
                        <button type="reset" class="btn btn-outline-danger mb-3" name="breset">Kosongkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end jumbotron -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>


</body>

</html>