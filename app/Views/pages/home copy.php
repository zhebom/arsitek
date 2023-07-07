<?= $this->extend('template/layout'); ?>

<?= $this->section('content'); ?>

<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="./heroes/engineer.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <?php foreach ($situs as $situs):  ?>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3"><?= $situs->judul_situs;  ?></h1>
        <p class="lead"><?= $situs->desc_situs; ?></p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Bergabung Sekarang</button>
          
        </div>
      </div>
    </div>
  </div>

  <div class="section-cv p-3">
    <div class="container">
      <h5 class="mb-2">Data Kontraktor</h5>
      <div class="container text-center">
        <div class="row justify-content-center">
          <div class="col">
            <div class="card-content">
              <div class="card">
                <img src="./heroes/engineer.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">CV. Harapan Bunda</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-warning">Go somewhere</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card-content">

              <div class="card">
                <img src="./heroes/engineer.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">CV. Harapan Bunda</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-warning">Go somewhere</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card-content">

              <div class="card">
                <img src="./heroes/engineer.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">CV. Harapan Bunda</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-warning">Go somewhere</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Pemasangan Kartu CV -->
      <div class="card-content p-2">

        <div class="pagination">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>
        </div>



      </div>

    </div>

  </div>

  <div class="section-putih p-3">

    <div class="container">
      <h5 class="mb-2">Pekerjaan Terbaru</h5>

      <div class="card-body">
        <div class="row">
          <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="card mb-2 bg-gradient-dark">
              <img class="card-img-top" src="./heroes/photo1.png" alt="Dist Photo 1">
              <div class="card-img-overlay d-flex flex-column justify-content-end">
                <h5 class="card-title text-primary text-white">Card Title</h5>
                <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.</p>
                <a href="<?= base_url('pekerjaan/detail'); ?>" class="text-white">Last update 2 mins ago</a>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="card mb-2">
              <img class="card-img-top" src="./heroes/photo1.png" alt="Dist Photo 2">
              <div class="card-img-overlay d-flex flex-column justify-content-center">
                <h5 class="card-title text-white mt-5 pt-2">Card Title</h5>
                <p class="card-text pb-2 pt-1 text-white">
                  Lorem ipsum dolor sit amet, <br>
                  consectetur adipisicing elit <br>
                  sed do eiusmod tempor.
                </p>
                <a href="<?= base_url('pekerjaan/detail'); ?>" class="text-white">Last update 15 hours ago</a>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="card mb-2">
              <img class="card-img-top" src="./heroes/photo1.png" alt="Dist Photo 3">
              <div class="card-img-overlay">
                <h5 class="card-title text-primary">Card Title</h5>
                <p class="card-text pb-1 pt-1 text-white">
                  Lorem ipsum dolor <br>
                  sit amet, consectetur <br>
                  adipisicing elit sed <br>
                  do eiusmod tempor. </p>
                <a href="<?= base_url('pekerjaan/detail'); ?>" class="text-primary">Last update 3 days ago</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <?php endforeach; ?>
  <?= $this->endSection(); ?>