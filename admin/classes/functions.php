<?php 

function classAutoLoader($class) {
    
    $class = strtolower($class);
    $the_path = "inc/{$class}.php";

    if(is_file($the_path) && !class_exists($class)) {
        include $the_path;
    } else {
        die("The file named {$class}.php was not found.");
    }

}

function redirect($location) {
    header("Location: {$location}");
}

spl_autoload_register('classAutoLoader');

?>