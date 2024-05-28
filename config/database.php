<?php
namespace Config;

use PDO;
use PDOException;

class Database{

    private array $creds = [
        'host'          => 'localhost',
        'username'      => 'root',
        'password'      => '',
        'database_name' => 'sample'
    ];

    public function connect(){
        // DataSource Name
        $dsn = 'mysql:host='.$this->creds['host'].';dbname='.$this->creds['database_name'];
        
        try {
            // PDO Connection
            $pdo = new PDO(
                $dsn,
                $this->creds['username'],
                $this->creds['password']
            );

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            return $pdo; 
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }
}
?>
