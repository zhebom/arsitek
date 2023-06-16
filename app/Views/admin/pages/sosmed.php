<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>


<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Title</h3>

  </div>
  <div class="card-body">
    <div class="card-body">
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">

                <?= session()->getFlashdata('msg'); ?>
                  <a type="button" class="btn btn-warning btn-block btn-sm" href="<?= base_url('/admin/sosmed/add'); ?>"><i class="fas fa-plus"></i> Tambah Data</a>
                  <!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Logo Sosmed</th>
                        <th>Sosial Media</th>
                        <th>Link</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 0;
                      foreach ($sosmed as $s): 
                        $i++;
                        
                        ?>
                      <tr>
                        <td><?= $i; ?></td>
                        <td>Internet
                          Explorer 4.0
                        </td>
                        <td><?= $s->nama; ?></td>
                        <td><?= $s->link; ?></td>
                        <td> <a type="button" class="btn btn-warning btn-sm" href="#"><i class="fas fa-pen"></i></a> 
                        <a type="button" class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash"></i></a>
                      </td>
                      </tr>
                      <?php endforeach; ?>
                      
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Logo Sosmed</th>
                        <th>Sosial Media</th>
                        <th>Link</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->


            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
  </div>

</div>
<!-- /.card -->


<?= $this->endSection(); ?>