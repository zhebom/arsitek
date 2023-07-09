<?= $this->extend('template/layout'); ?>

<?= $this->section('content'); ?>


<div class="container p-3">
  <h5 class="card-title p-2">Penggunaan Aplikasi</h5>
  <div class="accordion" id="accordionExample">

    <?php $i = 1;
    foreach ($faq as $faq) : ?>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $i;  ?>" aria-expanded="true" aria-controls="<?= $i; ?>">
            <h5><?=$i.". ";  ?><?= $faq->pertanyaan; ?></h5>
          </button>
        </h2>
        <div id="<?= $i; ?>" class="accordion-collapse collapse <?php if($i==1){echo "show";} ?>" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <?= $faq->keterangan; ?>
          </div>
        </div>
      </div>
    <?php $i++;
    endforeach; ?>
  </div>
</div>

<?= $this->endSection(); ?>