<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>


<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?= $title; ?></h3>
    </div>

    <div class="card-body">
        <div class="card-body">
        <?php if ($tampil){
                            foreach ($tampil as $t):
                            ?>
            <form action="<?= base_url('/admin/sosmed/prosesedit/' . $t->id ); ?>" method="Post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        
                        <?= session()->getFlashdata('msg'); ?>
                        <?= validation_list_errors() ?>
                       
                        <div class="form-group">
                            <label>Nama Sosial Media</label>
                            <input type="text" class="form-control" placeholder="Masukan Nama Sosial Media ..." id="sosmed" name="sosmed" value="<?= $t->nama; ?>">
                            
                            <input type="hidden" class="form-control"  id="fileLama" name="fileLama" value="<?= $t->logo; ?>">
                            
                        </div>
                        <div class="form-group">
                            <label>Link Sosmed</label>
                            <input type="text" class="form-control" placeholder="Masukan Link Sosial Media ..." id="link" name="link" value="<?= $t->link; ?>">
                        </div>
                        <div class="form-group">
                            <label>Logo</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="customFile" onchange="fileupload()" value="<?= $t->logo; ?>">
                                <label class="custom-file-label" for="customFile"><?= $t->logo; ?></label>
                            </div>
                        </div>
                        <?php 
                    
                            endforeach;} else {
                                session()->setFlashdata('msg', '<div class="alert alert-danger" role="alert">Halaman Tidak Ditemukan</div>');
                                throw new \CodeIgniter\Router\Exceptions\RedirectException('admin/sosmed');
                                // throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

                            }?>
                        <div class="form-group">

                            <div class="card card-info">
                                <div class="card-header">
                                    <h4 class="card-title">Logo Preview</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <a href="https://via.placeholder.com/1200/FFFFFF.png?text=1" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                                                <img src="<?= base_url('sosmed/' . $t->logo); ?>" class="img-fluid mb-2" alt="white sample" />
                                            </a>
                                        </div>
                                        
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>

    <!-- /.card -->


    <?= $this->endSection(); ?>