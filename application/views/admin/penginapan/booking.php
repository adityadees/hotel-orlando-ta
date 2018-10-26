  <div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Data <small>Data Booking</small></h2>

              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Invoice</th>
                    <th>Nomor Kamar</th>
                    <th>Lama Booking</th>
                    <th>Total Biaya</th>
                    <th>Status Pembayaran</th>
                    <th>Metode Pembayaran</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=0;
                  foreach ($booking->result_array() as $i) :
                    $kode=$i['booking_kode'];
                    $no++;
                    ?>
                    <tr>
                      <td><?php echo $i['booking_kode']; ?></td>
                      <td><?php echo $i['kamar_id']; ?></td>
                      <td><?php echo date('d-m-Y',strtotime($i['booking_awal']))." s/d ".date('d-m-Y',strtotime($i['booking_akhir'])); ?></td>
                      <td><?php echo "Rp ".number_format($i['pembayaran_total']); ?></td>
                      <td><?php echo $i['pembayaran_status']; ?></td>
                      <td><?php echo $i['pembayaran_metode']; ?></td>
                      <td>
                       <div class="btn-group">
                        <?php 
                        $cc=$this->m_padmin->get_bukti($kode) ;
                        $gdsk=$cc->num_rows();
                        
                        if($gdsk>0)
                        {
                          ?>
                          <a data-toggle="modal" data-target="#ModalEdit<?php echo $i['booking_kode'];?>" class="btn btn-success"> Action</a>
                        <?php  }else 
                        { ?>
                          <button type="button" class="btn btn-danger disabled">Action</button>
                        <?php } ?>
                      </div>



                    </td>
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



<?php 
foreach ($booking->result_array() as $i) :
  $kode=$i['booking_kode'];
  $dd=$this->m_padmin->get_bukti($kode) ;
  $ee=$dd->row_array();
  ?>
  
  <div class="modal fade" id="ModalEdit<?php echo $i['booking_kode'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Konfirmasi Pembayaran</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'padmin/update_status_pembayaran'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">      

            <input type="hidden" name="booking_kode" class="form-control" value="<?php echo $i['booking_kode'];?>"/> 
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <img src="<?php echo base_url().'assets/images/'.$ee['bt_file'];?>" class="img img-responsive">
              </div>
            </div>
            <h3 class="text-center"><br>Apakah anda ingin mengkonfirmasi invoice dengan kode booking <b>#<?php echo $i['booking_kode']?></b> ?</h3>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach;?>
<!--Modal Edit Album-->
<script src="js/jquery-3.1.1.min.js"></script>
