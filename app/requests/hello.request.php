<?php

// Load the File
$replaceAppDirectory = str_replace('app','config',dirname(__DIR__));  // Replace the 'app' directory to 'config'
$path = $replaceAppDirectory."/auto_class_loader.php";              // concatenate,  final output: C:\xampp\htdocs\OOP\config\auto_class_loader.php
require_once $path;           // Dynamic Path
// Load the File


$obj = new Calculator();


echo $obj::getErrorResponse();