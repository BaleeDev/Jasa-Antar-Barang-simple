<?php
@session_start();
include 'db.php';

// menampilkan data barang
$sql = 'SELECT * FROM tbl_lacak ORDER BY Id_lacak DESC';
$vLacak = mysqli_query($conn, $sql);

// Jika Butoon Edit Di Tekan
if (isset($_POST['bsimpan'])) {

    if ($_GET['hal'] == "edit") {
        $tanggal = date("Y-m-d H:i:s");
        // data akan diedit
        $simpan = mysqli_query($conn, "INSERT INTO tbl_lacak (No_Resi, Tanggal, Info)
        VALUES ('$_POST[No_Resi]','$tanggal','$_POST[Info]')
            ");
        if ($simpan) {
            echo "<script>
                        alert('Update Data Pengiriman Berhasil');
                        document.location='cek_resi_beckend.php';
                    </script>";
        }
    } else {
        echo "<script>
              alert('Tidak Ada Data Yang DiPilih');
              document.location='cek_resi_beckend.php';
            </script>";
    }
}

// data dikirim 
if (isset($_GET['hal'])) {
    //pengujian  jika edit data
    if ($_GET['hal'] == "edit") {
        $tampil = mysqli_query($conn, "SELECT * FROM tbl_lacak WHERE Id_lacak='$_GET[id]'");
        $data = mysqli_fetch_array($tampil);
        if ($data) {
            //jika data ditemukan maka data di tampung dulu ke variabel
            $vNR = $data['No_Resi'];
            $vInfo = $data['Info'];
        }
    } elseif ($_GET['hal'] == "hapus") {
        $hapus = mysqli_query($conn, "DELETE FROM tbl_lacak WHERE Id_lacak='$_GET[id]'");
        if ($hapus) {
            echo "<script>
                        alert('Hapus berhasil');
                        document.location='cek_resi_beckend.php';
                    </script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Admin | AtongBae </title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="icon" href="./assets/img/logo.png" class="rounded-circle">
    <!-- Custom styles for this template-->
    <link href="./assets/css/admin.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
                <div class="sidebar-brand-text mx-3">Admin AtongBae</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="admin.php">
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item  -->
            <li class="nav-item">
                <a class="nav-link" href="cek_ongkir_backend.php">
                    <span>Cek Ongkir</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="user_backend.php">
                    <span>User</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="cek_resi_beckend.php">
                    <span>Cek Resi</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <span>Keluar</span></a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">BaleeDev</span>

                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="container mt-3">
                            <div class="card">
                                <div class="card-header mb-3">
                                    DATA PENGIRIMAN
                                </div>
                                <div class="card-body">
                                    <form method="post" action="" enctype="multipart/form-data">
                                        <div class="form-group ">
                                            <label>NOMOR RESI</label>
                                            <input type="text" name="No_Resi" value="<?= @$vNR ?>" class="form-control" placeholder="Input Daerah Asal" required>
                                        </div>
                                        <div class="form-group">
                                            <label>INFO</label>
                                            <select class="form-control" name="Info">
                                                <option value="<?= @$vInfo ?>"><?= @$vInfo ?></option>
                                                <option value="Petugas Kami Dalam Perjalanan kerumah Anda">Petugas Kami Dalam Perjalanan kerumah Anda</option>
                                                <option value="Petugas Kami Dalam Perjelanan Mengirimkan Barang">Petugas Kami Dalam Perjelanan Mengirimkan Barang</option>
                                                <option value="Barang Anda Sedang Dalam Perjalanan Pengiriman">Barang Anda Sedang Dalam Perjalanan Pengiriman</option>
                                                <option value="Barang Anda Sudah Sampai Di Daerah Anda">Barang Anda Sudah Sampai Di Daerah Anda</option>
                                                <option value="Barang Anda Sudah Sampai">Barang Anda Sudah Sampai</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
                                        <button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>
                                    </form>
                                </div>
                                <!-- end -->

                                <!-- Card Body -->
                                <div class="card-body">

                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th scope="col">NOMOR RESI</th>
                                                <th scope="col">TANGGAL</th>
                                                <th scope="col">INFO </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($data = mysqli_fetch_object($vLacak)) {

                                            ?>
                                                <tr>
                                                    <th><?= $data->No_Resi ?></th>
                                                    <td><?= $data->Tanggal ?></td>
                                                    <td><?= $data->Info ?></td>
                                                    <td>
                                                        <a href="cek_resi_beckend.php?hal=edit&id=<?= $data->Id_lacak ?>" class="btn btn-outline-secondary">Pilih</a>
                                                        <a href="cek_resi_beckend.php?hal=hapus&id=<?= $data->Id_lacak ?>" onclick="return confirm('Apakah yakin ingin menghapus data ini??')" class="btn btn-danger">Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->



            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="./assets/js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="./assets/js/demo/chart-area-demo.js"></script>
            <script src="./assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>