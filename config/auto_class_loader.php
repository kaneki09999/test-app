<?php

// spl_autoload_register('myAutoLoader');

// function myAutoLoader($class){

//     if (strpos(__DIR__, 'config') == true) { 
//         $replace = str_replace('config','',__DIR__);         // look for config directory and replace with null.
//         $path = $replace.'app/controllers/';                // if root directory find 'config' folder it wiil go back  to parent directory
//     }else{
//         $path = 'app/controllers/';
//     }

//     $extension = '.php';
//     $fullPath = $path.strtolower($class).$extension;        // Output C:\xampp\htdocs\OOP\app\controllers\{className}.php

//     require_once $fullPath;
// }


// class Autoloader
// {
//     public static function register()
//     {
//         spl_autoload_register([__CLASS__, 'autoload']);
//     }

//     public static function autoload($className)
//     {
//         // Convert namespace to file path
//         $filePath = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';

//         // Check if the file exists
//         if (file_exists($filePath)) {
//             include_once $filePath;
//         }
//     }
// }

// // Register the autoloader
// Autoloader::register();


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







require dirname(__DIR__).'/vendor/nette/robot-loader/src/RobotLoader/RobotLoader.php';

$loader = new Nette\Loaders\RobotLoader;

// Directories for RobotLoader to index (including subdirectories)
$loader->addDirectory(__DIR__ . '/app/controllers');
$loader->addDirectory(__DIR__ . '/libs');

// Set caching to the 'temp' directory
$loader->setTempDirectory(__DIR__ . '/temp');
$loader->register(); // Activate RobotLoader