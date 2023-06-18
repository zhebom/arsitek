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
                                <label>Pertanyaan FAQ</label>
                                <?php foreach ($tampil as $t) { ?>
                                    <input type="text" class="form-control" placeholder="Masukan Pertanyaan ..." id="pertanyaan" name="pertanyaan" value="<?= $t->judul_situs; ?>">
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Keterangan FAQ</label>
                            <textarea class="form-control" rows="3" placeholder="Masukan Jawaban ..." id="keterangan" name="keterangan"><?= $t->desc_situs; ?></textarea>
                        </div>
                    </div>
                <?php }
                            } else { ?>
                <div class="form-group">
                    <label>Pertanyaan FAQ</label>
                    <input type="text" class="form-control" placeholder="Masukan Pertanyaan FAQ ..." id="pertanyaan" name="pertanyaan">
                </div>
                </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                    <label>Keterangan FAQ</label>
                    <textarea class="form-control" rows="3" placeholder="Masukan Jawaban ..." id="keterangan" name="keterangan"></textarea>
                </div>
            </div>
        <?php } ?>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


<!-- /.card -->


<?= $this->endSection(); ?>