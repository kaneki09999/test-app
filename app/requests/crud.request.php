<?php
declare(strict_types = 1);

require_once dirname(__DIR__).'/../vendor/autoload.php';

use App\Models\UserModel;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data = array(
        'name'          => '',
        'email'         => '',
        'contact_no'    => ''        
    );    

    $obj = new UserModel();
    
}