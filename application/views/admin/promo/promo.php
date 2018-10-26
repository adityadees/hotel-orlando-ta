<?php  $cc=$data->result_array() ?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data <small>Data Promo</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a href="#myModaltambah" class="btn btn-default" id="custId" data-toggle="modal" ><i class="fa fa-plus-circle"></i> Tambah Data Promo</a></li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Tipe</th>
                  <th>Nama Room</th>
                  <th>Diskon(%)</th>
                  <th>Minimal Hari</th>
                  <th>Promo Start</th>
                  <th>Promo End</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no=0;
                foreach ($data->result_array() as $i) :
                 $no++;
                 ?>
                 <tr>
                  <td><?php echo $i['tipe_kode']; ?></td>
                  <td><?php echo $i['tipe_nama']; ?></td>
                  <td><?php echo $i['promo_diskon']; ?></td>
                  <td><?php echo $i['promo_min_hari']; ?></td>
                  <td><?php echo date('d-m-Y',strtotime($i['promo_start'])); ?></td>
                  <td><?php echo date('d-m-Y',strtotime($i['promo_end'])); ?></td>
                  <td>
                   <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $i['promo_id'];?>"><span class="fa fa-pencil"></span></a>
                   <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $i['promo_id'];?>"><span class="fa fa-trash"></span></a></td>
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


<div class="modal fade bs-example-modal-lg" id="myModaltambah" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Tambah Promo</h4>
      </div>
      <div class="modal-body">
        <div class="fetched-data">
          <form class="form-horizontal form-label-left" action="<?php echo base_url()?>padmin/save_promo" method="POST" enctype="multipart/form-data">


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Promo</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <select name="tipe" class="form-control">
                  <?php 
                  foreach ($tipe->result_array() as $j) :
                    ?> 
                    <option value="<?php echo $j['tipe_kode']; ?>" ><?php echo $j['tipe_nama']; ?></option>

                  <?php  endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Minimal Hari (Day)</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="number" name="minhari" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Diskon (%)</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="number" name="diskon" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Promo Start</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="date" name="promo_start" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Promo End</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="date" name="promo_end" class="form-control">
              </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-success">Submit</button>
             </div>
           </div>

         </form>
       </div>
     </div>

   </div>
 </div>
</div>

<?php foreach ($data->result_array() as $i) :
  ?>
  
  <div class="modal fade" id="ModalEdit<?php echo $i['promo_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Edit Promo</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'padmin/update_promo'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">      

            <input type="hidden" name="kode" value="<?php echo $i['promo_id'];?>"/> 

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Room</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
               <select name="tipe" class="form-control">
                <?php 
                foreach ($tipe->result_array() as $j) : ?>
                 <option value="<?php echo $j['tipe_kode']; ?>" <?php if($j['tipe_kode']==$i['tipe_kode']){echo "Selected";} else {} ?>><?php echo $j['tipe_nama']; ?></option>
               <?php endforeach; ?>
             </select>
           </div>
         </div>

         <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Minimal Hari</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="text" name="promo_min_hari" value="<?php echo $i['promo_min_hari'];?>" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Diskon(%)</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="text" name="promo_diskon" value="<?php echo $i['promo_diskon'];?>" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Promo Start</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="date" name="promo_start" value="<?php echo $i['promo_start'];?>" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Promo End</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="date" name="promo_end" value="<?php echo $i['promo_end'];?>" class="form-control">
          </div>
        </div>

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

<?php foreach ($data->result_array() as $i) :
  ?>
  <!--Modal Hapus Pengguna-->
  <div class="modal fade" id="ModalHapus<?php echo $i['promo_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Hapus Promo</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'padmin/delete_promo'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">       
           <input type="hidden" name="kode" value="<?php echo $i['promo_id'];?>"/> 
           <p>Apakah Anda yakin mau menghapus Promo <b><?php echo $i['tipe_nama'];?></b> ?</p>

         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach;?>


<script src="js/jquery-3.1.1.min.js"></script>
