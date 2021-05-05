<?php

/**
 * The initialize variables and constants required to run site in either dev|production
 *
 * @package     Initialization
 * @author      Blake Foss <blake@division442.com>
 * @version     1.0
 * @link        https://division442.com/gallery-demo 
 */

/**
 * Set the applications configuration for directories and related
 * 
 * @return constant collection of settings specific to the plaform
 */ 
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// Set environment variables
if (strpos($url, 'localhost') == true) {
    define('ENV', 'dev');

    // Docker container development settings
    defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
    defined("SITE_ROOT") ? null : define("SITE_ROOT", DS . "var" . DS . "www"  . DS .  "html");
    defined("INCLUDES_PATH") ? null : define("INCLUDES_PATH", SITE_ROOT.DS."admin".DS."inc");
    defined("CLASSES_PATH") ? null : define("CLASSES_PATH", SITE_ROOT.DS."admin".DS."classes");
} else if (strpos($url, 'prod') == true) {
    // Production demo settings
    defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
    defined("SITE_ROOT") ? null : define("SITE_ROOT", DS . "home" . DS . "divisio3"  . DS .  "public_html"  . DS .  "gallery_demo");
    defined("INCLUDES_PATH") ? null : define("INCLUDES_PATH", SITE_ROOT.DS."admin".DS."inc");
    defined("CLASSES_PATH") ? null : define("CLASSES_PATH", SITE_ROOT.DS."admin".DS."classes");
} else if (strpos($url, 'stage') == true) {
    // No staging server - for demo purposes
}

/**
 * Set the application class includes
 * 
 */
require_once(CLASSES_PATH.DS."functions.php");
require_once(CLASSES_PATH.DS."db_object.php");
require_once(CLASSES_PATH.DS."config.php");
require_once(CLASSES_PATH.DS."database.php");
require_once(CLASSES_PATH.DS."user.php");
require_once(CLASSES_PATH.DS."session.php");
require_once(CLASSES_PATH.DS."photo.php");
require_once(CLASSES_PATH.DS."comment.php");
require_once(CLASSES_PATH.DS."paginate.php");

?>