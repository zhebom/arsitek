<?= $this->extend('template/layout'); ?>

<?= $this->section('content'); ?>


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <h3 class="card-title">Profil Pengguna</h3>
                        <!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?= session()->getFlashdata('msg'); ?>
                        <?php


                        foreach ($user as $s) : ?>

                            <strong><?= $s->user; ?></strong>
                            <form action="<?= base_url('/profil/update'); ?>" method="Post">

                                <div class=" row">
                                    <div class="col-sm-12">
                                        <!-- text input -->


                                        <?= validation_list_errors() ?>

                                        <div class="form-group">
                                            <input type="hidden" id="id" name="id" value="<?= $s->id; ?>">
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $s->nama; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Handphone</label>
                                            <input type="text" class="form-control" id="hp" name="hp" value="<?= $s->no_ktp; ?>">
                                        </div>


                                    </div>
                                </div>
                                <button type="submit" class="btn btn-warning p-0">Submit</button>

                            </form>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- /.social-auth-links -->
                <!-- Default box -->


                <!-- Main content -->
                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Riwayat Pelatihan</h3>

                                        <!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example2" class="table table-bordered table-hover">
                                            <thead>

                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Pelatihan</th>
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
                                                        <td><?= $s->pelatihan; ?></td>
                                                        <td><?php $transfer = $s->total_pesanan * $s->biaya_pelatihan;
                                                            echo $transfer; ?></td>
                                                        <td> - </td>

                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Pelatihan</th>
                                                    <th>Pembayaran</th>
                                                    <th>Status</th>

                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                <!-- /.content -->




            </div>
        </div>
    </div>
</section>




<?= $this->endSection(); ?>