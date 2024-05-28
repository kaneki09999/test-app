<?php

// For Strict Typing
declare(strict_types = 1);

// // Load the File
require dirname(__DIR__).'/../vendor/autoload.php';

// namespace alias/import
use App\Controllers\updatecontroller;

// Call the Class
$obj = new updatecontroller();

// REQUEST HTTP POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $id = $_POST['id'];

        try {
            // data to be updated
            $param = [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'age' => $_POST['age'],
                'email' => $_POST['email'],
                'address' => $_POST['address'],
                'contact' => $_POST['contact'],
            ];



            // var_dump($data);
           $obj->operations($param, $id); // used the method
            
            echo $obj->answer();

            header('Location: http://localhost/OOP/Public/index.php');

            exit;

           

            // echo CalculatorController::query(500);
        } catch (TypeError $e) {
            echo $obj::getErrorResponse() . " " . $e->getMessage();
        }

        
}


