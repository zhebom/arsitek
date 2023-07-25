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
                  <a type="button" href="<?= base_url('admin/pelatihan/add'); ?>" class="btn btn-warning btn-block btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
                  <!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>

                      <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Kuota</th>
                        <th>Biaya</th>
                        <th>Rekap Pendaftar</th>
                        <th>Aksi</th>
                      </tr>

                    </thead>
                    <tbody>
                      <?php
                      $i = 1;
                      foreach ($sM as $s) : ?>
                        <tr>
                          <td><?= $i++; ?></td>
                          <td><img src="<?= base_url('/thumbnails/'. $s->gambar); ?>" width="50" height="50">
                          </td>
                          <td><?= $s->pelatihan; ?></td>
                          <td> <?= $s->kuota; ?></td>
                          <td> <?= $s->biaya; ?></td>
                          <td> <a type="button" class="btn btn-warning btn-sm" href="<?= base_url('admin/pelatihan/'.$s->id) ; ?>" rel="noopener noreferrer">Lihat Pendaftar</a></td>
                          <td>
                              <a type="button" class="btn btn-warning btn-sm d-inline" href="<?= base_url('admin/pelatihan/edit/' . $s->id); ?>"><i class="fas fa-pen"></i></a>
                              <form action="<?= base_url('/admin/faqs/' . $s->id); ?>" method="post" class="d-inline">

                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?');"><i class="fas fa-trash"></i></button>
                              </form>
                            </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Kuota</th>
                        <th>Biaya</th>
                        <th>Rekap Pendaftar</th>
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