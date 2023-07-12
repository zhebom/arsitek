<?= $this->extend('template/layout'); ?>

<?= $this->section('content'); ?>


<div class="section-putih">
  <div class="container p-3">
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Detail Pelatihan</h3>

      </div>
      <div class="card-body">
        <div class="row mb-5">
          <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="card mb-2 bg-gradient-dark bungkus">
              <img class="card-img-top image" src="<?= base_url('/thumbnails/' . $pelatihan['gambar']); ?>" alt="Dist Photo 1">

            </div>
          </div>
          <div class="col-md-12 col-lg-6 col-xl-8">
            <div class="alert alert-danger" role="alert">
              <h4 class="alert-heading">Kuota Pendaftar</h4>
              <p>
                <?= $pelatihan['kuota']; ?>
              </p>
            </div>
            <div class="alert alert-dark" role="alert">
              <h4 class="alert-heading">Batas Pendaftaran</h4>
              <p><?php

                  $date = date_create($pelatihan['endpendaftaran']);
                  echo date_format($date, 'd F Y'); ?></p>

            </div>
            <div class="alert alert-dark" role="alert">
              <h4 class="alert-heading">Pelaksanaan</h4>
              <p><?php $akan = date_create($pelatihan['tglpelatihan']);
                  echo date_format($akan, 'd F Y');
                  ?> | <?= $pelatihan['tempat']; ?></p>

            </div>
          </div>
          <div class="row">
            <div class="col-md-12 d-grid">
              <button type="button" class="btn btn-warning center" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <h5> Daftar Sekarang</h5>
              </button>
            </div>
          </div>
        </div>



      </div>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->



</div>

<?= $this->endSection(); ?>