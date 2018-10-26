<?php 
$gtipe=$data->row_array();
?>
<section class="rh-detail-bg" style="background: url('<?php echo base_url().'assets/images/'.$gtipe['tipe_gambar'];?>');       background-repeat: no-repeat;background-size:cover; ">
    <div class="container">
        <div class="row">
            <div class="rh-detail-widgets">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 rh-de-12">
                    <h2><a href="javascript:;"><?php echo $gtipe['tipe_nama']; ?></a></h2>

                    <div class="rh detail-right">
                        <p>Start From</p>
                        <h3><?php echo "Rp. ".number_format($gtipe['tipe_harga']); ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="rh rh-100">        
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-12">
                <div class="rh-detail-left">
                    <div class="regular slider">
                       <?php  foreach ($gambar->result_array() as $i) :   ?>
                        <div><img src="<?php echo base_url().'assets/images/'.$i['gambar_file'];?>" alt="<?php echo $i['gambar_id']; ?>" /></div>
                    <?php endforeach; ?>

                </div>

                <div class="rh-about-hotel rh">
                    <h4>About <?php echo $gtipe['tipe_nama']; ?> Room</h4>
                    <p><?php echo $gtipe['tipe_deskripsi']; ?></p>

                </div>

                <div class="rh-about-hotel rh rh-rsf">
                    <h4>Services and Facilities</h4>
                    <?php 
                    $uu=$gtipe['tipe_fasilitas'];
                    $ccd=explode(",",$uu);
                    foreach ($fasilitas->result_array() as $j ) : 
                        ?>
                        <ul class="rh-ul-30">

                            <?php if(in_array($j['fasilitas_id'],$ccd))
                            {
                                ?>
                                <li><i class="fa fa-check" aria-hidden="true"></i><p><?php echo $j['fasilitas_nama']; ?></p></li>
                                <?php 
                            } else {?>
                                <li class="red"><i class="fa fa-times" aria-hidden="true"></i><p><?php echo $j['fasilitas_nama']; ?></p></li>
                            <?php } ?>
                        </ul>
                    <?php endforeach; ?> 
                </div>

            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="rh-detail-right">

                <div class="row rh-flex">

                    <div class="col-md-12 col-sm-6 col-xs-6 col-sxs-12">
                        <div class="rh-need-help">
                            <h5>Need Royal Help?</h5>
                            <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                            <a href="tel:+919173495648">917 349 5648</a>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-6 col-xs-6 col-sxs-12">
                        <div class="rh-reservation">
                            <h5>Why Book with us?</h5>
                            <ul class="wbws">
                                <li>
                                    <i class="fa fa-building-o" aria-hidden="true"></i>
                                    <div class="why-book-list">
                                        <span><a href="javascript:;">176,00+ Hotels</a></span>
                                        <p>Nunc cursus libero pur congue arut nimspnty.</p>
                                    </div>
                                </li>
                                <li>
                                    <i class="fa fa-life-ring" aria-hidden="true"></i>
                                    <div class="why-book-list">
                                        <span><a href="javascript:;">Low Rates & Savings</a></span>
                                        <p>Nunc cursus libero pur congue arut nimspnty.</p>
                                    </div>
                                </li>
                                <li>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <div class="why-book-list">
                                        <span><a href="javascript:;">Excellent Support</a></span>
                                        <p>Nunc cursus libero pur congue arut nimspnty.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
