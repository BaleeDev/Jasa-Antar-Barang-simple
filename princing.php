<?php
@session_start();
include 'db.php';

// Jika Tombol Pilih ditekan
if (isset($_GET['hal'])) {
    if ($_GET['hal'] == "pilih") {
        $tampil = mysqli_query($conn, "SELECT * FROM tbl_user WHERE Nama_User='$_GET[user]'");
        $data = mysqli_fetch_array($tampil);
        if ($data) {
            //jika data ditemukan maka data di tampung dulu ke variabel
            $vId_user = $data['Id_user'];
        }
    }
}
// Jika Tombol Terima ditekan
if (isset($_GET['hal'])) {
    if ($_GET['hal'] == "pilih") {
        if (isset($_POST['bsimpan'])) {
            $simpan = mysqli_query($conn, "INSERT INTO tbl_barang (Nama_Barang,Id_user, Id,  Berat)
            VALUES ('$_POST[Nama_Barang]','$vId_user' ,'$_GET[id]' , '$_POST[Berat]')
                ");
            if ($simpan) {
                $query = mysqli_query($conn, "SELECT max(Id_Barang) as ID_B FROM tbl_barang");
                $data = mysqli_fetch_array($query);
                $vID_Barang = $data['ID_B'];
                echo "<script>
                            alert('Simpan Data Pesanan Berhasil');
                            document.location='kirim_barang.php?id=$vID_Barang';
                        </script>";
            }
        }
    }
}
// validasi jika belum memilih data pengiriman 
elseif ($_GET['user'] == '' || $_GET['user'] != '') {
    if (isset($_POST['bsimpan'])) {
        echo "<script>
             alert('Anda Belum Memilih Data Pengiriman');
           </script>";
    }
}

// Menampilka Data Ongkir 
$sql = 'SELECT * FROM tbl_ongkir';
$ongkir = mysqli_query($conn, $sql);
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
                    <?php if ($_GET['user'] == '' || $_GET['user'] != '') {
                    ?>
                        <h2 class="text-center mb-5" style="color: #16a085;">Cek Harga Disini</h2>
                        <table class="table">
                            <thead style="background-color: #16a085;">
                                <tr>
                                    <th scope="col">Daerah Asal</th>
                                    <th scope="col">Daerah Tujuan</th>
                                    <th scope="col">Kurir</th>
                                    <th scope="col">ETA</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($data = mysqli_fetch_object($ongkir)) {

                                ?>
                                    <tr>
                                        <th><?= $data->Daerah_Asal ?></th>
                                        <td><?= $data->Daerah_Tujuan ?></td>
                                        <td><?= $data->Kurir ?></td>
                                        <td><?= $data->ETA ?></td>
                                        <td><?= number_format($data->Harga, 0, ',', '.')  ?></td>
                                        <td>
                                            <?php
                                            $cek = $_GET['user'];
                                            if ($cek != '') {
                                            ?>
                                                <form class="form-inline my-2 my-lg-0" action="" method="POST">
                                                    <a href="princing.php?hal=pilih&id=<?= $data->Id ?>&user=<?= $_GET['user'] ?>" name="pilih" class="btn btn-outline-success">Pilih</a>
                                                </form>
                                            <?php } elseif ($cek == '') { ?>
                                                <a href="daftar.php" class="btn btn-outline-success">Daftar</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } ?>
                </div>
                <div class="col-md-12 col-12">
                    <h2 class="text-center" style="color: #16a085;"> Data Barang</h2>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 col-6">
                                <div class="form-group ">
                                    <input type="text" name="Nama_Barang" class="form-control" placeholder="Input Nama Barang" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="Berat" aria-label="Amount (to the nearest dollar)">
                                    <div class="input-group-append">
                                        <span class="input-group-text">KG</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-success" name="bsimpan">Terima</button>
                            <button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>
                        </div>
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