<?php

namespace App\Route;

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Controllers\UserController;
use App\Models\UserModel;

// Get the request URI path
// $requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// $pattern = '/\/OOP\/Models\/getUser\/(\d+)/';

// if (preg_match($pattern, $requestPath, $matches)) {
//     $userId = $matches[1];

//     require_once dirname(__DIR__) . '/App/Models/UserModel.php';
//     $obj = new UserModel();
//     $userData = $obj->getUser($userId);

//     print_r($userData);
// } else{
//     // // Handle invalid route
//     // header("HTTP/1.1 404 Not Found");
//     // echo "404 Not Found";
// }

if ($_SERVER['REQUEST_URI'] === '/OOP/Controllers/getUsers') {
    require_once dirname(__DIR__).'/App/Controllers/UserController.php';
    $obj = new UserController();
    print_r($obj->getUsers());
}

// if ($_SERVER['REQUEST_URI'] === '/OOP/Models/addUser') {
//     require_once dirname(__DIR__).'/App/Models/UserModel.php';
//     $obj = new UserModel();

//     $data = [
//         'name' => 'eduardo ermie',
//         'email' => 'eduardoermie@gmail.com',
//         'contact_no' => '09095547291'
//     ];

//     print_r($obj->addUser($data['name'], $data['email'], $data['contact_no']));
// }



