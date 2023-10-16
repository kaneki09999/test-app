<?php

// For Strict Typing
declare(strict_types = 1);

// Load the File
$replaceAppDirectory = str_replace('app','config',dirname(__DIR__));  // Replace the 'app' directory to 'config'
$path = $replaceAppDirectory."/auto_class_loader.php";              // concatenate,  final output: C:\xampp\htdocs\OOP\config\auto_class_loader.php
require_once $path;           // Dynamic Path
// Load the File


// include '../../controllers/calculator.php'; // working perfectly, Please ignore


// REQUEST HTTP POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
        // Set requested Data
        $request = array(
            'operator'      => $_POST['operator'],
            'first_number'  => (int)$_POST['first_number'], // type casting means 
            'second_number' => (int)$_POST['second_number'], // it will convert string into integers by using (int) 
        );

        // Call the Class
        $obj = new Calculator();
        
        // Catch Error
        try {
            echo $obj->calculator($request); // used the method
        } catch (TypeError $e) {
            echo $obj::getErrorResponse() . " " . $e->getMessage();
        }
}