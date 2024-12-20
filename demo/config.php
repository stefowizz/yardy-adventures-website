<?php

/**
 * Database configuration 
 **/
$dbconfig = [
    'server' => 'localhost',
    'user' => 'root',
    'dbname' => 'yardyadventures',
    'dbpass' => '',
    'charset' => 'utf8mb4'
    ];


/**
 * Absolute paths for Pithhub directories. 
*/
if (! defined('MAINPATH') ) {
    define('MAINPATH', __DIR__ . '/');
}

define('SYSTEMS', MAINPATH."system/");
define('ASSETS', SYSTEMS."assets/");
define('CLASSES', SYSTEMS."classes/");
define('CONTROLLER', MAINPATH."controller/");
define('MODEL', MAINPATH."model/");
define('VIEWS', MAINPATH."view/");
define('LIBRARY', SYSTEMS."libs/");

/**
 * defined URLs 
**/

define('BASE_URL_SSL', 'https://'.$_SERVER['SERVER_NAME'].'/demo/');
define('LOAD_ASSETS', BASE_URL_SSL."public/");
