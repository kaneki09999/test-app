<?php

class Calculator{

    // Properties
    public $operator;
    public $num1;
    public $num2;

    // Identifier
    const SUCCESS = 'success';

    // Initilize Object Properties
    // public function __construct(string $operator, int $num1, int $num2)
    // {
    //     $this->operator = $one;
    //     $this->num1     = $two;
    //     $this->num2     = $three;
    // }

    // Custom Method
    public function calculator($data){
        
        // Get Requested Data
        $this->operator     = $data['operator'];
        $this->num1         = $data['first_number'];
        $this->num2         = $data['second_number'];
     
        // Computation
        switch ($this->operator) {
            case 'addition':
                $result = $this->num1 + $this->num2;
                break;
            case 'subtraction':
                $result = $this->num1 - $this->num2;
                break;
            case 'multiplication':
                $result = $this->num1 * $this->num2;
                break;
            case 'division':
                $result = $this->num1 / $this->num2;
                break;
            default:
                $result = 'Invalid Operations';
                break;
        }


        $response = array(
            'result'    => $result,
            'status'    => self::SUCCESS
        );

        return $this->jsonResponse($response);
    }

    // Set Json Response 
    public function jsonResponse($params){
        header('Content-Type: application/json');               // application type is json
        $response = json_encode($params, JSON_PRETTY_PRINT);    // turn into json format
        
        return $response;   // e.g Output: { "result": 300,"status": "success"}
    }

    public static function getErrorResponse(){
        return "Computation Error";
    }


    
}