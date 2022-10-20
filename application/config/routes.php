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

//AUTH ROUTE
$route['kaji-admin-login'] = 'admin/AuthController';
$route['kaji-admin-login/login'] = 'admin/AuthController/login';
$route['kaji-admin-login/logout'] = 'admin/AuthController/logout';
//END AUTH

//DASHBOARD ROUTE
$route['kaji-admin-login/dashboard'] = 'admin/DashboardController';
//END DASHBOARD ROUTE


//MANAGE JENIS PRODUCT
$route['kaji-admin-login/jenis-product'] = 'admin/JenisProductController';
$route['kaji-admin-login/simpan-jenis-product'] = 'admin/JenisProductController/simpan_jenis';
$route['kaji-admin-login/ubah-jenis-product'] = 'admin/JenisProductController/ubah_jenis';
$route['kaji-admin-login/hapus-jenis-product'] = 'admin/JenisProductController/hapus_jenis';
//END JENIS PRODUCT

//MANAGE PRODUCT
$route['kaji-admin-login/product'] = 'admin/ProductController';
$route['kaji-admin-login/simpan-product'] = 'admin/ProductController/insertProduct';
$route['kaji-admin-login/ubah-product'] = 'admin/ProductController/updateProduct';
$route['kaji-admin-login/hapus-product'] = 'admin/ProductController/hapusProduct';
//END PRODUCT

//MANAGE PROFILE
$route['kaji-admin-login/profile'] = 'admin/ProfileController';
$route['kaji-admin-login/update'] = 'admin/ProfileController/updateData';
$route['kaji-admin-login/logo'] = 'admin/ProfileController/updateLogo';
//END PROFILE

//MANAGE KARYAWAN
$route['kaji-admin-login/karyawan'] = 'admin/KaryawanController';
$route['kaji-admin-login/tambah-karyawan'] = 'admin/KaryawanController/simpanKaryawan';
$route['kaji-admin-login/edit-karyawan'] = 'admin/KaryawanController/updateKaryawan';
$route['kaji-admin-login/hapus-karyawan'] = 'admin/KaryawanController/hapus_karyawan';
//END KARYAWAN

//Client Side 
$route['default_controller'] = 'Home_controller';
$route['product_controller'] = 'Product_controller/index';
$route['contact'] = 'Home_controller/contact';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
