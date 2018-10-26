<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['admin']='loginadmin';
$route['logout']='loginadmin/logout';
$route['promo']='padmin/promo';
$route['slide']='padmin/slide';
$route['check']='padmin/checkinout';
$route['booking']='padmin/booking';
$route['customer']='padmin/customer';
$route['kuisioner/feedback']='padmin/feedback';
$route['kamar']='padmin/kamar';
$route['tipe']='padmin/tipe';
$route['tipe/detail-tipe/(:any)']='padmin/detail_tipe/$1';
$route['fasilitas']='padmin/fasilitas';
$route['tipe-gallery']='padmin/tipe_gallery';
$route['layanan']='padmin/layanan';
$route['kategori']='padmin/kategori';
$route['user']='padmin/user';
$route['kuisioner']='padmin/kuisioner';
$route['config']='padmin/config';
$route['laporan']='padmin/laporan';
$route['Room']='frontend/room';
$route['Feedback']='frontend/feedback';
$route['About']='frontend/about';
$route['Contact']='frontend/contact';
$route['Pembayaran']='frontend/pembayaran';
$route['Room/detail/(:any)']='frontend/room_detail/$1';
$route['Booking']='frontend/booking';
$route['Booking/invoice/(:any)']='frontend/invoice/$1';
$route['Booking/thankyou/(:any)']='frontend/thankyou/$1';
$route['default_controller'] = 'frontend';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
