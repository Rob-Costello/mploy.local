<?php

define('DEVELOPER', getenv("DEVELOPER"));

if( DEVELOPER != '' ) {


	switch (DEVELOPER) {

        case 'Paul':
            define('DB_NAME', 'hyperext_mploy_crm');
            define('DB_USER', 'root');
            define('DB_PASSWORD', 'root');
            define('DB_HOST', 'localhost');
            break;

        case 'Rob':
            define('DB_NAME', 'hyperext_mploy_crm_new');
            define('DB_USER', 'root');
            define('DB_PASSWORD', 'root');
            define('DB_HOST', 'localhost');
            break;

	}
}




