<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>


<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Title</h3>
<?php var_dump($a); ?>
    </div>
    <div class="card-body">
        <div class="card-body">
            <form action="<?= base_url('/admin/situs/add'); ?>" method="POST">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Judul Situs</label>
                            <input type="text" class="form-control" placeholder="Masukan Judul Situs ..." id="judul" name="judul">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Deskripsi Situs</label>
                            <textarea class="form-control" rows="3" placeholder="Masukan deskripsi ..." id="desc" name="desc"></textarea>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>
<!-- /.card -->


<?= $this->endSection(); ?>