<?php

/**
 * Configuration for database settings
 *
 * @package     Database settings
 * @author      Blake Foss <blake@division442.com>
 * @version     1.0
 * @link        https://division442.com/gallery-demo
 */

if (ENV == 'dev') {
    // Database constants
    define('DB_HOST','php-gallery-mysql');
    define('DB_USER','root');
    define('DB_PASS','root');
    define('DB_NAME','php_gallery');
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

} else if (ENV == 'prod') {
    // Production demo database settings
    define('DB_HOST','localhost');
    define('DB_USER','divisio3_gallery_demo');
    define('DB_PASS','}W2pgD@62&n?');
    define('DB_NAME','divisio3_gallery_demo');
}

?>