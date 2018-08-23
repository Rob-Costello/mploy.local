<?php

define('DEVELOPER', getenv("DEVELOPER"));

if( DEVELOPER != '' ) {


	switch (DEVELOPER) {

		case 'Rob':
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

			break;

	}
}




