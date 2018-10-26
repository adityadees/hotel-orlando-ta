  <div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Data <small>Data Customer</small></h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Booking Kode</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tel</th>
                    <th>Tanggal Lahir</th>
                    <th>Kota</th>
                    <th>Alamat</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=0;
                  foreach ($customer->result_array() as $i) :
                   $no++;
                   ?>
                   <tr>
                    <td><?php echo $i['booking_kode']; ?></td>
                    <td><?php echo $i['customer_nama']; ?></td>
                    <td><?php echo $i['customer_email']; ?></td>
                    <td><?php echo $i['customer_tel']; ?></td>
                    <td><?php echo $i['customer_tgl_lahir']; ?></td>
                    <td><?php echo $i['customer_kota']; ?></td>
                    <td><?php echo $i['customer_alamat']; ?></td>
                </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>




<script src="js/jquery-3.1.1.min.js"></script>
