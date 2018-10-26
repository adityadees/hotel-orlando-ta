  <div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Data <small>Data Tipe</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a href="#myModaltambah" class="btn btn-default" id="custId" data-toggle="modal" ><i class="fa fa-plus-circle"></i> Tambah Data Tipe</a></li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Tipe Kode</th>
                    <th>Gambar</th>
                    <th>Nama Tipe</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
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
                    <td><img src="<?php echo base_url().'assets/images/'.$i['tipe_gambar'];?>" style="width:80px;"></td>
                    <td><a href="<?php echo base_url().'tipe/detail-tipe/'.$i['tipe_kode'];?>"><?php echo $i['tipe_nama']; ?></a></td>
                    <td><?php echo $i['tipe_harga']; ?></td>
                    <td><?php echo $i['tipe_deskripsi']; ?></td>
                    <td>
                     <div class="btn-group">
                      <button type="button" class="btn btn-danger">Action</button>
                      <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li>
                          <a data-toggle="modal" data-target="#ModalEdit<?php echo $i['tipe_kode'];?>"><span class="fa fa-pencil"> Edit</span></a>
                        </li>
                        <li>
                          <a data-toggle="modal" data-target="#ModalHapus<?php echo $i['tipe_kode'];?>"><span class="fa fa-trash"> Delete </span></a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url().'tipe/detail-tipe/'.$i['tipe_kode'];?>"><span class="fa fa-search"> Lihat Detail</span></a>
                        </li>
                      </ul>
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


<div class="modal fade bs-example-modal-lg" id="myModaltambah" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Tambah Tipe</h4>
      </div>
      <div class="modal-body">
        <div class="fetched-data">
          <form class="form-horizontal form-label-left" action="<?php echo base_url()?>padmin/save_tipe" method="POST" enctype="multipart/form-data">

            <?php
            $cc=$maxtipe->row_array();
            $gmax="R00".rand(0,999).($cc['maxidtipe']+1);
            ?>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Tipe</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" name="tipe_kode" value="<?php echo $gmax; ?>" class="form-control" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Tipe</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" name="tipe_nama" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga / Malam</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" name="tipe_harga" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <textarea  name="tipe_deskripsi" class="form-control"></textarea>
              </div>
            </div>
            <hr>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
               <input type="file" name="filefoto">
             </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Fasilitas</label>
            <div class="col-md-9 col-sm-9 col-xs-12">

              <?php foreach ($fasilitas->result_array() as $i ) : ?>
                <div class="col-md-3">
                  <input type="checkbox" name="fasilitas[]" value="<?php echo $i['fasilitas_id']; ?>" class="flat">
                  <label for="fasilitas"><?php echo $i['fasilitas_nama']; ?></label><br>
                </div>
              <?php endforeach; ?>         

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
  
  <div class="modal fade" id="ModalEdit<?php echo $i['tipe_kode'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Edit Tipe</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'padmin/update_tipe'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">      

            <input type="hidden" name="tipe_kode" value="<?php echo $i['tipe_kode'];?>"/> 

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Tipe</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" name="tipe_nama" value="<?php echo $i['tipe_nama'];?>" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga / Malam</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" name="tipe_harga" value="<?php echo $i['tipe_harga'];?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <textarea  name="tipe_deskripsi" class="form-control"><?php echo $i['tipe_deskripsi'];?></textarea>
              </div>
            </div>

            <hr>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Gambar</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="file" name="filefoto" class="form-control">
                <span>*Kosongkan jika tidak ingin merubah gambar</span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Fasilitas</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
               <?php 
               $uu=$i['tipe_fasilitas'];
               $ccd=explode(",",$uu);
               ?>
               <?php foreach ($fasilitas->result_array() as $j ) : ?>
                <div class="col-md-3">
                  <input type="checkbox" name="fasilitas[]" value="<?php echo $j['fasilitas_id']; ?>" class="flat" <?php if(in_array($j['fasilitas_id'],$ccd)){echo "checked=checked";}?>>
                  <label for="fasilitas"><?php echo $j['fasilitas_nama']; ?></label><br>
                </div>
              <?php endforeach; ?>         

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
  <div class="modal fade" id="ModalHapus<?php echo $i['tipe_kode'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Hapus Tipe</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'padmin/delete_tipe'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">       
           <input type="hidden" name="kode" value="<?php echo $i['tipe_kode'];?>"/> 
           <p>Apakah Anda yakin mau menghapus Tipe <b><?php echo $i['tipe_nama'];?></b> ?</p>

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
