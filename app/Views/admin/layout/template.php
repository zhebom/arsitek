<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/fontawesome-free/css/all.min.css'); ?>">

  <script src="https://kit.fontawesome.com/14004c86b9.js" crossorigin="anonymous"></script>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/jqvmap/jqvmap.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('/adminlte/dist/css/adminlte.min.css'); ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/daterangepicker/daterangepicker.css'); ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/summernote/summernote-bs4.min.css'); ?>">
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="<?= base_url('/plugins/ekko-lightbox/ekko-lightbox.css'); ?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?= base_url('/adminlte/dist/img/AdminLTELogo.png'); ?>" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="adminlte/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can<?= base_url(''); ?>.</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="adminlte/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="adminlte/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="<?= base_url('/adminlte/dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?php foreach($situs as $s){ echo $s->judul_situs;} ?></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url('adminlte/dist/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $admin; ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           
            <li class="nav-item">
              <a href="<?= base_url('/admin'); ?>" class="nav-link <?php if ($menu == "dashboard"){echo "active";} ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-header">Pengaturan Situs</li>
            <!-- <li class="nav-item">
              <a href="iframe.html" class="nav-link">

                <i class="nav-icon fa-solid fa-sign-hanging"></i>
                <p>Judul</p>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="<?= base_url('/admin/situs'); ?>" class="nav-link <?php if ($menu == "deskripsiSitus"){echo "active";} ?>">
                <i class="nav-icon fas fa-italic"></i>
                <p>Deskripsi Situs</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('/admin/sosmed'); ?>" class="nav-link <?php if ($menu == "sosmedSitus"){echo "active";} ?>">
                <i class="nav-icon fas fa-share-nodes"></i>
                <p>Sosial Media</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('/admin/faqs'); ?>" class="nav-link <?php if ($menu == "faqSitus"){echo "active";} ?>">
                <i class="nav-icon fas fa-question"></i>
                <p>Faq</p>
              </a>
            </li>
            <li class="nav-header">Pengaturan Konten</li>
            <li class="nav-item">
              <a href="<?= base_url('/admin/pelatihan'); ?>" class="nav-link <?php if ($menu == "pelatihan"){echo "active";} ?>">
                <i class="nav-icon fas fa-pen-to-square"></i>
                <p>Pelatihan</p>
              </a>
            </li>

            </li>
            <li class="nav-header">Pengaturan Pengguna</li>
            <li class="nav-item">
              <a href="iframe.html" class="nav-link">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>Daftar Pengguna</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://adminlte.io/docs/3.1/" class="nav-link">
                <i class="nav-icon fas fa-truck-monster"></i>
                <p>Daftar Kontraktor</p>
              </a>
            </li>


          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active"><?= $title; ?></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <?= $this->renderSection('content'); ?>

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?= base_url('/adminlte/plugins/jquery/jquery.min.js'); ?>"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= base_url('/adminlte/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <!-- ChartJS -->
  <script src="<?= base_url('/adminlte/plugins/chart.js/Chart.min.js'); ?>"></script>
  <!-- Sparkline -->
  <script src="<?= base_url('/adminlte/plugins/sparklines/sparkline.js'); ?>"></script>
  <!-- JQVMap -->
  <script src="<?= base_url('/adminlte/plugins/jqvmap/jquery.vmap.min.js'); ?>"></script>
  <script src="<?= base_url('/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js'); ?>"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?= base_url('/adminlte/plugins/jquery-knob/jquery.knob.min.js'); ?>"></script>
  <!-- daterangepicker -->
  <script src="<?= base_url('/adminlte/plugins/moment/moment.min.js'); ?>"></script>
  <script src="<?= base_url('/adminlte/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?= base_url('/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>
  <!-- Summernote -->
  <script src="<?= base_url('/adminlte/plugins/summernote/summernote-bs4.min.js'); ?>"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url('/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('/adminlte/dist/js/adminlte.js'); ?>"></script>
  
  <!-- DataTables  & Plugins -->
<script src="<?= base_url('/adminlte/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
<script src="<?= base_url('/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js'); ?>"></script>
<script src="<?= base_url('/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('/adminlte/plugins/jszip/jszip.min.js'); ?>"></script>
<script src="<?= base_url('/adminlte/plugins/pdfmake/pdfmake.min.js'); ?>"></script>
<script src="<?= base_url('/adminlte/plugins/pdfmake/vfs_fonts.js'); ?>"></script>
<script src="<?= base_url('/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js'); ?>"></script>
<script src="<?= base_url('/adminlte/plugins/datatables-buttons/js/buttons.print.min.js'); ?>"></script>
<script src="<?= base_url('/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js'); ?>"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  function fileupload() {
    const custom = document.querySelector('#customFile');
    const namafile = document.querySelector('.custom-file-label');
    namafile.textContent = custom.files[0].name;
  }


</script>

</body>

</html>