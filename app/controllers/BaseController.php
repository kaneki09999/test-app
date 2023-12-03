<?php
namespace App\Controllers;

class BaseController{

    private $request;

    // Set Json Response 
    public function jsonResponse($params){
        header('Content-Type: application/json');               // application type is json
        $response = json_encode($params, JSON_PRETTY_PRINT);    // turn into json format
        
        return $response;   // e.g Output: { "result": 300,"status": "success"}
    }

    public function parseRequest(){
        $data = file_get_contents('php://input');
        $this->request = json_decode($data, true);

        return $this->request;
    }

    public function ping() {
        date_default_timezone_set('Asia/Manila');
        $timeStamp = time();
        
        return $timeStamp;
    }


}