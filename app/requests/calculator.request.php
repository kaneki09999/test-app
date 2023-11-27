<?php

// For Strict Typing
declare(strict_types = 1);

// // Load the File
require_once dirname(__DIR__).'/controllers/calculator.php';


// REQUEST HTTP POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
        // Set requested Data
        $data = array(
            'operator'      => $_POST['operator'],
            'first_number'  => (int)$_POST['first_number'], // type casting means 
            'second_number' => (int)$_POST['second_number'], // it will convert the string into integers by using (int) 
        );
        

        // Call the Class
        $obj = new Calculator();
        
        // Catch Error
        try {
            echo $obj->operations($data); // used the method
        } catch (TypeError $e) {
            echo $obj::getErrorResponse() . " " . $e->getMessage();
        }
}


