<?php 

/**
 * Checks that a class exists.
 * 
 * If not throws an error that the class was not found
 * 
 * @package     Functions
 * @author      Blake Foss <blake@division442.com>
 * @version     1.0
 * @link        https://division442.com/gallery-demo 
 * 
 * @param string $class
 * 
 */
function classAutoLoader($class) {
    
    $class = strtolower($class);
    $the_path = "inc/{$class}.php";

    if(is_file($the_path) && !class_exists($class)) {
        include $the_path;
    } else {
        die("The file named {$class}.php was not found.");
    }

}

/**
 * Simple function to reduce code for setting a redirect.
 */
function redirect($location) {
    header("Location: {$location}");
}

/**
 * Register the classAutoLoader function as autoload.
 */
spl_autoload_register('classAutoLoader');

?>