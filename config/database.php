<?php
namespace Config;

require_once dirname(__DIR__).'/vendor/autoload.php';

use App\Models\BaseModel;
use PDO;
use TypeError;

class Database extends BaseModel{

    private array $creds = [
        'host'          => 'localhost',
        'username'      => 'root',
        'password'      => '',
        'database_name' => 'oop'
    ];

    const DB_CONNECTION = [
        'SUCCESS'   => 'Connection Success',
        'FAILED'    => 'Connection Failed',
    ];

    protected function connect(){
        
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

// $obj = new Database();
// print_r($obj->connect());
