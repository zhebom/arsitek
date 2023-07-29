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
                  <h3 class="card-title">Rekap Pendaftar Pelatihan</h3>
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
                        $token = base64_encode($server.":");
                        $url = $api . $idpesan . "/status";
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
                          <td><?= $s->nama; ?>
                          </td>
                          <td><?= $s->user; ?></td>
                          <td><?php $transfer = $s->total_pesanan*$s->biaya_pelatihan;
                          echo $transfer; ?></td>
                          <td> <?= $hasil['status_code']; ?></td>
                          <td>
                                            <?php
                                            switch ($hasil['status_code']) {
                                                case 200:
                                                    echo "Pembayaran Diterima";
                                                    break;
                                                case 201:
                                                    echo "Menunggu Pembayaran";
                                                    break;
                                                case 202:
                                                    echo "Transaksi Ditolak !!";
                                                    break;
                                                case 300:
                                                    echo "Moved permanently, current and all future requests should be directed to the new URL ";
                                                    break;
                                                case 400:
                                                    echo "Validation Error, merchant sends bad request data example; validation error, invalid transaction type, invalid credit card format, etc.";
                                                    break;
                                                case 401:
                                                    echo "Access Denied Due To Unauthorized Transaction";
                                                    break;
                                                case 402:
                                                    echo "Merchant Doesnt have acces for this payment";
                                                    break;
                                                case 403:
                                                    echo "The requested resource is only capable of generating content not acceptable according to the accepting headers that sent in the reques";
                                                    break;
                                                case 404:
                                                    echo "Transaksi tidak ditemukan";
                                                    break;
                                                case 405:
                                                    echo "HTTP method is not allowed";
                                                    break;
                                                case 406:
                                                    echo "Kode Pesanan Telah Digunakan Sebelumnya";
                                                    break;
                                                case 407:
                                                    echo "Expired Transaction";
                                                    break;
                                                case 408:
                                                    echo "Merchant Sends the wrong data type";
                                                    break;
                                                case 409:
                                                    echo "Merchant has sent too many transactions for the same card number";
                                                    break;
                                                case 410:
                                                    echo "Merchant Account is deactivated";
                                                    break;
                                                case 411:
                                                    echo "Token id Is Missing, invalid or timed out";
                                                    break;
                                                case 412:
                                                    echo "Merchant cannot modify status of the transaction";
                                                    break;
                                                case 413:
                                                    echo "The request cannot be processed due to malformed syntax in the request body";
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
                        <th>Nama</th>
                        <th>Email</th>
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