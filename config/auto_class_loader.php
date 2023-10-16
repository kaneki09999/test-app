<?php

spl_autoload_register('myAutoLoader');

function myAutoLoader($class){

    if (strpos(__DIR__, 'config') == true) { 
        $replace = str_replace('config','',__DIR__);         // look for config directory and replace with null.
        $path = $replace.'app/controllers/';                // if root directory find 'config' folder it wiil go back  to parent directory
    }else{
        $path = 'app/controllers/';
    }

    $extension = '.php';
    $fullPath = $path.strtolower($class).$extension;        // Output C:\xampp\htdocs\OOP\app\controllers\{className}.php

    require_once $fullPath;
}



// spl_autoload_register('myAutoLoader');

// function myAutoLoader($class){

//     $root = 'app';
//     $subFolder = ['controllers', 'models', 'views'];
//     $file = 'test.php';

//     // Construct the possible file paths
//     $paths = [];
//     foreach ($subFolder as $folder) {
//         $paths[] = $root . '/' . $folder . '/' . $class . '.php';
//     }

//     // Check if the file exists and require it
//     foreach ($paths as $path) {
//         if (file_exists($path)) {
//             require_once $path;
//             return;
//         }
//     }
// }









