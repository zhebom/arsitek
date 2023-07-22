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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Pembayaran</th>
                        <th>Status</th>
                        
                      </tr>

                    </thead>
                    <tbody>
                      <?php
                      $i = 1;
                      //var_dump($cart);die;
                      foreach ($cart as $s) : ?>
                        <tr>
                          <td><?= $i++; ?></td>
                          <td><?= $s->nama; ?>
                          </td>
                          <td><?= $s->user; ?></td>
                          <td><?php $transfer = $s->total_pesanan*$s->biaya_pelatihan;
                          echo $transfer; ?></td>
                          <td> </td>
                         
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Pembayaran</th>
                        <th>Status</th>
                        
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