<?= $this->extend('template/layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Riwayat Pelatihan</h3>

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

                                        <!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <?php


                                        foreach ($user as $s) : ?>
                                            <form action="<?= base_url('/profil/update'); ?>" method="Post">

                                                <div class=" row">
                                                    <div class="col-sm-12">
                                                        <!-- text input -->

                                                        <?= session()->getFlashdata('msg'); ?>
                                                        <?= validation_list_errors() ?>

                                                        <div class="form-group">
                                                            <input type="hidden" value="<?= $s->id; ?>">
                                                            <label>Email</label>
                                                            <input type="text" class="form-control" id="email" name="email" value="<?= $s->user ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama Lengkap</label>
                                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $s->nama; ?>">
                                                        </div>


                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            
                                            </form>
                                            <?php endforeach; ?>

                                            <!-- /.social-auth-links -->
                                            <!-- Default box -->
                                            <hr>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Riwayat Pelatihan</h3>

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

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>


    <?= $this->endSection(); ?>