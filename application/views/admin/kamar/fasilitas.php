  <div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Data <small>Data Fasilitas</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a href="#myModaltambah" class="btn btn-default" id="custId" data-toggle="modal" ><i class="fa fa-plus-circle"></i> Tambah Data Fasilitas</a></li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Fasilitas</th>
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
                    <td><?php echo $no; ?></td>
                    <td><?php echo $i['fasilitas_nama']; ?></td>
                    <td>
                     <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $i['fasilitas_id'];?>"><span class="fa fa-pencil"></span></a>
                     <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $i['fasilitas_id'];?>"><span class="fa fa-trash"></span></a></td>
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
        <h4 class="modal-title" id="myModalLabel">Tambah Fasilitas</h4>
      </div>
      <div class="modal-body">
        <div class="fetched-data">
          <form class="form-horizontal form-label-left" action="<?php echo base_url()?>padmin/save_fasilitas" method="POST" enctype="multipart/form-data">


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Fasilitas</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" name="fasilitas_nama" class="form-control">
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
  
  <div class="modal fade" id="ModalEdit<?php echo $i['fasilitas_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Edit Fasilitas</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'padmin/update_fasilitas'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">       
            <input type="hidden" name="kode" value="<?php echo $i['fasilitas_id'];?>"/> 

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Fasilitas</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" name="fasilitas_nama" value="<?php echo $i['fasilitas_nama'];?>" class="form-control">
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
  <div class="modal fade" id="ModalHapus<?php echo $i['fasilitas_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Hapus Fasilitas</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'padmin/delete_fasilitas'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">       
           <input type="hidden" name="kode" value="<?php echo $i['fasilitas_id'];?>"/> 
           <p>Apakah Anda yakin mau menghapus Fasilitas <b><?php echo $i['fasilitas_nama'];?></b> ?</p>

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
