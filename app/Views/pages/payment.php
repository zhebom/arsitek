<?= $this->extend('template/layout'); ?>

<?= $this->section('content'); ?>
<?= $token; ?>
<a href="https://app.sandbox.midtrans.com/snap/v2/vtweb/<?= $token; ?>" class="btn btn-success">bayar</a>

   
 
<?= $this->endSection(); ?>