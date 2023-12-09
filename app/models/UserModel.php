<?php
namespace App\Models;

use Config\Database;
use PDO;

class UserModel extends Database{
    
    public function getUsers(){
        
        // $result = [];

        $sql = 'SELECT * FROM users';
        $stmt = $this->connect()->query($sql);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // while ($row = $stmt->fetch()) {
        //    $result[] = $row;
        // }
        return $this->jsonResponse($result);

    }

}

$obj = new UserModel();
print_r($obj->getUsers());
