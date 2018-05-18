<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//$route['schools/']
//$route['schools/(:any)'] = 'schools/index/$1';
$route['(:any)/(:num)'] = "$1/index/$2";
$route['(:any)/(:num)/(:num)'] = "$1/index/$2/$3";
$route['(:any)'] = "$1";
$route['auth'] = 'auth';
$route['customers/register']='auth/create_user';
$route['customers/edit/(:num)']='auth/edit_user/$1';

$route['schools'] = 'schools/index';


$route['posts'] = 'posts/index';
$route['default_controller'] = 'auth';
$route['404_override'] = '';
//$route['(:any)'] = 'pages/view/$1';
$route['translate_uri_dashes'] = FALSE;
