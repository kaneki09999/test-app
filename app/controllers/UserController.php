<?php
namespace App\Controllers;

require_once dirname(__DIR__) . '/../vendor/autoload.php';

class UserController extends BaseController{

    public function test(){

        $response = array(
            'result' => 'success',
            'timeStamp' => $this->ping(),
        );

        return $this->jsonResponse($response);

    }
}
