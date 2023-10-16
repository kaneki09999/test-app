<?php
declare(strict_types = 1 ); // Strict Typing


// Import file
require_once 'user.php';


Class Test extends User{

    // Properties
    private $firstName;
    private $lastName;
    public $husband    = "whyllard G Ermie";
    
    // Static Properties
    public static $work = "unemployed";

    // Idendifiers
    const PAYMENT_METHODS = ['Gcash','Paymaya', 'BPI'];


    // will load files when execute
    // public function __construct(string $firstName, string $lastName){   
    //     $this->firstName    = $firstName;
    //     $this->lastName     = $lastName;
    // }

    // method
    public function personalDetails(string $firstName){
        
        try {
            $result =  $firstName;
        } catch (TypeError $err) {
            $result = $err->getMessage();
        }
        return $result;
    }

    // method
    public function ping(){
        date_default_timezone_set('Asia/Manila');
        $timeStamp = time();
        return $timeStamp;
    }

    // public function setName(string $firstName, string $lastName){
    //     $this->firstName = $firstName;
    //     $this->lastName = $lastName;

    //     $data = array(
    //         "firstName" => $this->firstName,
    //         "lastName" => $this->lastName,
    //     );

    //     return json_encode($data, JSON_PRETTY_PRINT);
    // }
    
    
    public function setName($params){
        return json_encode($params, JSON_PRETTY_PRINT);
    }     


    // Static Method
    public static function setWork(string $params){
        self::$work = $params;
    }

    public static function getWork(){
        return self::$work;
    }

}
