<?php
@session_start();
include 'db.php';

// Jika Button Edit di tekan
if (isset($_POST['bsimpan'])) {

    if ($_GET['hal'] == "edit") {

        // data akan diedit
        $edit = mysqli_query($conn, "UPDATE tbl_ongkir set
                                            Daerah_Asal = '$_POST[Daerah_Asal]',
                                            Daerah_Tujuan = '$_POST[Daerah_Tujuan]',
                                            Kurir = '$_POST[Kurir]',
                                            ETA = '$_POST[ETA]',
                                            Harga = '$_POST[Harga]'
                                            WHERE Id='$_GET[id]'
            ");
        if ($edit) {
            echo "<script>
                        alert('Edit berhasil');
                        document.location='cek_ongkir_backend.php';
                    </script>";
        } else {
            echo "<script>
                        alert('Edit gagal');
                        document.location='cek_ongkir_backend.php';
                    </script>";
        }
    } else {
        if (isset($_POST['bsimpan'])) {
            $simpan = mysqli_query($conn, "INSERT INTO tbl_ongkir (Daerah_Asal,Daerah_Tujuan, Kurir,  ETA, Harga)
        VALUES ('$_POST[Daerah_Asal]','$_POST[Daerah_Tujuan]' ,'$_POST[Kurir]' , '$_POST[ETA]' , '$_POST[Harga]')
            ");
            if ($simpan) {
                echo "<script>
                        alert('Simpan Data Ongkir Berhasil');
                        document.location='cek_ongkir_backend.php';
                    </script>";
            }
        }
    }
}

if (isset($_GET['hal'])) {
    //pengujian  jika edit data
    if ($_GET['hal'] == "edit") {
        $tampil = mysqli_query($conn, "SELECT * FROM tbl_ongkir WHERE Id='$_GET[id]'");
        $data = mysqli_fetch_array($tampil);
        if ($data) {
            //jika data ditemukan maka data di tampung dulu ke variabel
            $vDaerah_Asal = $data['Daerah_Asal'];
            $vDaerah_Tujuan = $data['Daerah_Tujuan'];
            $vKurir = $data['Kurir'];
            $vETA = $data['ETA'];
            $vHarga = $data['Harga'];
        }
    } elseif ($_GET['hal'] == "hapus") {
        $hapus = mysqli_query($conn, "DELETE FROM tbl_ongkir WHERE Id='$_GET[id]'");
        if ($hapus) {
            echo "<script>
                        alert('Hapus berhasil');
                        document.location='cek_ongkir_backend.php';
                    </script>";
        }
    }
}
// untuk menampilkan data ongkir
$sql = 'SELECT * FROM tbl_ongkir';
$ongkir = mysqli_query($conn, $sql);

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
                                    INPUT DATA ONGKIR
                                </div>
                                <div class="card-body">
                                    <form method="post" action="" enctype="multipart/form-data">
                                        <div class="form-group ">
                                            <label>DAERAH ASAL</label>
                                            <input type="text" name="Daerah_Asal" value="<?= @$vDaerah_Asal ?>" class="form-control" placeholder="Input Daerah Asal" required>
                                        </div>
                                        <div class="form-group ">
                                            <label>DAERAH TUJUAN</label>
                                            <input type="text" name="Daerah_Tujuan" value="<?= @$vDaerah_Tujuan ?>" class="form-control" placeholder="Input Daerah Tujuan " required>
                                        </div>
                                        <div class="form-group">
                                            <label>KURIR</label>
                                            <select class="form-control" name="Kurir">
                                                <option value="<?= @$vKurir ?>"><?= @$vKurir ?></option>
                                                <option value="POS INDONESIA">POS INDONESIA</option>
                                                <option value="JNE EXPRESS">JNE EXPRESS</option>
                                                <option value="TIKI">TIKI</option>
                                            </select>
                                        </div>
                                        <div class="form-group ">
                                            <label>ETA</label>
                                            <input type="text" name="ETA" value="<?= @$vETA ?>" class="form-control" placeholder="Input ETA" required>
                                        </div>
                                        <div class="form-group ">
                                            <label>Harga Rp.</label>
                                            <input type="text" name="Harga" value="<?= @$vHarga ?>" class="form-control" placeholder="Input Harga Rp." required>
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
                                                <th scope="col">DAERAH ASAL</th>
                                                <th scope="col">DAERAH TUJUAN </th>
                                                <th scope="col">KURIR </th>
                                                <th scope="col">ETA</th>
                                                <th scope="col">HARGA</th>
                                                <th scope="col">ACTION</th>
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
                                                    <td><?= $data->Harga ?></td>
                                                    <td>
                                                        <a href="cek_ongkir_backend.php?hal=edit&id=<?= $data->Id ?>" class="btn btn-outline-secondary">Edit</a>
                                                        <a href="cek_ongkir_backend.php?hal=hapus&id=<?= $data->Id ?>" onclick="return confirm('Apakah yakin ingin menghapus data ini??')" class="btn btn-danger">Hapus</a>
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