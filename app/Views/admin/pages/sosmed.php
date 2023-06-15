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

                  <a type="button" class="btn btn-success btn-block btn-sm" href="<?= base_url('/admin/sosmed/add'); ?>"><i class="fas fa-plus"></i> Tambah Data</a>
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
                      <tr>
                        <td>Trident</td>
                        <td>Internet
                          Explorer 4.0
                        </td>
                        <td>Win 95+</td>
                        <td> 4</td>
                        <td>X</td>
                      </tr>
                      <tr>
                        <td>Trident</td>
                        <td>Internet
                          Explorer 5.0
                        </td>
                        <td>Win 95+</td>
                        <td>5</td>
                        <td>C</td>
                      </tr>
                      <tr>
                        <td>Trident</td>
                        <td>Internet
                          Explorer 5.5
                        </td>
                        <td>Win 95+</td>
                        <td>5.5</td>
                        <td>A</td>
                      </tr>
                      
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