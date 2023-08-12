<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php foreach ($situs as $situs) : ?>
        <title><?= $situs->judul_situs;  ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }

            .b-example-divider {
                height: 3rem;
                background-color: rgba(0, 0, 0, .1);
                border: solid rgba(0, 0, 0, .15);
                border-width: 1px 0;
                box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
            }

            .b-example-vr {
                flex-shrink: 0;
                width: 1.5rem;
                height: 100vh;
            }

            .bi {
                vertical-align: -.125em;
                fill: currentColor;
            }

            .nav-scroller {
                position: relative;
                z-index: 2;
                height: 2.75rem;
                overflow-y: hidden;
            }

            .nav-scroller .nav {
                display: flex;
                flex-wrap: nowrap;
                padding-bottom: 1rem;
                margin-top: -1px;
                overflow-x: auto;
                text-align: center;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
            }
        </style>

        <style>
            .bungkus {
                position: relative;
                width: 100%;
            }

            .image {
                opacity: 1;
                display: block;
                width: 100%;
                height: auto;
                transition: .5s ease;
                backface-visibility: hidden;
            }

            .middle {
                transition: .5s ease;
                opacity: 0;
                position: relative;
                top: 10%;
                left: 50%;
                transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                text-align: center;
            }

            .bungkus:hover .image {
                opacity: 0.3;
            }

            .bungkus:hover .middle {
                opacity: 1;
            }

            .text {
                background-color: black;
                color: white;
                font-size: 16px;
                padding: 8px 32px;
                text-align: center;


            }

            .btn:hover {
                background-color: orange;
                color: black;
                font-size: 16px;
                padding: 8px 32px;

            }
        </style>

        <!-- Custom styles for this template -->
        <link href="./heroes/heroes.css" rel="stylesheet">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">


        <!-- tambahan -->
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
        <!-- JQVMap -->
        <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/jqvmap/jqvmap.min.css'); ?>">

        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/daterangepicker/daterangepicker.css'); ?>">
        <!-- summernote -->
        <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/summernote/summernote-bs4.min.css'); ?>">

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url(); ?>"><strong><?= $situs->judul_situs; ?> </strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="container text-center">
                    <div class="row align-items-center">

                        <div class="col">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url("pelatihan"); ?>">Pelatihan</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url("faq"); ?>"> Cara Penggunaan Aplikasi</a>
                                </li>


                            </ul>

                        </div>

                    </div>
                </div>
                <?php if (session()->get('isLoggedIn') == TRUE) {                              ?>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <div class="row align-items-center">
                            <div class="col text-center">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle btn btn-outlined" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                                            <strong><?= session()->get('nama'); ?></strong>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-lg-end ">
                                            <li><a class="dropdown-item" href="<?= base_url('/profil'); ?>">Profil</a></li>
                                            <li><a class="dropdown-item" href="<?= base_url('/pass'); ?>">Ubah Password</a></li>
                                            <li><a class="dropdown-item" href="<?= base_url('/bom'); ?>"><strong>Logout</strong></a></li>

                                        </ul>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                <?php
                } else {  ?>
                    <a class="btn btn-danger d-grid hidden" href="<?= base_url('/login'); ?>"><strong>Login</strong></a> <a class="btn btn-outline-warning d-grid" href="<?= base_url('register'); ?>"><strong>Daftar</strong></a>
                <?php } ?>
            </div>
        </div>
    </nav>

    <br>
    <?= session()->getFlashdata('msg'); ?>
   
    <?= $this->renderSection('content'); ?>

    <div class="container">
        <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
            <div class="col-md-6">
                <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">

                    <h3><?= $situs->judul_situs; ?></h3>

                </a>
                <p class="text-muted">
                    <?= $situs->desc_situs; ?>

                </p>
            </div>


            <div class="col-md-3">
                <h5>Informasi Kontak</h5>
                <strong>Alamat</strong>
                <p> <?= $situs->alamat; ?>
                </p>
                <strong>Kontak</strong>
                <p> Telp : +62 2833 51082
                    Email : Info@upstegal.ac.id
                </p>
            </div>

            <div class="col-md-3">
                <h5>Sosial Media</h5>
                <div class="d-flex flex-row">
                    <?php foreach ($sosmed as $p) : ?>
                        <div class="p-2"> <a href="<?= $p->link; ?>">
                                <img src="<?= base_url('/sosmed/' . $p->logo); ?>" class="img-fluid mb-2" alt="<?= $p->nama; ?>" /></div>
                    <?php endforeach; ?>

                </div>


            </div>


        </footer>
    </div>
<?php endforeach; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

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
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
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

</html>