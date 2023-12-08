<?php
namespace App\Models;

require_once dirname(__DIR__).'/../vendor/autoload.php';

use Config\Database;
use PDO;

class UserModel extends Database{
    
    public function getUsers(){
        $result = [];

        $sql = 'SELECT * FROM users';
        $stmt = parent::connect()->query($sql);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // while ($row = $stmt->fetch()) {
        //    $result[] = $row;
        // }

        return $this->jsonResponse($result);
        
    }

    public function jsonResponse($params){
        header('Content-Type: application/json');               // application type is json
        $response = json_encode($params, JSON_PRETTY_PRINT);    // turn into json format
        
        return $response;   // e.g Output: { "result": 300,"status": "success"}
    }

    public function parseRequest(){
        // $data = file_get_contents('php://input');
        // $this->request = json_decode($data, true);

        // return $this->request;
    }


}

$obj = new UserModel();
print_r($obj->getUsers());
