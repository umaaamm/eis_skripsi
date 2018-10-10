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
$route['default_controller'] = 'ControllerUtama';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['KelolaAdmin'] ='ControllerAdmin';
$route['SimpanAdmin'] ='ControllerAdmin/simpan';
$route['HapusAdmin'] ='ControllerAdmin/hapus';
$route['KelolaSuplier'] ='ControllerSuplier';
$route['SimpanSuplier'] ='ControllerSuplier/simpan';
$route['KelolaSuplier'] ='ControllerSuplier';
$route['SimpanSuplier'] ='ControllerSuplier/simpan';
$route['KelolaDivisi'] ='ControllerBagian';
$route['SimpanDivisi'] ='ControllerBagian/simpan';
$route['KelolaBarangMasuk'] ='ControllerBarangMasuk';
$route['SimpanBarangMasuk'] ='ControllerBarangMasuk/simpan';
$route['KelolaAtk'] ='ControllerAtk';
$route['SimpanAtk'] ='ControllerAtk/simpan';
$route['KelolaPersediaan'] ='ControllerPersediaan';
$route['SimpanPersediaan'] ='ControllerPersediaan/simpan';
$route['KelolaBarangKeluar'] ='ControllerBarangKeluar';
$route['SimpanBarangKeluar'] ='ControllerBarangKeluar/simpan';
$route['KelolaPermintaan'] ='ControllerPermintaan';
$route['SimpanPermintaanBarang'] ='ControllerPermintaan/simpan';
$route['KelolaPermintaanBarangBaru'] ='ControllerPermintaanBarang';
$route['SimpanPermintaanBarangBaru'] ='ControllerPermintaanBarang/simpan';
$route['VerifAdmin'] ='ControllerVerif';
$route['VerifPimpinan'] ='ControllerVerif/pimpinan';
$route['Laporan'] ='ControllerLaporan';
$route['LaporanFilter'] ='ControllerLaporan/filter';
$route['Login'] = 'ControllerLogin';
$route['CekLogin'] = 'ControllerLogin/aksi_login';
$route['KelolaPermintaanUser'] ='ControllerPermintaan/user';