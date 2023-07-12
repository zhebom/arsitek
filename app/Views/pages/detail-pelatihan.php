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
          <div class="card-img-top"><img src="<?= base_url('thumbnails/'.$pelatihan['gambar']); ?>"></div>
          
        </div>
        <div class="row">
          <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="alert alert-danger" role="alert">
                  <h4 class="alert-heading">Judul Pelatihan</h4>
                  <p>
                   

                      <?= $pelatihan['pelatihan']; ?>

                    
                    </p>

                </div>

                <!-- <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Estimasi Biaya</span>
                    <span class="info-box-number text-center text-muted mb-0">2300</span>
                  </div>
                </div> -->
              </div>

              <div class="col-12 col-sm-6">

                <div class="alert alert-dark" role="alert">
                  <h4 class="alert-heading">Batas Pendaftaran</h4>
                  <p><?php
                  
                  $date = date_create($pelatihan['endpendaftaran']);
                  echo date_format($date, 'd F Y'); ?></p>

                </div>
                <!-- <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Perkiraan Waktu (hari)</span>
                    <span class="info-box-number text-center text-muted mb-0">20</span>
                  </div>
                </div> -->
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <h3 class="text-primary"><i class="fas fa-paint-brush"></i>Tanggal Pelatihan</h3>
                <p class="text-muted">Pelatihan akan dilaksanakan pada tanggal <?php $akan = date_create($pelatihan['tglpelatihan']);
                echo date_format($akan, 'd F Y');
                ?> bertempat di <?= $pelatihan['tempat']; ?></p>
                <br>
                
                
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">

            <div class="d-grid mt-2 p-1 ">


              <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Kirim Penawaran
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->



  </div>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">kirim penawaran ke klien</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Nama Projek : lomba
          Detail PRoject : sekiatn
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->



  </div>
  <?= $this->endSection(); ?>