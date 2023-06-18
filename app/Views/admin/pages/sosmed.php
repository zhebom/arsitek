<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>


<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title"><?= $title; ?></h3>

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
                      if ($sosmed) {
                        foreach ($sosmed as $s) :
                          $i++;

                      ?>
                          <tr>
                            <td><?= $i; ?></td>
                            <td><img src="<?= base_url('/sosmed/' . $s->logo); ?>" width="50" height="50">
                            </td>
                            <td><?= $s->nama; ?></td>
                            <td><?= $s->link; ?></td>
                            <td> <a type="button" class="btn btn-warning btn-sm" href="<?= base_url('admin/sosmed/edit/' . $s->id); ?>"><i class="fas fa-pen"></i></a>
                              <form action="<?= base_url('/admin/sosmed/'.$s->id); ?>" method="post" class="d-inline">
                              <input type="hidden" name="fileLama" id="fileLama" value="<?= $s->logo; ?>">
                              <input type="hidden" name="_method" value="DELETE">
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?');"><i class="fas fa-trash"></i></button>
                              </form>

                            </td>
                          </tr>
                        <?php endforeach;
                      } else { ?>

                        <tr>
                          <td colspan="5" class="middle">Tidak ada data</td>

                          </td>
                        </tr>
                      <?php } ?>
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