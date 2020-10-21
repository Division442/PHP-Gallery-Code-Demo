<?php

// /Applications/MAMP/htdocs/udemy-php-oop/gallery
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'Applications' . DS . 'MAMP'  . DS .  'htdocs'  . DS .  'udemy-php-oop'  . DS .  'gallery' );
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');


// TODO: Move all classes into their own folder and update the paths.
require_once('functions.php');
require_once('new_config.php');
require_once('database.php');
require_once('user.php');
require_once('session.php');
require_once('db_object.php');
require_once('photo.php');

?>