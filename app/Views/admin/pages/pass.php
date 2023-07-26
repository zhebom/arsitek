<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <h3 class="card-title">Ubah Password</h3>

                        <!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?= session()->getFlashdata('msg'); ?>
                        <?= validation_list_errors() ?>
                        <?php
                        foreach ($user as $s) : ?>
                            <strong><?= $s->user; ?></strong>
                            <form action="<?= base_url('admin/pass/update'); ?>" method="Post">

                                <div class=" row">
                                    <div class="col-sm-12">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <input type="hidden" id="id" name="id" value="<?= $s->id; ?>">
                                            <label>Password Baru</label>

                                            <input type="password" class="form-control" id="pass" name="pass">
                                        </div>
                                        <div class="form-group">
                                            <label>Konfirmasi Password</label>
                                            <input type="password" class="form-control" id="passconf" name="passconf">
                                        </div>


                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>

                            </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<?= $this->endSection(); ?>