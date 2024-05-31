
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="<?= base_url('gambar/logo.png')?>"/>
    <title>DLH | Dinas Lingkungan Hidup</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('sb-admin/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('sb-admin/')?>css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    <!-- Custom data tables dari v_data_lokasi -->
    <link href="<?= base_url('sb-admin/')?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Custom styles for search-->
  <link rel="stylesheet" href="<?= base_url('leaflet-search/')?>src/leaflet-search.css" />
  <script src="https://unpkg.com/leaflet@1.3.0/dist/leaflet.js"></script>
  <script src="<?= base_url('leaflet-search/')?>dist/leaflet-search.src.js"></script>
  <link rel="stylesheet" href="<?= base_url('leaflet-search/')?>style.css" />

    <!-- Custom rute -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
      <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
  <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-10">
                <img src="<?= base_url('gambar/logo.png')?>" width="50px" />
                </div>
                <div class="sidebar-brand-text mx-3">DLH Kota Serang</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Home')?>">
                <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">Master Data</div>
            <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Lokasi/pemetaanLokasi')?>">
            <i class="fas fa-map-marked-alt"></i>
                    <span>Pemetaan Lokasi TPS</span>
            </a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Lokasi/index')?>">
            <i class="fas fa-map-marker-alt"></i>
                    <span>Data Lokasi TPS</span>
            </a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Berita/dataBerita')?>">
            <i class="fas fa-file fa-sm"></i>
                    <span>Data Berita</span>
            </a>
            </li>

            <hr class="sidebar-divider my-3">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Admin
            </div>
            <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Auth/profil')?>">
            <i class="fas fa-user fa-lg"></i>
                    <span>Data User</span>
            </a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-dark bg-info topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                    <body>

<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'webgis');
$sql = mysqli_query($koneksi, "SELECT * FROM tbl_tamu ORDER BY id_tamu DESC LIMIT 100");
$num_notifications = mysqli_num_rows($sql);
?>

<nav>
    <ul>
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-danger badge-counter"><?= $num_notifications ?></span>
            </a>
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Message Center
                </h6>
                <div class="message-list-scroll">
                    <?php while ($tamu = mysqli_fetch_array($sql)) {
                        $text = $tamu['nama_tamu'];
                        $text1 = $tamu['email'];
                        $text3 = $tamu['pesan'];
                        $id_tamu = $tamu['id_tamu'];
                    ?>
                    <div class="dropdown-item d-flex align-items-center">
                        <div class="font-weight-bold flex-grow-1">
                            <div class="text-truncate"><?= $text ?></div>
                            <div class="small text-dark-500"><?= $text1 ?></div>
                            <div class="small text-gray-500"><?= $text3 ?></div>
                        </div>
                        <a href="<?= base_url('Pengunjung/deleteNotification/'.$id_tamu) ?>"
                            class="btn btn-sm btn-outline-danger ml-2"
                            onclick="return confirm ('Yakin Untuk Menghapus Data ??')">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </li>
    </ul>
</nav>

<style>
.message-list-scroll {
    max-height: 200px;
    overflow-y: auto;
}
</style>

</body>




                    <!-- -->
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        
                        <!--    -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-dark-600 small">Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url('sb-admin/')?>img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('Auth/profil')?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('auth/logout')?>" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                
                <div class="container-fluid">
                    <h3 class="mt-4"><?= $judul ?> </h3>
                    
                    <?php if ($page){
                        echo view($page);
                    } ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-info text-dark">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright Muhamad Aditia&copy; Your Website 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout')?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('sb-admin/')?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('sb-admin/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('sb-admin/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('sb-admin/')?>js/sb-admin-2.min.js"></script>
    <!-- data tables -->
    <script src="<?= base_url('sb-admin/')?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('sb-admin/')?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <script src="<?= base_url('sb-admin/')?>js/demo/datatables-demo.js"></script>

</body>

</html>