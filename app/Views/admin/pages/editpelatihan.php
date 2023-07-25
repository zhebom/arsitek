<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>


<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?= $title; ?></h3>
    </div>

    <div class="card-body">
        <div class="card-body">
        <?php foreach ($pelatihan as $p): ?>
            <form action="<?= base_url('admin/pelatihan/edit/update/'.$p->id); ?>" method="Post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        
                        <?= session()->getFlashdata('msg'); ?>
                        <?= validation_list_errors() ?>
                        
                        <div class="form-group">
                            <label>Judul Pelatihan</label>
                            <input type="text" class="form-control" placeholder="Masukan Judul Pelatihan ..." id="pelatihan" name="pelatihan" value="<?= $p->pelatihan; ?>">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pelatihan Dimulai</label>
                            <input type="date" class="form-control" placeholder="Masukan Tanggal Pelatihan ..." id="tglpelatihan" name="tglpelatihan" value="<?= $p->tglpelatihan; ?>">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pendaftaran Terakhir</label>
                            <input type="date" class="form-control" placeholder="Masukan Tanggal Pelatihan ..." id="endpendaftaran" name="endpendaftaran" value="<?= $p->endpendaftaran; ?>">
                        </div>
                        <div class="form-group">
                            <label>Kuota Peserta</label>
                            <input type="text" class="form-control" placeholder="Masukan Kuota Peserta ..." id="kuota" name="kuota" value="<?= $p->kuota; ?>">
                        </div>
                        <div class="form-group">
                            <label>Biaya</label>
                            <input type="text" class="form-control" placeholder="Masukan Kuota Peserta ..." id="biaya" name="biaya" value="<?= $p->biaya; ?>">
                        </div>
                        <div class="form-group">
                            <label>Tempat Pelatihan</label>
                            <input type="text" class="form-control" placeholder="Masukan Kuota Peserta ..." id="tempat" name="tempat" value="<?= $p->tempat; ?>">
                        </div>
                        <div class="form-group">
                            <label>Thumbnail Pelatihan</label>
                            <div class="custom-file">
                            <input type="hidden" class="form-control"  id="fileLama" name="fileLama" value="<?= $p->gambar; ?>">
                            <input type="hidden" class="form-control"  id="slugLama" name="slugLama" value="<?= $p->slug; ?>">
                                <input type="file" class="custom-file-input"  id="customFile" name="customFile"  value="<?= $p->gambar; ?>" onchange="fileupload()">
                                <label class="custom-file-label" for="customFile" ><?= $p->gambar; ?></label>
                            </div>
                        </div>
                        
                         <div class="form-group">

                            <div class="card card-info">
                                <div class="card-header">
                                    <h4 class="card-title">Logo Preview</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <a href="£" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                                                <img src="<?= base_url('/thumbnails/'.$p->gambar); ?>" class="img-fluid mb-2" alt="white sample" />
                                            </a>
                                        </div>
                                        
                                    </div>
                                </div>

                            </div>
                        </div> 
                        
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- /.card -->


    <?= $this->endSection(); ?>