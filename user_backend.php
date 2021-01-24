<?php
@session_start();
include 'db.php';

//menampilkan semua user
$sql = 'SELECT * FROM tbl_user';
$vUser = mysqli_query($conn, $sql);

if (isset($_GET['hal'])) {
    //pengujian  jika edit data
    if ($_GET['hal'] == "hapus") {
        $hapus = mysqli_query($conn, "DELETE FROM tbl_user WHERE Id_user='$_GET[id]'");
        if ($hapus) {
            echo "<script>
                        alert('Hapus berhasil');
                        document.location='user_backend.php';
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
                        <div class="card">
                            <div class="card-header mb-3">
                                <h1 class="h3 mb-0 text-gray-800">User</h1>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">

                                        <table class="table table-hover ">
                                            <thead>
                                                <tr>
                                                    <th scope="col">NAMA TOKO</th>
                                                    <th scope="col">NAMA USER </th>
                                                    <th scope="col">DAERAH </th>
                                                    <th scope="col">PHONE</th>
                                                    <th scope="col">EMAIL</th>
                                                    <th scope="col">ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($data = mysqli_fetch_object($vUser)) {

                                                ?>
                                                    <tr>
                                                        <th><?= $data->Nama_Toko ?></th>
                                                        <td><?= $data->Nama_User ?></td>
                                                        <td><?= $data->Daerah ?></td>
                                                        <td><?= $data->Phone ?></td>
                                                        <td><?= $data->Email ?></td>
                                                        <td>
                                                            <a href="user_backend.php?hal=hapus&id=<?= $data->Id_user ?>" onclick="return confirm('Apakah yakin ingin menghapus data ini??')" class="btn btn-danger">Hapus</a>
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