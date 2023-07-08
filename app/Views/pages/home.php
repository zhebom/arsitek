<?= $this->extend('template/layout'); ?>

<?= $this->section('content'); ?>

<div class="container col-xxl-8 px-4 py-5">
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
      <img src="./heroes/engineer.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
    </div>
    <?php foreach ($situs as $situs) :  ?>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3"><?= $situs->judul_situs;  ?></h1>
        <p class="lead"><?= $situs->desc_situs; ?></p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Bergabung Sekarang</button>

        </div>
      </div>
  </div>
</div>


<div class="section-putih p-3">

  <div class="container">
    <h5 class="mb-2">Pelatihan Terbaru</h5>
   
      <div class="card-body">
        <div class="row">
        <?php foreach ($pelatihan as $pel) : ?>
          <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="card mb-2 bg-gradient-dark bungkus">
              <img class="card-img-top image" src="<?= base_url('/thumbnails/' . $pel->gambar); ?>" alt="Dist Photo 1" >
              <div class="card-img-overlay d-flex flex-column justify-content-end">
                <div class="middle">
                <h5 class="card-title text-primary text-white text"><?=$pel->pelatihan; ?></h5>
                
                <a href="<?= base_url('pekerjaan/detail'); ?>" class="text-black">Last update 2 mins ago</a>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        
      </div>
   
  </div>
</div>
<?php endforeach; ?>
<?= $this->endSection(); ?>