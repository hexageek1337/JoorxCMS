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
$route['login'] = 'login';
$route['login/aksi_login'] = 'login/aksi_login';
$route['logout'] = 'logout';
// Routes Admin
$route['admin'] = 'admin';
$route['admin/berita'] = 'admin/berita';
$route['admin/berita/(:num)'] = 'admin/berita/$1';
$route['admin/detail/(:num)'] = 'admin/detail/$1';
$route['admin/hapus/(:num)'] = 'admin/hapus/$1';
$route['admin/form/(:any)'] = 'admin/form/$1';
$route['admin/form/(:any)/(:num)'] = 'admin/form/$1/$2';
// Routes Member
$route['member'] = 'member';
$route['member/berita'] = 'member/berita';
$route['member/berita/(:num)'] = 'member/berita/$1';
$route['member/detail/(:num)'] = 'member/detail/$1';
$route['member/hapus/(:num)'] = 'member/hapus/$1';
$route['member/form/(:any)'] = 'member/form/$1';
$route['member/form/(:any)/(:num)'] = 'member/form/$1/$2';
// Routes User Setting for Admin Role
$route['user'] = 'user';
$route['user/(:num)'] = 'user/$1';
$route['user/detail/(:num)'] = 'user/detail/$1';
$route['user/hapus/(:num)'] = 'user/hapus/$1';
$route['user/form/(:any)'] = 'user/form/$1';
$route['user/form/(:any)/(:num)'] = 'user/form/$1/$2';
$route['user/index/(:num)'] = 'user/index/$2';
// Routes Blog
$route['blog'] = 'blog';
$route['blog/(:any)'] = 'blog/view/$1';
$route['blog/tag/(:any)/(:num)'] = 'blog/tag/$1/$2';
$route['blog/index/(:num)'] = 'blog/index/$1';
// Routes Page Statis
$route['default_controller'] = 'joorx/view';
$route['(:any)'] = 'joorx/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
