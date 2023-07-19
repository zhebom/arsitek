<?= $this->extend('template/layout'); ?>

<?= $this->section('content'); ?>
<?= $token; ?>
<a target="_blank" href="https://app.sandbox.midtrans.com/snap/v2/vtweb/<?= $token; ?>" class="btn btn-success">bayar</a>

   
 
<?= $this->endSection(); ?>