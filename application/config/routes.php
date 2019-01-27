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
$route['default_controller'] = 'auth';

$route['dashboard'] = 'ptgs_c/index';

$route['ta'] = 'ptgs_c/th_ajar';
$route['modal'] = 'ptgs_c/modal';
$route['tambah_ta'] = 'ptgs_c/tambah_ta';
$route['simpan_ta'] = 'ptgs_c/ubah_ta';
$route['hapus_ta/(:any)'] = 'ptgs_c/hapus_ta/$1';

$route['kurikulum'] = 'ptgs_c/mk_amikom';
$route['tambah_mk'] = 'ptgs_c/tambah_mk_am';
$route['ubah_mk'] = 'ptgs_c/ubah_mk_am';
$route['hapus_mk/(:any)'] = 'ptgs_c/hapus_mk_am/$1';

$route['ahp'] = 'ptgs_c/ahp_list';
$route['simpan_kriteria'] = 'ptgs_c/simpan_kriteria';


$route['rules'] = 'ptgs_c/rules';

$route['mahasiswa'] = 'mhs_c';
$route['data_mhs'] = 'ptgs_c/mahasiswa';
$route['hapus_mhs/(:any)'] = 'ptgs_c/hapus_mhs/$1';
$route['ubah_mhs/(:any)'] = 'ptgs_c/ubah_mhs/$1';

$route['transkrip/(:any)'] = 'ptgs_c/transkrip/$1';

$route['save_rps'] = 'mhs_c/update_rps';
$route['acc'] = 'mhs_c/acc_konv';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
