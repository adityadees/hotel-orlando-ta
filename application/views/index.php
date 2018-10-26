<section class="rh-banner">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php   $no=0;  foreach ($slide->result_array() as $kk) :    ?>
            <li data-target="#myCarousel" data-slide-to="<?php echo $no++; ?>" class="<?php if($no=='1'){echo "active"; } else {} ?>"></li>
        <?php endforeach; ?>
    </ol>

    <div class="carousel-inner">
        <?php  $no=0; foreach ($slide->result_array() as $i) :     $no++; ?>
        <div class="item <?php if($no=='1'){echo "active"; } else {} ?>">
            <img src="<?php echo base_url().'assets/images/'.$i['slide_gambar'];?>" alt="<?php echo $i['slide_id']; ?>">
            <div class="rh rh-banner-widgets">
                <div class="container">
                    <div class="row">
                        <div class="rh-banner flex">
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <h1><?php echo $i['slide_judul']; ?></h1>
                                <span class="rh-price"><?php echo $i['slide_ket']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</div>
</section>

<div class="rh">

    <section class="rh rh-100 rh-featured-rooms">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="rh-section-title">
                        <h2>Featured Rooms</h2>
                        <p>Nimkati promo yang berlaku dan pilih sesuai dengan yang anda inginkan</p>
                    </div>
                </div>
                <?php foreach($promo->result_array() as $i) :?>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 rh-mf-30">
                        <div class="rh rh-feature-box">
                            <div class="rh-img">
                                <img src="<?php echo base_url().'assets/images/'.$i['tipe_gambar'];?>" alt="feature_1" />
                                <a href="<?php echo base_url().'Room/detail/'.$i['tipe_kode'];?>"></a>
                            </div>
                            <div class="feature-detail">
                                <h4><a href="<?php echo base_url().'Room/detail/'.$i['tipe_kode'];?>"><?php echo $i['tipe_nama']; ?></a></h4>

                                <div class="rh">
                                    <p>Minimal Penginapan: <?php echo $i['promo_min_hari']." Hari"; ?></p>
                                    <p>Diskon: <?php echo $i['promo_diskon']." %"; ?></p>
                                    <p>Promo berlaku:<?php echo date('d-m-Y',strtotime($i['promo_start']))." - ".date('d-m-Y',strtotime($i['promo_end'])); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>

    <section class="rh rh-100 rh-your-stay">
        <div class="container-fluid">
            <div class="row rh-margin-o">
                <div class="col-lg-4 col-md-12 half-left">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="rh-left">
                                    <h2>Our Available Room</h2>
                                    <p>Enjoy your stay with our quality room and price<br>Grand Opening! Pesan 7 Hari dapatkan bonus gratis menginap selama 3 hari</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 half-right">
                    <div class="row">
                        <div class="rh rh-right">
                          <?php foreach ($tipe->result_array() as $i) : ?>
                            <div class="col-md-6 col-sm-6 col-xs-12 rh-mf-30" style="margin-bottom:30px;">
                                <div class="stay-box">
                                    <img src="<?php echo base_url().'assets/images/'.$i['tipe_gambar'];?>" alt="your-stay1" />
                                    <a href="single-rooms.html"></a>
                                    <div class="overley">
                                        <div class="stay-detail">
                                            <h5><?php echo $i['tipe_nama']; ?></h5>
                                            <span><?php echo "Rp. ".number_format($i['tipe_harga']); ?> / malam</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="rh rh-100 rh-our-services">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-md-12">
                <div class="rh-section-title">
                    <h2>Our Services</h2>
                    <p> Deskripsi services</p>
                </div>
            </div>

            <div class="col-lg-12 col-md-12">
                <div id="tabs-container" class="rh rh-tab-section">
                    <ul class="tabs-menu">

                        <?php  $no=0; foreach ($kategori->result_array() as $i) : 
                        $no++;  ?>
                        <li class="current"><a href="#tab-<?php echo $no; ?>"><i class="fa fa-cutlery" aria-hidden="true"></i><h5><?php echo $i['kategori_nama']; ?></h5></a></li>
                    <?php endforeach; ?>
                </ul>
                <div class="tab">

                    <?php  $no=0; foreach ($kategori->result_array() as $i) : 
                    $no++;  ?>
                    <div id="tab-<?php echo $no;?>" class="tab-content">
                        <div class="tab-content-img">
                            <img src="<?php echo base_url().'assets/images/'.$i['kategori_gambar'];?>" alt="our-serivesc-restorant" />
                        </div>
                        <div class="tab-content-detail">
                            <h2><?php echo $i['kategori_nama']; ?></h2>
                            <p><?php echo $i['kategori_ket']; ?></p>
                            <!-- <div class="tab-content-btm">
                                <h6 class="pull-left">Services Hours : 19.00 - 22.00</h6>
                                <h6 class="pull-right">Services Charge : $15</h6>
                            </div>-->
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>
</div>
</section>

</div>
