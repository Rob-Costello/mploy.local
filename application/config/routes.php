<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//$route['customers/']
//$route['customers/(:any)'] = 'customers/index/$1';
$route['(:any)/(:num)'] = "$1/index/$2";
$route['(:any)/(:num)/(:num)'] = "$1/index/$2/$3";
$route['(:any)'] = "$1";
$route['auth'] = 'auth';
$route['users/register']='auth/create_user';
$route['users/edit/(:num)']='auth/edit_user/$1';
$route['Customers'] = 'customers/index';
$route['posts'] = 'posts/index';
$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
//$route['(:any)'] = 'pages/view/$1';
$route['translate_uri_dashes'] = FALSE;
