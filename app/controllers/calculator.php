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
    public function calculator(array $data): string{
        
        // Get Requested Data
        $this->operator     = $data['operator'];
        $this->num1         = $data['first_number'];
        $this->num2         = $data['second_number'];
     
        // Computation
        $result = match ($this->operator) {
            'addition'          => $this->num1 + $this->num2,
            'subtraction'       => $this->num1 - $this->num2,
            'multiplidation'    => $this->num1 * $this->num2,
            'division'          => $this->num1 / $this->num2,
            default             => $this->getErrorResponse(),
        };

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
        return "Invalid Operations";
    }

    
}