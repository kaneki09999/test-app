<?php
namespace App\Routes;



// routes/routes.php

use App\Controllers\CalculatorController;
use App\Controllers\UserController;

// if (isset($_GET['action'])) {
//     $action = $_GET['action'];
           // http://localhost/OOP/index.php?action=ping
//     // Define your routes here
//     if ($action === 'ping') {
//         require_once '../App/Controllers/UserController.php';
//         $controller = new UserController();
//         $controller->ping();
//     }
//     // Add more routes as needed
// }


if ($_SERVER['REQUEST_URI'] === '/OOP/User/test') {
    require_once '../App/Controllers/UserController.php';

    $controller = new UserController();
    print_r($controller->test());
}

if ($_SERVER['REQUEST_URI'] === '/OOP/Calculator/test') {
    require_once '../App/Controllers/CalculatorController.php';

    $controller = new CalculatorController();
    print_r($controller->test());
}