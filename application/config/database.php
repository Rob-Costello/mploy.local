<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;




/*if ( file_exists( dirname(( __FILE__ ) )  . '/developer-config.php' ) ) {
	//DEVELOPMENT SITE CONFIGURATION
	require_once( APPPATH.'config/developer-config.php' );
}*/
//else {

	$db['default'] = array(
		'dsn' => '',
		'hostname' => 'localhost',
		'username' => 'root',
		'password' => 'root',
		'database' => 'hyperext_mploy_crm_new',
		'dbdriver' => 'mysqli',
		'dbprefix' => '',
		'pconnect' => FALSE,
		'db_debug' => (ENVIRONMENT !== 'production'),
		'cache_on' => FALSE,
		'cachedir' => '',
		'char_set' => 'utf8',
		'dbcollat' => 'utf8_general_ci',
		'swap_pre' => '',
		'encrypt' => FALSE,
		'compress' => FALSE,
		'stricton' => FALSE,
		'failover' => array(),
		'save_queries' => TRUE
	);


//}
