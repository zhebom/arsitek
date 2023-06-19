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
              <a type="button" href="<?= base_url('admin/faqs/add'); ?>" class="btn btn-warning btn-block btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
                <!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Uraian Kegiatan</th>
                    <th>Aksi</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    <?php if ($tampil){
                      $i=0;
                      foreach ($tampil as $t):
                        $i++;
                      ?>
                  <tr>
                    <td><?= $i; ?></td>
                    <td><?= $t->pertanyaan; ?>
                    </td>
                    <td><?= $t->keterangan; ?></td>
                    
                    <td>
                    <a type="button" class="btn btn-warning btn-sm" href="<?= base_url('admin/faqs/edit/' . $t->id); ?>"><i class="fas fa-pen"></i></a>
                    <form action="<?= base_url('/admin/faqs/'.$t->id); ?>" method="post" class="d-inline">
                              
                              <input type="hidden" name="_method" value="DELETE">
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?');"><i class="fas fa-trash"></i></button>
                              </form>
                    </td>
                    <?php endforeach; } else {echo "<td colspan='4'>Data tidak ditemukan</td>";} ?>
                  </tr>
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Uraian Kegiatan</th>
                    <th>Engine version</th>
                    
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