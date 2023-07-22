<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('/adminlte/dist/css/adminlte.min.css'); ?>">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= base_url('/login'); ?>" class="h1"><b>Register</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Pendaftaran Pengguna Baru</p>
      
      <form action="<?= base_url('/register/save'); ?>" method="Post" ">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        
                        <?= session()->getFlashdata('msg'); ?>
                        <?= validation_list_errors() ?>
                        
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" placeholder="Masukan Email ..." id="pelatihan" name="email" value="<?= old('email'); ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Masukan Nama Lengkap ..." id="nama" name="nama" value="<?= old('nama'); ?>">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Masukan Password" id="pass" name="pass" value="<?= old('pass'); ?>">
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <input type="password" class="form-control" placeholder="Konfirmasi Password ..." id="passconf" name="passconf" >
                        </div>
                      
                        <!-- <div class="form-group">
                            <label>Thumbnail Pelatihan</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="customFile" onchange="fileupload()">
                                <label class="custom-file-label" for="custo mFile">Choose file</label>
                            </div>
                        </div> -->
                        <!-- <div class="form-group">

                            <div class="card card-info">
                                <div class="card-header">
                                    <h4 class="card-title">Logo Preview</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <a href="https://via.placeholder.com/1200/FFFFFF.png?text=1" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                                                <img src="https://via.placeholder.com/300/FFFFFF?text=1" class="img-fluid mb-2" alt="white sample" />
                                            </a>
                                        </div>
                                        
                                    </div>
                                </div>

                            </div>
                        </div> -->
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

      
      <!-- /.social-auth-links -->

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url('/adminlte/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('/adminlte/dist/js/adminlte.min.js'); ?>"></script>
</body>
</html>
