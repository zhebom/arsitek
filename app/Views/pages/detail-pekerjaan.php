<?= $this->extend('template/layout'); ?>

<?= $this->section('content'); ?>

<div class="section-putih">
  <div class="container p-3">
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Projects Detail</h3>

      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="alert alert-dark" role="alert">
                  <h4 class="alert-heading">Estimasi Biaya</h4>
                  <p>2300</p>

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
                  <h4 class="alert-heading">Perkiraan Waktu (hari)</h4>
                  <p>20</p>

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
                <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Judul Pekerjaan</h3>
                <p class="text-muted">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>
                <br>
                <div class="text-muted">
                  <p class="text-sm">Nama Clien
                    <b class="d-block">Jati Widhiasmoro</b>
                  </p>

                </div>

                <h5 class="mt-5 text-muted">Project files</h5>
                <ul class="list-unstyled">
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i>Foto Lahan</a>
                  </li>
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                  </li>
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                  </li>
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                  </li>
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">

            <div class="text-right mt-2 ">


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
    </div>
  </div>
  <?= $this->endSection(); ?>