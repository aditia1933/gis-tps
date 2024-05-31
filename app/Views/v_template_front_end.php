
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
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
      <!-- Custom rute -->
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
      <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
  
  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
  <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

  <!-- Custom styles for search-->
  <link rel="stylesheet" href="<?= base_url('leaflet-search/')?>src/leaflet-search.css" />
  <script src="https://unpkg.com/leaflet@1.3.0/dist/leaflet.js"></script>
  <script src="<?= base_url('leaflet-search/')?>dist/leaflet-search.src.js"></script>
  <link rel="stylesheet" href="<?= base_url('leaflet-search/')?>style.css" />
  

    <!-- Custom styles for this template-->
    <link href="<?= base_url('sb-admin/')?>css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom data tables dari v_data_lokasi -->
    <link href="<?= base_url('sb-admin/')?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-success">
                <a class="navbar-brand" href="#">
                <div class="sidebar-brand-icon rotate-n-10">
                <img src="<?= base_url('gambar/logo.png')?>" width="30px" />
                </div>
                </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarCenteredExample"
      aria-controls="navbarCenteredExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div
      class="collapse navbar-collapse justify-content-center"
      id="navbarCenteredExample"
    >
      <!-- Left links -->
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" text-white href="<?= base_url('Lokasi/beranda')?>"><i class="fas fa-home fa-sm" style="color: #d5dae1;"> BERANDA</i></a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-list fa-sm" style="color: #d5dae1;"> DATA TPS</i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= base_url('Lokasi/dataTPS')?>">Cipocok Jaya</a>
          <a class="dropdown-item" href="#">Curug</a>
          <a class="dropdown-item" href="#">Kasemen</a>
          <a class="dropdown-item" href="#">Serang</a>
          <a class="dropdown-item" href="#">Taktakan</a>
          <a class="dropdown-item" href="#">Walantara</a>
        </div>
      </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url('Lokasi/persebaranTPSS')?>"><i class="fas fa-map-marked-alt fa-sm" style="color: #d5dae1;"> TITIK LOKASI PERSEBARAN TPS</i></a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url('Pengunjung/bukuTamu')?>"><i class="fas fa-pen-square fa-sm"style="color: #d5dae1;"> BUKU TAMU</i></a>
        </li>

        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-users fa-sm" style="color: #d5dae1;"> TENTANG KAMI</i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= base_url('Lokasi/visiMisi')?>">Visi & Misi</a>
          <a class="dropdown-item" href="<?= base_url('Lokasi/tujuan')?>">Tujuan</a>
        </div>
      </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <form class="form-inline my-2 my-lg-0">
  <a class="btn btn-warning btn-outline-secondary" href="<?= base_url('Auth/formLogin')?>">Login</a>
    </form>
  <!-- Container wrapper -->
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

            
            <!-- Footer -->
            <footer class="sticky-footer bg-success text-dark">
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
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('sb-admin/')?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('sb-admin/')?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('sb-admin/')?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('sb-admin/')?>js/sb-admin-2.min.js"></script>
    <!-- data tables -->
    <script src="<?= base_url('sb-admin/')?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('sb-admin/')?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <script src="<?= base_url('sb-admin/')?>js/demo/datatables-demo.js"></script>
    

  
  
    
    

</body>

</html>