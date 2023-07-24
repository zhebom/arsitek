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
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>

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
                                    <th>Kode Pesanan</th>
                                    <th>Nama Pelatihan</th>
                                    <th>Pembayaran</th>
                                    <th>Status Code</th>
                                    <th>Keterangan</th>

                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                //var_dump($cart);die;
                                foreach ($cart as $s) :
                                    $idpesan = $s->kode_pesanan;
                                    $token = base64_encode("SB-Mid-server-cwHft3LdLPzlKt8TO-KLybjA:");
                                    $url = "https://api.sandbox.midtrans.com/v2/" . $idpesan . "/status";
                                    $header = array(
                                        'accept: application/json',
                                        'authorization: Basic ' . $token,


                                    );
                                    $method = 'GET';
                                    $ch = curl_init();
                                    curl_setopt($ch, CURLOPT_URL, $url);
                                    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
                                    curl_setopt($ch, CURLOPT_POSTFIELDS, false);
                                    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    $result = curl_exec($ch);
                                    $hasil = json_decode($result, true);

                                ?>

                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $s->kode_pesanan; ?></td>
                                        <td><?= $s->pelatihan; ?></td>
                                        <td><?php $transfer = $s->total_pesanan * $s->biaya_pelatihan;
                                            echo $transfer; ?></td>
                                        <td> <?= $hasil['status_code']; ?></td>
                                        <td>
                                        <?php 
                                        switch ($hasil['status_code']) {
                                            case 200:
                                              echo "Pembayaran Diterima";
                                              break;
                                            case 201:
                                                echo "Segera Lakukan Pembayaran !!";
                                              break;
                                            case 202:
                                              echo "Transaksi Ditolak !!";
                                              break;
                                              case 300:
                                                echo "Transaksi Dialihkan ";
                                                break;
                                                case  500:
                                                    echo "Internal Server Error";
                                                    break;
                                                    case 501:
                                                        echo "The Feature Is Not Available";
                                                        break;
                                                        case 502:
                                                            echo "Bank Connecton Problem";
                                                            break;
                                                            case 503:
                                                                echo "Masalah Konektifitas";
                                                                break;
                                                                case 504:
                                                                    echo "Internal Server Error : Fraud Detection System is Unavailable";
                                                                    break;
                                                                    case 505:
                                                                        echo "Gagal Request Virtual Account, Coba Lagi Nanti";
                                                                        break;
                                            default:
                                              echo "Transaksi Tidak Ditemukan";
                                          }
                                        
                                        
                                        
                                        ?>




                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Pesanan</th>
                                    <th>Nama Pelatihan</th>
                                    <th>Pembayaran</th>
                                    <th>Status Code</th>
                                    <th>Keterangan</th>

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