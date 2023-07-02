<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>


<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?= $title; ?></h3>
    </div>

    <div class="card-body">
        <div class="card-body">
   
            <form action="<?= base_url('/admin/pelatihan/add/save'); ?>" method="Post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        
                        <?= session()->getFlashdata('msg'); ?>
                        <?= validation_list_errors() ?>
                        <div class="form-group">
                            <label>Judul Pelatihan</label>
                            <input type="text" class="form-control" placeholder="Masukan Judul Pelatihan ..." id="pelatihan" name="pelatihan" value="<?= old('pelatihan'); ?>">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pelatihan Dimulai</label>
                            <input type="date" class="form-control" placeholder="Masukan Tanggal Pelatihan ..." id="tglpelatihan" name="tglpelatihan" value="<?= old('tglpelatihan'); ?>">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pendaftaran Terakhir</label>
                            <input type="date" class="form-control" placeholder="Masukan Tanggal Pelatihan ..." id="endpendaftaran" name="endpendaftaran" value="<?= old('endpendaftaran'); ?>">
                        </div>
                        <div class="form-group">
                            <label>Kuota Peserta</label>
                            <input type="text" class="form-control" placeholder="Masukan Kuota Peserta ..." id="kuota" name="kuota" value="<?= old('kuota'); ?>">
                        </div>
                        <div class="form-group">
                            <label>Thumbnail Pelatihan</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="customFile" onchange="fileupload()">
                                <label class="custom-file-label" for="custo mFile">Choose file</label>
                            </div>
                        </div>
                        <!-- <div class="form-group">

                            <div class="card card-info">
                                <div class="card-header">
                                    <h4 class="card-title">Logo Preview</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <a href="https://via.placeholder.com/1200/FFFFFF.png?text=1" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                                                <img src="https://via.placeholder.com/300/FFFFFF?text=1" class="img-fluid mb-2" alt="white sample" />
                                            </a>
                                        </div>
                                        
                                    </div>
                                </div>

                            </div>
                        </div> -->
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <!-- /.card -->


    <?= $this->endSection(); ?>