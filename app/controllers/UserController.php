<?php
namespace App\Controllers;

use App\Models\UserModel;

class UserController extends UserModel{

    private $request;

    public function __construct(){
        $this->request = parent::parseRequest();
    }

    public function getUsers(){

        $query = $this->show();
        
        $response = array(
          'status' => 'success',
          'result' => $query  
        );
        return $this->jsonResponse($response);
    }

    public function create(){
        
    }


    public function edit(){

    }

    public function updte(){

    }

}   
