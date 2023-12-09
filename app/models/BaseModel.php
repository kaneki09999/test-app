<?php
namespace App\Models;

class BaseModel{

    private $request;
    // order by
    // group by
    // where
    // join
    // union
    // in array
    // query

    public function orderBy(){
    }

    public function where(){

    }

    public function groupBy(){

    }
    
    public function join(){

    }

    public function union(){

    }
    
    public function query(){

    }
    public function jsonResponse($params){
        header('Content-Type: application/json');               // application type is json
        $response = json_encode($params, JSON_PRETTY_PRINT);    // turn into json format
        
        return $response;   // e.g Output: { "result": 300,"status": "success"}
    }
}