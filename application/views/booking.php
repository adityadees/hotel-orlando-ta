

<style type="text/css">
@charset "UTF-8";
@import url("https://fonts.googleapis.com/css?family=Dax:400,900");

.middle {
  width: 100%;
  text-align: center;
  /* Made by */
}
.middle h1 {
  font-family: "Dax", sans-serif;
  color: #fff;
}
.middle input[type=radio] {
  display: none;
}
.middle input[type=radio]:checked + .box {
  background-color: #007e90;
}
.middle input[type=radio]:disabled + .box {
  background-color: #ff7675;
}
.middle input[type=radio]:checked + .box span {
  color: white;
  transform: translateY(10px);
}
.middle input[type=radio]:checked + .box span:before {
  transform: translateY(0px);
  opacity: 1;
}
.middle .box {
  width: 100px;
  height: 100px;
  background-color: #6887B7;
  transition: all 250ms ease;
  will-change: transition;
  display: inline-block;
  text-align: center;
  cursor: pointer;
  position: relative;
  font-family: "Dax", sans-serif;
}
.middle .box:active {
  transform: translateY(10px);
}
.middle .box span {
    position: absolute;
    transform: translate(0, -10px);
    left: 0;
    right: 0;
    transition: all 300ms ease;
    user-select: none;
    color: #C5D4ED;
}
.middle .box span:before {
  font-family: FontAwesome;
  display: block;
  transform: translateY(-80px);
  opacity: 0;
  transition: all 300ms ease-in-out;
  color: white;
}
.middle .front-end span:before {
  content: "";
}
.middle .back-end span:before {
  content: "";
}
.middle p {
  color: #fff;
  font-family: "Dax", sans-serif;
}
.middle p span:after {
  content: "";
  font-family: FontAwesome;
  color: yellow;
}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/form-wizard.css" />
<!-- Small Banner Begin -->
<section class="rh-detail-bg list-view-column2 event">
    <div class="container">
        <div class="row">
            <div class="rh-detail-widgets ">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="rh text-center">
                        <h2>Booking</h2>
                        <p>Captions line here</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Small Banner Close -->

<!-- Main Content Begin -->
<div class="rh rh-100 section-booking">
    <!-- Booking Page Begin -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-wizard">
                <!-- Form Wizard -->
                <form action="<?php echo base_url()?>frontend/save_booking" method="post">
                    <!-- Form progress -->
                    <div class="form-wizard-steps form-wizard-tolal-steps-4">
                        <div class="form-wizard-progress">
                            <div class="form-wizard-progress-line" data-now-value="12.25" data-number-of-steps="4" style="width: 12.25%;"></div>
                        </div>
                        <!-- Step 1 -->
                        <div class="form-wizard-step active">
                            <div class="form-wizard-step-icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                            <p>Choose Your Date</p>
                        </div>
                        <!-- Step 1 -->
                        <!-- Step 2 -->
                        <div class="form-wizard-step">
                            <div class="form-wizard-step-icon"><i class="fa fa-building-o" aria-hidden="true"></i></div>
                            <p>Choose Your Room</p>
                        </div>
                        <!-- Step 2 -->
                        <!-- Step 3 -->
                        <div class="form-wizard-step">
                            <div class="form-wizard-step-icon"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
                            <p>Reservation</p>
                        </div>
                        <!-- Step 3 -->
                        <!-- Step 4 -->
                        <div class="form-wizard-step">
                            <div class="form-wizard-step-icon"><i class="fa fa-check" aria-hidden="true"></i></div>
                            <p>Confirmation</p>
                        </div>
                        <!-- Step 4 -->
                    </div>
                    <!-- Form progress -->
                    <!-- Form Step 1 -->
                    <fieldset style="display: block;">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php 
                                $stringkode='BOH';
                                $nck=$mbooking->row_array();
                                $nk=$nck['maxidbook']+1;
                                $newdt=date("ymd");
                                $booking_kode=$stringkode.$nk.$newdt.rand(0,999);
                                
                                ?>
                                <input type="hidden" name="booking_kode" value="<?php echo $booking_kode; ?>">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="rh-datepicker">
                                            <div class="input-daterange" id="datepicker" name="ddtr">
                                                <input class="date-picker-inline first" type="hidden" name="datebook" id="datepicker">
                                                <div class="date-picker-inline first"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-wizard-buttons">
                            <button type="button" name="btn" class="btn btn-next">Next</button>
                        </div>
                    </fieldset>
                    <!-- Form Step 1 -->
                    <!-- Form Step 2 -->
                    <fieldset>
                        <!-- Featured Rooms Begin -->
                        <section class="rh rh-featured-rooms rh-booking-rooms">
                            <div class="row">
                             <?php  
                             foreach ($tersedia->result_array() as $i) : 
                                 $kode=$i['tipe_kode']; 
                                 $cdsk=$this->m_padmin->get_promo_by_kode($kode);
                                 $gdsk=$cdsk->row_array();
                                 ?>


                                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="rh rh-feature-box">
                                        <div class="rh-img">
                                            <img src="<?php echo base_url().'assets/images/'.$i['tipe_gambar'];?>">
                                            <a href="<?php echo base_url().'Room/detail/'.$i['tipe_kode'];?>"></a>
                                        </div>
                                        <div class="feature-detail">
                                            <h4><a href="<?php echo base_url().'Room/detail/'.$i['tipe_kode'];?>"><?php echo $i['tipe_nama'];?></a></h4>
                                            <hr>
                                            <div class="rh">
                                                <i class="fa fa-dolar" aria-hidden="true"></i>
                                                <p>
                                                    <?php echo "Rp. ".number_format($i['tipe_harga'])." / Malam"; ?>
                                                    <input type="hidden" value="<?php echo $i['tipe_harga']; ?>" name="harga">
                                                </p>
                                            </div>
                                            <div class="rh">
                                                <i class="fa fa-percent" aria-hidden="true"></i>
                                                <p>
                                                    <?php if($gdsk){
                                                        $diskon=$gdsk['promo_diskon'];
                                                        $minhari=$gdsk['promo_min_hari'];
                                                        $pstart=$gdsk['promo_start'];
                                                        $pend=$gdsk['promo_end'];
                                                        echo "Diskon <b>".$diskon."%</b> untuk minimal penginapan selama <b>".$minhari." hari</b>";
                                                        echo "<input type='hidden' name='diskon' value='$diskon'>";
                                                        echo "<input type='hidden' name='minhari' value='$minhari'>";
                                                        echo "<input type='hidden' name='pstart' value='$pstart'>";
                                                        echo "<input type='hidden' name='pend' value='$pend'>";
                                                    } else {
                                                        echo "<strike class='text-danger'>Tidak ada diskon</strike>";
                                                        echo "<input type='hidden' name='diskon' value='0'>";
                                                        echo "<input type='hidden' name='minhari' value='0'>";
                                                    }?>
                                                    
                                                </p>
                                            </div>
                                            

                                            <div class="rh">
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                <p><?php echo $i['tipe_deskripsi']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center" style="padding-top: 10px;padding-bottom: 30px;">
                                            <a data-toggle="collapse" href="#collapse<?php echo $i['tipe_kode']; ?>" class="btn btn-primary">View Avaible Rooms</a>
                                        </div>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <div class="panel-group">
                                            <div class="panel panel-primary">
                                              <div id="collapse<?php echo $i['tipe_kode']; ?>" class="panel-collapse collapse">
                                                <div class="panel-footer">
                                                    <div class="col-md-12">
                                                     <div class="middle">

                                                        <?php
                                                        $tipeid=$i['tipe_kode'];
                                                        $lst=$this->m_padmin->get_kamar_by_tipe($tipeid); 
                                                        foreach ($lst->result_array() as $k) : 
                                                            $kamar_id=$k['kamar_id'];
                                                            ?>
                                                            <label>
                                                                <input type="radio" name="kamar" value="<?php echo $kamar_id; ?>" <?php if($k['kamar_status']=='tersedia'){} else {echo "disabled";} ?> />
                                                                <div class="front-end box">
                                                                    <span>
                                                                        <i class="fa fa-check"> <b><?php echo $kamar_id; ?></b></i><br>
                                                                        <?php echo strtoupper($k['kamar_status']); ?>
                                                                    </span>
                                                                </div>
                                                            </label>
                                                        <?php  endforeach; ?>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
            <!-- Featured Rooms Close -->

            <div class="form-wizard-buttons">
                <button type="button" class="btn btn-previous">Previous</button>
                <button type="button" class="btn btn-next">Next</button>
            </div>
        </fieldset>
        <!-- Form Step 2 -->
        <!-- Form Step 3 -->
        <fieldset>
            <div class="rh rh-reservation-form">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-6 rh-xs-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nama" placeholder="First Name /">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-6 rh-xs-12">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" />
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-6 rh-xs-12">
                        <div class="form-group">
                            <input type="date" class="form-control" name="tgl_lahir" />
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-6 rh-xs-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="tel" placeholder="Telepon" />
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-6 rh-xs-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="kota" placeholder="Kota" />
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-6 rh-xs-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="alamat" placeholder="Alamat" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea cols="12" rows="10" class="form-control" name="deskripsi" placeholder="Special Requirements"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-wizard-buttons">
                <div class="">

                </div>
                <button type="button" class="btn btn-previous">Previous</button>
                <button type="button" class="btn btn-next">Next</button>
            </div>
        </fieldset>
        <!-- Form Step 3 -->
        <!-- Form Step 4 -->
        <fieldset>
            <div class="rh-reservation-complate">
                <h4>Metode Pembayaran</h4><br>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                            <select name="metode_pembayaran" class="form-control">
                                <option value="transfer">Transfer</option>
                                <option value="ditempat">Bayar Ditempat</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-wizard-buttons">
                <button type="button" class="btn btn-previous">Previous</button>
                <button type="submit" class="btn btn-submit">Done</button>
            </div>
        </fieldset>
        <!-- Form Step 4 -->
    </form>
    <!-- Form Wizard -->
</div>
</div>
</div>
<!-- Booking Page Close -->
</div>
<!-- Main Content Close -->
