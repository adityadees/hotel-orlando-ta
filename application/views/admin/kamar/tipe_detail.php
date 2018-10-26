  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/backend/vendors/dropify/css/dropify.css">
  <style type="text/css">
  .row > .column {
    padding: 0 8px;
  }

  .row:after {
    content: "";
    display: table;
    clear: both;
  }

  .column {
    float: left;
    width: 25%;
  }

  .modal {
    display: none;
    position: fixed;
    padding-top: 10px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.6);
  }

  .modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    width: 90%;
    max-width: 1200px;
  }

  .close {
    color: white;
    position: absolute;
    top: 10px;
    right: 65px;
    font-size: 35px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: #999;
    text-decoration: none;
    cursor: pointer;
  }

  .mySlides {
    display: none;
  }

  .prev,
  .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -50px;
    color: white;
    font-weight: bold;
    font-size: 20px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
    -webkit-user-select: none;
  }

  .next {
    right: 0;
    border-radius: 3px 0 0 3px;
  }

  .prev:hover,
  .next:hover {
    background-color: rgba(0, 0, 0, 0.8);
  }

  
  img.demo {
    opacity: 0.6;
  }

  .active,
  .demo:hover {
    opacity: 1;
  }

  img.hover-shadow {
    transition: 0.3s;
  }

  .hover-shadow:hover {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }

  input[type="checkbox"] {
    display: none;
  }

  label:before {
    background: linear-gradient(to bottom, #fff 0px, #e6e6e6 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
    border: 1px solid #035f8f;
    height: 36px;
    width: 36px;
    display: block;
    cursor: pointer;
  }
  input[type="checkbox"] + label:before {
    content: '';
    background: linear-gradient(to bottom, #e6e6e6 0px, #fff 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
    border-color: #3d9000;
    color: #96be0a;
    font-size: 38px;
    line-height: 35px;
    text-align: center;
  }

  input[type="checkbox"]:disabled + label:before {
    border-color: #eee;
    color: #ccc;
    background: linear-gradient(to top, #e6e6e6 0px, #fff 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
  }

  input[type="checkbox"]:checked + label:before {
    content: '✓';
  }
</style>
<?php 
$gtipe=$data->row_array();
?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data <small>Detail Tipe</small></h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">

              <div class="col-md-7 col-sm-7 col-xs-12">
               <div class="row">


                <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="panel">
                    <a class="panel-heading collapsed" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#CollapseOne" aria-expanded="false" aria-controls="CollapseOne">
                      <h4 class="panel-title">Upload Gallery Tipe</h4>
                    </a>
                    <div id="CollapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                      <div class="panel-body">
                       <form action="<?php echo site_url('padmin/upload_tipe_image');?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Title</label>
                          <input type="text" class="form-control" name="gambar_judul" placeholder="Title">
                          <input type="hidden" class="form-control" name="tipe_kode" value="<?php echo $gtipe['tipe_kode']; ?>" placeholder="Title">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputFile">File input</label>
                          <input type="file" class="dropify" name="filefoto" data-height="300">

                        </div>

                        <button type="submit" class="btn btn-primary form-control">Upload</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <?php 
              $no=0; 
              foreach ($gambar->result_array() as $i) : 
                $no++;  ?>
                <div class="col-md-4">
                  <div class="thumbnail">
                    <div class="image view view-first">
                      <img src="<?php echo base_url().'assets/images/'.$i['gambar_file'];?>" onclick="openModal();currentSlide(<?php echo $no; ?>)" class="hover-shadow" width="100%" height="100%">
                      <div class="mask">
                        <p><?php echo $i['gambar_judul']; ?></p>
                        <div class="tools tools-bottom">
                          <a href="#" onclick="openModal();currentSlide(<?php echo $no; ?>)"><i class="fa fa-eye"></i></a>
                          <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $i['gambar_id'];?>"><span class="fa fa-pencil"></span></a>
                          <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $i['gambar_id'];?>"><span class="fa fa-trash"></span></a>
                        </div>
                      </div>
                    </div>
                    <div class="caption">
                      <h4><?php echo $i['gambar_judul']; ?></h4>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>

            <div id="myModal" class="modal">
              <span class="close cursor" onclick="closeModal()">&times;</span>
              <div class="modal-content">
                <?php
                $no=0;
                foreach ($gambar->result_array() as $i) : 
                  $no++;  ?>
                  <div class="mySlides">
                    <img src="<?php echo base_url().'assets/images/'.$i['gambar_file'];?>" style="width:100%" >
                  </div>   

                <?php endforeach; ?>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

              </div>
            </div>
          </div>

          <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">
            <h3 class="prod_title"><?php echo $gtipe['tipe_nama']; ?></h3>
            <p><?php echo $gtipe['tipe_deskripsi']; ?></p>
            <br />
            <br />

            <div class="row col-md-12">
              <h2>Fasilitas<small> Bebarapa Fasilitas yang dimiliki :</small></h2>
              <?php 
              $uu=$gtipe['tipe_fasilitas'];
              $ccd=explode(",",$uu);
              ?>
              <?php foreach ($fasilitas->result_array() as $j ) : ?>
                <div class="col-md-4">

                  <input type="checkbox" name="fasilitas[]" value="<?php echo $j['fasilitas_id']; ?>" <?php if(in_array($j['fasilitas_id'],$ccd)){echo "checked";}?>>
                  <label for="fasilitas"><?php echo $j['fasilitas_nama']; ?></label><br>
                </div>
              <?php endforeach; ?>     
            </div>
            <div class="row col-md-12">
              <div class="product_price">
                <h1 class="price"><?php echo "Rp. ".number_format($gtipe['tipe_harga']); ?></h1>
                <span class="price-tax">PPN +10%</span>
                <br>
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

<?php foreach ($gambar->result_array() as $i) :
  ?>
  <div class="modal fade" id="ModalHapus<?php echo $i['gambar_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Hapus Gambar</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'padmin/delete_tipe_image'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">       
           <input type="hidden" name="kode" value="<?php echo $i['gambar_id'];?>"/> 
           <input type="hidden" name="tipe_kode" value="<?php echo $i['tipe_kode'];?>"/> 
           <p>Apakah Anda yakin mau menghapus Gambar <b><?php echo $i['gambar_judul'];?></b> ?</p>

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

<?php foreach ($gambar->result_array() as $i) :
  ?>
  
  <div class="modal fade" id="ModalEdit<?php echo $i['gambar_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Edit Gambar</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'padmin/update_tipe_image'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">      

            <input type="hidden" name="tipe_kode" value="<?php echo $i['tipe_kode'];?>"/> 
            <input type="hidden" name="kode" value="<?php echo $i['gambar_id'];?>"/> 

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Judul</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" name="gambar_judul" value="<?php echo $i['gambar_judul'];?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Gambar</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="file" name="filefoto" class="form-control">
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

<script>
  function openModal() {
    document.getElementById('myModal').style.display = "block";
  }

  function closeModal() {
    document.getElementById('myModal').style.display = "none";
  }

  var slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
    if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        captionText.innerHTML = dots[slideIndex-1].alt;
      }
    </script>
