<?php
@session_start();
include 'db.php';

// menampilkan data dari table barang,user dan ongkir
$sql1 = mysqli_query($conn, "SELECT * FROM tbl_barang WHERE Id_Barang='$_GET[id]'");
$vtbl_barang = mysqli_fetch_assoc($sql1);
if ($vtbl_barang) {
    $vId_user = $vtbl_barang['Id_user'];
    $vNama_Barang = $vtbl_barang['Nama_Barang'];
    $vId = $vtbl_barang['Id'];
    $vBerat = $vtbl_barang['Berat'];
}
$sql2 = mysqli_query($conn, "SELECT * FROM tbl_user WHERE Id_User='$vId_user'");
$vtbl_user = mysqli_fetch_array($sql2);
if ($vtbl_user) {
    $vNama_User = $vtbl_user['Nama_User'];
}
$sql3 = mysqli_query($conn, "SELECT * FROM tbl_ongkir WHERE Id='$vId'");
$vtbl_ongkir = mysqli_fetch_array($sql3);
if ($vtbl_ongkir) {
    $vDaerah_Asal = $vtbl_ongkir['Daerah_Asal'];
    $vDaerah_Tujuan = $vtbl_ongkir['Daerah_Tujuan'];
    $vKurir = $vtbl_ongkir['Kurir'];
    $vETA = $vtbl_ongkir['ETA'];
    $vHarga = $vtbl_ongkir['Harga'];
}
// total ongkir
if ($vBerat <= 5) {
    $vTotal_Harga = $vHarga * 1;
} elseif ($vBerat >= 10) {
    $vTotal_Harga = $vHarga * 2;
} elseif ($vBerat >= 15) {
    $vTotal_Harga = $vHarga * 3;
}

$query = mysqli_query($conn, "SELECT max(No_Resi) as No_Resi FROM tbl_resi");
$data = mysqli_fetch_array($query);
$vNo_Resi = $data['No_Resi'];
// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$vNo_Resi++;
// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 

$vNo_Resi = 011099 + $vNo_Resi;
// Jika Tombol Simpan Ditekan
if (isset($_POST['bsimpan'])) {
    $simpan = mysqli_query($conn, "INSERT INTO tbl_pengiriman (Id_user,Id, Id_Barang, Nama_Penerima, Daerah_Asal, Daerah_Tujuan, Alamat, Phone, Kurir, ETA, Harga, Total_Harga)
    VALUES ('$vId_user','$vId' ,'$_GET[id]' , '$_POST[Nama_Penerima]', '$vDaerah_Asal','$vDaerah_Tujuan', '$_POST[Alamat]','$_POST[Phone]','$vKurir','$vETA','$vHarga','$vTotal_Harga' )
        ");
    if ($simpan) {
        // Tampil id
        $query = mysqli_query($conn, "SELECT max(Id_Pengirim) as ID_P FROM tbl_pengiriman");
        $data = mysqli_fetch_array($query);
        $vID_Pengirim = $data['ID_P'];
        // menyimpan resi
        $simpan = mysqli_query($conn, "INSERT INTO tbl_resi (Id_Pengiriman, No_Resi)
    VALUES ('$vID_Pengirim','$vNo_Resi')
        ");
        $query = mysqli_query($conn, "SELECT max(Id_Resi) as ID_R FROM tbl_resi");
        $data = mysqli_fetch_array($query);
        $vID_RESI = $data['ID_R'];

        $tampil = mysqli_query($conn, "SELECT * FROM tbl_resi WHERE Id_Resi='$vID_RESI'");
        $data = mysqli_fetch_array($tampil);
        if ($data) {
            //jika data ditemukan maka data di tampung dulu ke variabel
            $vNomor_Resi = $data['No_Resi'];
        }
        $vinfo = "Petugas Kami Dalam Perjalanan kerumah Anda";
        $tanggal = date("Y-m-d H:i:s");
        $simpan = mysqli_query($conn, "INSERT INTO tbl_lacak (No_Resi, Tanggal, Info)
    VALUES ('$vNomor_Resi','$tanggal','$vinfo')
        ");
        $tampil = mysqli_query($conn, "SELECT * FROM tbl_resi WHERE Id_Resi='$vID_RESI'");
        $data = mysqli_fetch_array($tampil);
        if ($data) {
            //jika data ditemukan maka data di tampung dulu ke variabel
            $vNomor = $data['No_Resi'];
        }
        echo "<script>
                    alert('Pengiriman Barang Akan Di Peroses, Silahkan Lacak Kiriman Anda Dengan No Resi Yg tertera');
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
                    <h2 class="text-center" style="color: #16a085;">Pengiriman Barang</h2>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4 col-6">
                                <div class="form-group ">
                                    <label>Nama Pengirim</label>
                                    <input type="text" name="Nama_User" value="<?= $vNama_User ?>" class="form-control" required disabled>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="form-group ">
                                    <label>Nama Penerima</label>
                                    <input type="text" name="Nama_Penerima" value="<?= @$vNama_Penerima ?>" class="form-control" placeholder="Input Nama Penerima" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="form-group ">
                                    <label>Nama Barang</label>
                                    <input type="text" name="Nama_Barang" value="<?= @$vNama_Barang ?>" class="form-control" required disabled>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="form-group ">
                                    <label>Daerah Asal</label>
                                    <input type="text" name="Daerah_Asal" value="<?= @$vDaerah_Asal ?>" class="form-control" required disabled>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="form-group ">
                                    <label>Daerah Tujuan</label>
                                    <input type="text" name="Daerah_Tujuan" value="<?= @$vDaerah_Tujuan ?>" class="form-control" required disabled>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="form-group ">
                                    <label>Alamat</label>
                                    <input type="text" name="Alamat" value="<?= @$vAlamat ?>" placeholder="Masukkan Alamat  Lengkap Penerima" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="form-group ">
                                    <label>Phone</label>
                                    <input type="text" name="Phone" value="<?= @$vPhone ?>" placeholder="Masukkan No HP Aktiv Penerima" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="form-group ">
                                    <label>Kurir Yang DiGunakan</label>
                                    <input type="text" name="Kurir" value="<?= @$vKurir ?>" class="form-control" required disabled>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="form-group ">
                                    <label>ETA</label>
                                    <input type="text" name="ETA" value="<?= @$vETA ?>" class="form-control" required disabled>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="form-group ">
                                    <label>Ongkir Rp.</label>
                                    <input type="text" name="Harga" value="<?= number_format(@$vHarga, 0, ',', '.') ?>" class="form-control" required disabled>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="form-group ">
                                    <label>Berat / KG</label>
                                    <input type="text" name="Berat" value="<?= @$vBerat ?>" class="form-control" required disabled>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="form-group ">
                                    <label>Total Ongkir Rp.</label>
                                    <input type="text" name="Total_Harga" value="<?= number_format(@$vTotal_Harga, 0, ',', '.') ?>" class="form-control" required disabled>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success mb-3" name="bsimpan">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12 mt-5">
                    <div class="form-group ">
                        <span class="border-bottom">
                            <input type="text" name="NO_RESI" value="NO RESI :  <?= @$vNomor ?>" class="form-control text-center" style="border: none; background-color: white;" disabled>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end jumbotron -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>


</body>

</html>