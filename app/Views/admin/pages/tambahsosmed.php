<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>


<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?= $title; ?></h3>
    </div>

    <div class="card-body">
        <div class="card-body">
   
            <form action="<?= base_url('/admin/sosmed/prosesadd'); ?>" method="Post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        
                        <?= session()->getFlashdata('msg'); ?>
                        <?= validation_list_errors() ?>
                        <div class="form-group">
                            <label>Nama Sosial Media</label>
                            <input type="text" class="form-control" placeholder="Masukan Nama Sosial Media ..." id="sosmed" name="sosmed">
                        </div>
                        <div class="form-group">
                            <label>Link Sosmed</label>
                            <input type="text" class="form-control" placeholder="Masukan Link Sosial Media ..." id="link" name="link">
                        </div>
                        <div class="form-group">
                            <label>Logo</label>
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