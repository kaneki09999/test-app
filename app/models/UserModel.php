<?php
namespace App\Models;

use Config\Database;
use PDO;

class UserModel extends Database{
    
    private $conn;

    public function __construct(){
        $this->conn = parent::connect();
    }

    public function testConnection(){
        
        if ($this->conn) {
            $status = parent::DB_CONNECTION['SUCCESS'];
        }
        $response = array(
            'status' => $status,
        );
        
        return $this->jsonResponse($response);
    }

    public function getAllUsers(){
        
        // $result = [];

        $sql = 'SELECT * FROM users';
        $stmt = $this->connect()->query($sql);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // while ($row = $stmt->fetch()) {
        //    $result[] = $row;
        // }
        
        return $this->jsonResponse($result);

    }

    // public function getUser($param): string{
       
    //     $sql = "SELECT * FROM users where id = '$param'";
    //     $stmt = $this->connect()->query($sql);
    //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     return $this->jsonResponse($result);
    // }
    public function getUser($userId){
        // Use a prepared statement to prevent SQL injection
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $this->jsonResponse($result);
    }

    public function addUser(string $name, string $email, string $contact_no){
        /* Begin a transaction, turning off autocommit */
        $this->connect()->beginTransaction();

        $sql = "INSERT INTO users (name, email, contact_no) VALUES (:name, :email, :contact_no)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':contact_no', $contact_no);
        
        $result = [
            ':name' => $name,
            ':email' => $email,
            ':contact_no' => $contact_no,
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

