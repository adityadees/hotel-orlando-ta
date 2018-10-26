 <?php $booking_kode=$this->uri->segment(3); ?>
<div class="rh rh-100 section-booking">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-wizard">

        <fieldset>
            <div class="rh-reservation-complate">
                <h4>THANK YOU</h4><br>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                            <span>YOUR INVOICE #<?php echo $booking_kode; ?></span><br>
                            <span>Silahkan download invoice anda</span><br>
                           <a href="<?php echo base_url().'Booking/invoice/'.$booking_kode?>" class="btn btn-primary" target="_blank">Download</a>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>


</div>
</div>
</div>
</div>
