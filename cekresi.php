<?php
@session_start();
include 'db.php';

// melacak resi
if (isset($_POST['bsimpan'])) {
    $sql = "SELECT * FROM tbl_lacak WHERE No_Resi='$_POST[no_resi]'";
    $cek = mysqli_query($conn, $sql);
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
                <div class="col-md-6 mt-5">
                    <form method="post" action="" enctype="multipart/form-data">
                        <label class="custom-field one">
                            <input type="text" name="no_resi" required>
                            <span class="placeholder">Input No Resi</span>
                        </label>
                        <button type="submit" class="btn btn-outline-success ml-3" name="bsimpan">Terima</button>
                    </form>
                </div>
                <div class="col-md-12 mt-3 mt-5">
                    <table class="table">
                        <thead style="background-color: #16a085;">
                            <tr>
                                <th scope="col">Perjalanan Paket <?= @$vNo_Resi ?></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_POST['bsimpan'])) {
                                while ($data = mysqli_fetch_object($cek)) {

                            ?>
                                    <tr>
                                        <th scope="row"><?= $data->Tanggal ?></th>
                                        <td><?= $data->Info ?></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end jumbotron -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>


</body>

</html>