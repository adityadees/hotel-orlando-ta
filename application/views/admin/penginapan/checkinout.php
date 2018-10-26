  <div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>
      <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2><i class="fa fa-bars"></i> Data <small>Penginapan</small></h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">


              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Checkin / Checkout</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Checkin</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Checkout</a>
                  </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                   <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_content">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>Booking Kode</th>
                              <th>Nomor Kamar</th>
                              <th>Nama</th>
                              <th>Lama menginap</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no=0;
                            foreach ($data->result_array() as $i) :
                             $no++;
                             ?>
                             <tr>
                              <td><?php echo $i['booking_kode']; ?></td>
                              <td><?php echo $i['kamar_id']; ?></td>
                              <td><?php echo $i['customer_nama']; ?></td>
                              <td><?php echo date('d-m-Y',strtotime($i['booking_awal']))." - ".date('d-m-Y',strtotime($i['booking_akhir'])); ?></td>
                              <td><?php echo $i['booking_status']; ?></td>

                            </tr>
                          <?php endforeach;?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

              </div>
              <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
               <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Booking Kode</th>
                          <th>Nomor Kamar</th>
                          <th>Nama</th>
                          <th>Lama menginap</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no=0;
                        foreach ($checkin->result_array() as $i) :
                         $no++;
                         ?>
                         <tr>
                          <td><?php echo $i['booking_kode']; ?></td>
                          <td><?php echo $i['kamar_id']; ?></td>
                          <td><?php echo $i['customer_nama']; ?></td>
                          <td><?php echo date('d-m-Y',strtotime($i['booking_awal']))." - ".date('d-m-Y',strtotime($i['booking_akhir'])); ?></td>
                          <td>
                           <div class="btn-group">
                            <a data-toggle="modal" data-target="#ModalCheckin<?php echo $i['booking_kode'];?>" class="btn btn-success"> Checkin</a>
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
        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_content">
                <table id="datatable-fixed-header" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Booking Kode</th>
                      <th>Nomor Kamar</th>
                      <th>Nama</th>
                      <th>Lama menginap</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=0;
                    foreach ($checkout->result_array() as $i) :
                     $no++;
                     ?>
                     <tr>
                      <td><?php echo $i['booking_kode']; ?></td>
                      <td><?php echo $i['kamar_id']; ?></td>
                      <td><?php echo $i['customer_nama']; ?></td>
                      <td><?php echo date('d-m-Y',strtotime($i['booking_awal']))." - ".date('d-m-Y',strtotime($i['booking_akhir'])); ?></td>
                      <td><?php echo $i['booking_status']; ?></td>
                      <td>
                       <div class="btn-group">
                         <a data-toggle="modal" data-target="#ModalCheckout<?php echo $i['booking_kode'];?>" class="btn btn-success"> Checkout</a>
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
</div>
</div>
</div>
</div>
</div>
</div>



<?php 
foreach ($checkin->result_array() as $i) :
  ?>
  
  <div class="modal fade" id="ModalCheckin<?php echo $i['booking_kode'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Konfirmasi Checkin</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'padmin/konfirmasi_checkin'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">      

            <input type="hidden" name="booking_kode" class="form-control" value="<?php echo $i['booking_kode'];?>"/> 
            <input type="hidden" name="kamar_id" class="form-control" value="<?php echo $i['kamar_id'];?>"/> 

            <h3 class="text-center"><br>Apakah anda ingin melakukan checkin untuk untuk invoice<br> <b>#<?php echo $i['booking_kode']?></b> ?</h3>
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



<?php 
foreach ($checkout->result_array() as $i) :
  ?>
  
  <div class="modal fade" id="ModalCheckout<?php echo $i['booking_kode'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Konfirmasi Checkout</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'padmin/konfirmasi_checkout'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">      

            <input type="hidden" name="booking_kode" class="form-control" value="<?php echo $i['booking_kode'];?>"/> 
            <input type="hidden" name="kamar_id" class="form-control" value="<?php echo $i['kamar_id'];?>"/> 

            <h3 class="text-center"><br>Apakah anda ingin melakukan checkout untuk invoice<br> <b>#<?php echo $i['booking_kode']?></b> ?</h3>
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


<script src="js/jquery-3.1.1.min.js"></script>
