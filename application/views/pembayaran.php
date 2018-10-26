<div class="rh section-booking">
   <section class="rh rh-100 rh-our-history">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="rh-about-title">
                    <h2>Cara Pembayaran</h2>
                    <p>
                        <ul>
                            <li>Silahkan melakukan pembayaran pada salah satu bank yang tertera di daftar.</li> 
                            <li>Kemudian silahkan upload bukti pembayaran dan masukan kode invoice anda sesuai dengan yang sudah tertera pada saat melakukan booking</li>
                        </ul>
                        <span class="text-danger">*Jangan lupa untuk menyimpan struk pembayaran untuk mencegah hal - hal yang tidak diinginkan.</span>
                    </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="rh-history-list">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        <div class="panel panel-default">
                            <div class="side-tab" data-target="#tab1" data-toggle="tab" role="tab" aria-expanded="false">
                                <div class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h4 class="panel-title">BCA</h4>
                                </div>
                            </div>

                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    Nama Pemilik:
                                    <br>
                                    No. Rekening:
                                </div>
                            </div>
                        </div> 

                        <div class="panel panel-default">
                            <div class="side-tab" data-target="#tab2" data-toggle="tab" role="tab" aria-expanded="false">
                                <div class="panel-heading" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <h4 class="panel-title collapsed">BNI</h4>
                                </div>
                            </div>

                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    Nama Pemilik:
                                    <br>
                                    No. Rekening:
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="side-tab" data-target="#tab3" data-toggle="tab" role="tab" aria-expanded="false">
                                <div class="panel-heading" role="tab" id="headingThree"  class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <h4 class="panel-title">BRI</h4>
                                </div>
                            </div>

                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                              <div class="panel-body">
                               Nama Pemilik:
                               <br>
                               No. Rekening:
                           </div>
                       </div>
                   </div>

                   <div class="panel panel-default">
                    <div class="side-tab" data-target="#tab4" data-toggle="tab" role="tab" aria-expanded="false">
                        <div class="panel-heading" role="tab" id="headingfour"  class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                            <h4 class="panel-title">Mandiri</h4>
                        </div>
                    </div>

                    <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                      <div class="panel-body">
                         Nama Pemilik:
                         <br>
                         No. Rekening:
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>
</div>
</section>

<section class="rh rh-100 rh-about-services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="rh-section-title">
                    <h2>Upload Bukti Pembayaran</h2>
                    <p>Silahkan upload bukti pembayaran pada form dibawah ini</p>
                </div>
            </div>
            <div class="rh">
                <div>
                    <div class="col-md-12">
                        <div class="rh rh-feature-box">
                            <form method="POST" action="<?php echo base_url()?>frontend/save_pembayaran" enctype="multipart/form-data">
                                <div class="feature-detail">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="form-group">
                                            <h4 class="text-center">Invoice</h4>
                                            <input type="text" name="booking_kode" placeholder="Masukan code booking anda" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="form-group">
                                            <br>
                                            <h4 class="text-center">File</h4>
                                            <input type="file" name="filefoto" class="form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="form-group">
                                          <br> <input type="submit" value="submit" class="form-control btn btn-primary">
                                      </div>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

</div>

