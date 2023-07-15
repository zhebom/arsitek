<?= $this->extend('template/layout'); ?>

<?= $this->section('content'); ?>


<div class="section-putih p-3">

  <div class="container">
    <h5 class="mb-2">Pelatihan Terbaru</h5>

    <div class="card-body">
      <div class="row">
        <?php foreach ($pelatihan as $pelatihan) : ?>
          <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="card mb-2 bg-gradient-dark bungkus">
              <img class="card-img-top image" src="<?= base_url('thumbnails/' . $pelatihan->gambar) ?>" alt="Dist Photo 1">
              <div class="card-img-overlay d-flex flex-column justify-content-end">
                <div class="middle">
                <div class="middle">
                <a  href="<?= base_url('pelatihan/'. $pelatihan->slug); ?>" class="card-title text-primary text-white text btn d-flex justify-content-center"><?=$pelatihan->pelatihan; ?></a>
                
                <a class="text-black">Batas Pendaftaran <?php $date = date_create($pelatihan->endpendaftaran); echo  date_format($date, 'd F Y');  ?></a>
                </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</div>

<?= $this->endSection(); ?>