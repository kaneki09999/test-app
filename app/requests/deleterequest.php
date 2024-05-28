<?php

// For Strict Typing
declare(strict_types = 1);

// // Load the File
require dirname(__DIR__).'/../vendor/autoload.php';

// namespace alias/import
use App\Controllers\deletecontroller;

// Call the Class
$obj = new deletecontroller();

// REQUEST HTTP POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $id = $_POST['id'];

           $obj->operations($id); // used the method
            

        header("Location: http://localhost/OOP/Public/index.php");

        
}


