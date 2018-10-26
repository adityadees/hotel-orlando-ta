<?php

if(isset($_SESSION['logged_in'])){
  $userid=$_SESSION['user_nik'];
  $gcusr=$this->m_padmin->get_user($userid);
  $cgusr=$gcusr->row_array();
}
?>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo base_url()?>padmin" class="site_title"><i class="fa fa-star"></i> <span>Admin Panel</span></a>
          </div>
          <div class="clearfix"></div>
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="<?php echo base_url().'assets/images/'.$cgusr['user_foto'];?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?php echo $cgusr['user_username']; ?></h2>
            </div>
          </div>
          <br />
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a href="<?php echo base_url(); ?>padmin"><i class="fa fa-home"></i>Home</a> </li>
                <li><a href="<?php echo base_url(); ?>slide"><i class="fa fa-sliders"></i>Slide</a> </li>
                <li><a href="<?php echo base_url(); ?>promo"><i class="fa fa-tag"></i>Promo</a> </li>
                <li><a><i class="fa fa-question"></i>Feedback<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo base_url();?>kuisioner">Kuisioner</a> </li>
                    <li><a href="<?php echo base_url();?>kuisioner/feedback">Feedback</a> </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-book"></i>Reservation<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo base_url();?>check">Checkin / Checkout</a> </li>
                    <li><a href="<?php echo base_url();?>booking">Data Booking</a> </li>
                    <li><a href="<?php echo base_url();?>customer">Data Customer</a> </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-bed"></i>Kamar<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo base_url();?>kamar"><i class="fa fa-newspaper-o"></i>Data Kamar</a> </li>
                    <li><a href="<?php echo base_url();?>tipe"><i class="fa fa-newspaper-o"></i>Tipe Kamar</a> </li>
                    <li><a href="<?php echo base_url();?>fasilitas"><i class="fa fa-newspaper-o"></i>Data Fasilitas</a> </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-cogs"></i>Layanan<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo base_url();?>layanan"></i>Data Layanan</a> </li>
                    <li><a href="<?php echo base_url();?>kategori"></i>Kategori Layanan</a> </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-database"></i>Modul<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo base_url();?>user">User Management</a> </li>
                  </ul>
                </li>
                <?php /* <li><a href="<?php  echo base_url();?>laporan "><i class="fa fa-newspaper-o"></i>Laporan</a> </li> */ ?>
              </ul>
            </div>

          </div>
        </div>
      </div>