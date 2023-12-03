<?php

// For Strict Typing
declare(strict_types = 1);

// // Load the File
require dirname(__DIR__).'/../vendor/autoload.php';

// namespace alias/import
use App\Controllers\CalculatorController;

// Call the Class
$obj = new CalculatorController();

// REQUEST HTTP POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
        $data = array(
            'operator'      => isset($_POST['operator']) ? $_POST['operator']: $obj->request['operator'],
            'first_number'  => isset($_POST['first_number']) ? $_POST['first_number']: $obj->request['first_number'],
            'second_number' => isset($_POST['second_number']) ? $_POST['second_number']: $obj->request['second_number'],
        );

        // Catch Error
        try {
            echo $obj->operations($data); // used the method
            // echo CalculatorController::query(500);
        } catch (TypeError $e) {
            echo $obj::getErrorResponse() . " " . $e->getMessage();
        }
}


