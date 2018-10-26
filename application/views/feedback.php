    

<div class="rh section-booking">
 <section class="rh rh-100 rh-our-history">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="rh-section-title">
          <h2>Feedback</h2>
          <p>Mohon diisi sesuai dengan kenyataan</p>
        </div>
      </div>
      <div class="col-md-12">
        <div class="rh rh-feature-box">
          <form method="POST" action="<?php echo base_url()?>frontend/save_feedback" enctype="multipart/form-data">
            <div class="feature-detail">
              <div class="col-md-6 col-md-offset-3">
                <input type="email"  name="email" class="form-control" placeholder="Masukan alamat email anda" required="required">
              </div>
              <div class="col-md-6 col-md-offset-3">
                <?php 
                $kdd='FED';
                $date=date('dmy');
                $num=rand(0,999);
                $gkd=$kdd.$date.$num;
                $no=0; 
                foreach($data->result_array() as $i) : $no++; 
                  ?>
                  <div class="form-group">
                    <hr>
                    <h5><?php echo $i['kuisioner_pertanyaan']; ?></h5>
                    <input type="hidden" value="<?php echo $gkd; ?>" name="gkd">
                    <input type="hidden" value="<?php echo $i['kuisioner_id']; ?>" name="kuisioner_id<?php echo $no;?>">
                    <input type="radio" value="Ya" name="jawaban<?php echo $no ;?>"> Ya<br>
                    <input type="radio" value="Tidak" name="jawaban<?php echo $no; ?>"> Tidak<br>
                  </div>
                <?php endforeach; ?>
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
</section>
</div>

