<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
    'dsn'	=> '',
    'hostname' => 'localhost',
    'username' => '',
    'password' => '',
    'database' => '',
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

if ( file_exists( dirname( __FILE__ ) . '/developer-config.php' ) ) {

    //DEVELOPMENT SITE CONFIGURATION
    include_once( dirname( __FILE__ ) . '/developer-config.php' );

}

if ( file_exists( dirname( __FILE__ ) . '/master-config.php' ) ) {

    //MASTER SITE CONFIGURATION
    include_once( dirname( __FILE__ )  . '/master-config.php' );

}

$db['default']['username'] = DB_USER;
$db['default']['password'] = DB_PASSWORD;
$db['default']['database'] = DB_NAME;
if (strpos(DB_HOST, ':') !== false) {
    list($host, $port) = explode(":", DB_HOST);
    $db['default']['hostname'] = $host;
    $db['default']['port'] = $port;
} else {
    $db['default']['hostname'] = DB_HOST;
}