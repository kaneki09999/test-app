<?php
namespace App\Models;

use PDO;

// class UserModel extends Database{
    
class UserModel extends BaseModel{

    private string $table = 'users';

    // Fetch Users Data
    protected function show(){
        $query = $this->get_all($this->table);
        return $query;
    }

    
    protected function getRows(){
        // $sql = 'SELECT * FROM '.$this->table;
        // $stmt = $this->connect()->query($sql);

        // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // $query = parent::get_all($this->table);

        // return $query;
    }
        

    protected function getAllUsers(){
        
        // $result = [];

        $sql = 'SELECT * FROM '.$this->table;
        $stmt = $this->connect()->query($sql);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // while ($row = $stmt->fetch()) {
        //    $result[] = $row;
        // }
        
        return $result;
 

    }

    // public function getUser($param): string{
       
    //     $sql = "SELECT * FROM users where id = '$param'";
    //     $stmt = $this->connect()->query($sql);
    //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     return $this->jsonResponse($result);
    // }
    protected function getUser($userId){
        // Use a prepared statement to prevent SQL injection
        $sql = "SELECT * FROM ".$this->table." WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $this->jsonResponse($result);
    }

    public function fetchUser(array $param){
        // $query = parent::get_where($param);
        // return $this->jsonResponse($query);
    }



    protected function addUser(array $data){
        /* Begin a transaction, turning off autocommit */
        $this->connect()->beginTransaction();

        $sql = "INSERT INTO ".$this->table." (name, email, contact_no) VALUES (:name, :email, :contact_no)";
        $stmt = $this->connect()->prepare($sql);
        
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':contact_no', $data['contact_no']);
        
        $result = [
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':contact_no' => $data['contact_no'],
        ];
        $stmt->execute($result);

        $response = array(
            'status' => 'ok',
            'lastInsertedId' => $this->connect()->lastInsertId(),
        );

        /* Commit the changes */
        // $this->connect()->commit();
        
        return $this->jsonResponse($response);
    }
}

