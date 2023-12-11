<?php
namespace App\Models;

use Config\Database;
use PDO;

class BaseModel extends Database{

    private $request;
    // order by
    // group by
    // where
    // join
    // union
    // in array
    // query
    
    // Fetch All Columns
    public function get_all($table){
        $sql = "SELECT * FROM ".$table;
        $stmt = parent::connect()->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // get_where($this->tbl_name, array('id' => $id)); 
    // public function get_where(array $param){

    //     // Use a prepared statement to prevent SQL injection

    //     $result = array();
    //     foreach ($param as $key) {
    //         $result[] = $key .' = :'.$key;
    //     }
    //     $imp = implode(' and ',$result);
    //     $sql = "SELECT * FROM ".$this->table." WHERE".$imp;

    //     $stmt = $this->conn->prepare($sql);

    //     foreach ($param as $field => $value) {
    //         $stmt->bindParam(':'.$field, $value, PDO::PARAM_INT);
    //     }
    //     // $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        
    //     $stmt->execute();
    //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     return $this->jsonResponse($result);
    // }

    public function order_by(){
    }

    public function group_by(){

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

    public function parseRequest(){
        $data = file_get_contents('php://input');
        $this->request = json_decode($data, true);

        return $this->request;
    }

}