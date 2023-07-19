<?= $this->extend('template/layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h4>
          <i class="fas fa-globe"></i> Keranjang Pembayaran

        </h4>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">

        <address>
          <strong>Nama Pembeli</strong><br>
          Alamat Pembeli
        </address>
         
      </div>
      <!-- /.col -->

      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <?= session()->getFlashdata('msg'); ?>
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped" style="text-align:right;">
          <thead>
            <tr>
              <th>Qty</th>
              <th>Product</th>
              <th>Subtotal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>

    
          <?php 
           if (empty($cart))
           { ?>
               <td colspan='4' center><strong>Data Kosong</strong></td>
           <?php }
           ?>
           
            <?php
            
           
            foreach ($cart as $key => $value) : ?>
              <tr>
                
                <td><?= $value['qty']; ?></td>
                <td><?= $value['name']; ?></td>

                <td><?php
                    helper('number');
                    $number =  $value['subtotal'];;
                    echo number_to_currency($number, 'IDR', 'id_ID', 0);


                    ?></td>
                <td>
                  <form action="<?= base_url('/cart/delete/' . $value['rowid']); ?>" method="post" class="min-1">

                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?');">delete</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">

      </div>
      <!-- /.col -->
      <div class="col-6">


        <div class="table-responsive">
          <table class="table" style="text-align:right;">

            <tr>
              <th>Total:</th>
              <th style="text-align= right"><?php
                                            helper('number');
                                            $number =  $total;
                                            echo number_to_currency($number, 'IDR', 'id_ID', 0);

                                            ?></th>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
      <div class="col-12">

      <?= form_open('pelatihan/prosespayment');  ?>
        <button type="submit" class="btn btn-warning float-right <?php if (empty($cart))
           { echo "disabled";?>
               
           <?php }
           ?>" onclick="return confirm('Apakah anda yakin untuk melakukan pembayaran sekarang?')"><i class="fas fa-credit-card"></i> Submit
          Payment
        </button>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
  <!-- /.invoice -->
</div>
<?= $this->endSection(); ?>