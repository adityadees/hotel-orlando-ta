<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <!--[if lt IE 7]>  <html class="ie ie6 lte9 lte8 lte7"> <![endif]-->
    <!--[if IE 7]>     <html class="ie ie7 lte9 lte8 lte7"> <![endif]-->
    <!--[if IE 8]>     <html class="ie ie8 lte9 lte8"> <![endif]-->
    <!--[if IE 9]>     <html class="ie ie9 lte9"> <![endif]-->
    <!--[if gt IE 9]>  <html> <![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Royal Luxury Stay - Online Booking Smart Responsive HTML5 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Royal Luxury Stay - Online Booking Smart Responsive HTML5 Template">
    <meta name="keywords" content="accommodation,apartment,B&B,bed and breakfast,booking,hostel,inn,motel,reservation,reservation form,resort,responsive,spa,travel,bootstrap,cruise,flights,holiday,hotel,html5 template,online booking,real estate,rentals,tour,tourism,uber">

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url();?>assets/frontend/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>assets/frontend/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>assets/frontend/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url();?>assets/frontend/images/favicons/manifest.json">
    <link rel="mask-icon" href="<?php echo base_url();?>assets/frontend/images/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files ================================================== -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/bootstrap-select.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/jquery-ui-date.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/slick.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/color.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/style.css" />

</head>

<body>

    <header class="rh">
        <div class="rh-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-4">
                        <ul class="top">
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
                        <ul class="pull-right">
                            <li>
                               <a href="#"><i class="fa fa-facebook"> </i></a>
                           </li>
                           <li>
                             <a href="#"><i class="fa fa-twitter"> </i></a>
                         </li>
                         <li>
                             <a href="#"><i class="fa fa-google"></i></a>
                         </li>
                     </ul>
                 </div>
             </div>
         </div>
     </div>

     <p><?php echo $this->session->flashdata('msg');?></p>
     <nav class="rh navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/frontend/images/logo.png" alt="logo" /></a>
            </div>

            <div class="collapse navbar-collapse rh-toggle" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right main-navbar">
                    <li>
                        <a class="<?php echo show_current_class('index'); ?>" href="<?php echo base_url();?>">Home</a>
                    </li>
                    <li>
                        <a class="<?php echo show_current_class('room'); ?>" href="<?php echo base_url(); ?>Room">Available Rooms</a>
                    </li>
                    <li>
                        <a class="<?php echo show_current_class('booking'); ?>" href="<?php echo base_url()?>Booking">Booking</a>
                    </li>
                    <li><a class="<?php echo show_current_class('about'); ?>" href="<?php echo base_url()?>About">About</a></li>
                    <li><a class="<?php echo show_current_class('contact'); ?>" href="<?php echo base_url()?>Contact">Contact</a></li>
                    <li><a class="<?php echo show_current_class('pembayaran'); ?>" href="<?php echo base_url()?>Pembayaran">Pembayaran</a></li>
                    <li><a class="<?php echo show_current_class('feedback'); ?>" href="<?php echo base_url()?>Feedback">Feedback</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
