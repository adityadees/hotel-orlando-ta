<section class="rh-detail-bg list-view-column2">
    <div class="container">
        <div class="row">
            <div class="rh-detail-widgets ">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="rh text-center">
                        <h2>Rooms & Suits</h2>
                        <p>Captions line here</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="rh rh-100">

    <section class="sort-view-list select-list">  
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <div id="sort-by" class="sort-by">

                            <div class="col-md-12 col-sm-4 col-xs-5">
                                <div class="buttons pull-right">
                                    <button class="sort-by-grid"><i class="fa fa-th" aria-hidden="true"></i></button>
                                    <button class="sort-by-list current"><i class="fa fa-th-list" aria-hidden="true"></i></button>
                                </div>
                            </div>

                            <div id="grid_list" class="sort-by-list">
                                <div class="rh-flex">
                                   <?php  foreach ($data->result_array() as $i) : ?>
                                       <div class="col-md-6 col-sm-6 col-xs-6 xs-pr">
                                        <div class="rh rh-feature-box rh-margin-30">
                                            <div class="rh-img">
                                                <img src="<?php echo base_url().'assets/images/'.$i['tipe_gambar'];?>" alt="1" />
                                                <a href="<?php echo base_url().'Room/detail/'.$i['tipe_kode'];?>"></a>
                                            </div>
                                            <div class="feature-detail">
                                                <h4><a href="<?php echo base_url().'Room/detail/'.$i['tipe_kode'];?>"><?php echo $i['tipe_nama']; ?></a></h4>

                                                <div class="rh">
                                                    <p class="rh-top"><?php echo $i['tipe_deskripsi']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>

        </div>
    </div>
</section>

</div>

