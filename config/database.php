<?php
namespace Config;

use PDO;
use TypeError;

class Database{

    protected array $creds = [
        'host'          => 'localhost',
        'username'      => 'root',
        'password'      => '',
        'database_name' => 'oop'
    ];

    const DB_CONNECTION = [
        'SUCCESS'   => 'Connection Success',
        'FAILED'    => 'Connection Failed',
    ];

    protected function connection(){
        
        // DataSource Name
        $dsn = 'mysql:host='.$this->creds['host'].';dbname='.$this->creds['database_name'];
        
        // PDO COnnection
        $pdo = new PDO(
            $dsn,
            $this->creds['username'],
            $this->creds['password']
        );

        $pdo->setAttribute(
            PDO::ATTR_DEFAULT_FETCH_MODE, 
            PDO::FETCH_ASSOC
        );

        $response = $this->checkConnection($pdo);

        return $response;  
    }

    protected function checkConnection($param){
        try {
            if ($param) {
                $response = self::DB_CONNECTION['SUCCESS'];
            }
        } catch (TypeError $e) {
           $response = $e->getMessage();
        }

        return $response;
    }
}
