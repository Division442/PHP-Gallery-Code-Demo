<?php

// /Applications/MAMP/htdocs/udemy-php-oop/gallery
// Need to convert this from hard coded to functions to pull dynamically

// Local development settings
// defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
// defined("SITE_ROOT") ? null : define("SITE_ROOT", DS . "Applications" . DS . "MAMP"  . DS .  "htdocs"  . DS .  "udemy-php-oop"  . DS .  "gallery" );
// defined("INCLUDES_PATH") ? null : define("INCLUDES_PATH", SITE_ROOT.DS."admin".DS."inc");
// defined("CLASSES_PATH") ? null : define("CLASSES_PATH", SITE_ROOT.DS."admin".DS."classes");

// Production demo settings
///home/divisio3/public_html/gallery_demo
defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
defined("SITE_ROOT") ? null : define("SITE_ROOT", DS . "home" . DS . "divisio3"  . DS .  "public_html"  . DS .  "gallery_demo");
defined("INCLUDES_PATH") ? null : define("INCLUDES_PATH", SITE_ROOT.DS."admin".DS."inc");
defined("CLASSES_PATH") ? null : define("CLASSES_PATH", SITE_ROOT.DS."admin".DS."classes");

require_once(CLASSES_PATH.DS."functions.php");
require_once(CLASSES_PATH.DS."db_object.php");
require_once(CLASSES_PATH.DS."new_config.php");
require_once(CLASSES_PATH.DS."database.php");
require_once(CLASSES_PATH.DS."user.php");
require_once(CLASSES_PATH.DS."session.php");
require_once(CLASSES_PATH.DS."photo.php");
require_once(CLASSES_PATH.DS."comment.php");
require_once(CLASSES_PATH.DS."paginate.php");

?>