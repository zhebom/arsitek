<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>


<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?= $title; ?></h3>
    </div>
    <div class="card-body">
        <div class="card-body">
            <form action="<?= base_url('/admin/situs/add'); ?>" method="POST">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <?= session()->getFlashdata('msg'); ?>
                        <?php if ($tampil) { ?>
                            <div class="form-group">
                                <label>Judul Situs</label>
                                <?php foreach ($tampil as $t) { ?>
                                    <input type="text" class="form-control" placeholder="Masukan Judul Situs ..." id="judul" name="judul" value="<?= $t->judul_situs; ?>">
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Deskripsi Situs</label>
                            <textarea class="form-control" rows="3" placeholder="Masukan deskripsi ..." id="desc" name="desc"><?= $t->desc_situs; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Alamat Kantor</label>
                            <textarea class="form-control" rows="3" placeholder="Masukan deskripsi ..." id="alamat" name="alamat"><?= $t->alamat; ?></textarea>
                        </div>
                    </div>
                </div>
                
            <?php }
                            } else { ?>
            <div class="row">
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
        <div class="row">
            <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                    <label>Alamat Kantor</label>
                    <textarea class="form-control" rows="3" placeholder="Masukan alamat ..." id="alamat" name="alamat"></textarea>
                </div>
            </div>
        </div>
        <?php } ?>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


<!-- /.card -->


<?= $this->endSection(); ?>