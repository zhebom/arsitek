<?= $this->extend('template/layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <H2>Profil Pengguna</H2>
    <form action="<?= base_url('/register/save'); ?>" method="Post" ">
    <?php
    
  
    foreach ($user as $s) : ?>    
    <div class=" row">
        <div class="col-sm-12">
            <!-- text input -->

            <?= session()->getFlashdata('msg'); ?>
            <?= validation_list_errors() ?>

            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" id="pelatihan" name="email" value="<?= $s->user ?>">
            </div>
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $s->nama; ?>">
            </div>
           

        </div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
<?php endforeach; ?>
</form>

</div>
<!-- /.social-auth-links -->





<?= $this->endSection(); ?>