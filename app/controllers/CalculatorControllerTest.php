<?php

use App\Controllers\CalculatorController;

class CalculatorControllerTest {

    public $request;
    public $response;
    public $errorCode, $errorMessage;


    const POST  = 'POST';
    const SUCCESS = 0;
    const INTERNAL_ERROR = 500;
    const INVALID_PARAMETER = 500;

    public function __construct(){
        $this->parseRequest();
    }

    public function sum() {

        // Initialize Variable
        $result = 0;
        $errorCode = 0;
        $errorMessage = null;

        // Request Parameter
        $add = isset($this->request['add']) ? $this->request['add'] : null;

        $rules = array(
            'add' => 'required'
        );

        try {

            // Validation
            // $this->myValidation($add);
            
            if (!$this->validation($add)) {
                $errorCode = self::INTERNAL_ERROR;
                $errorMessage = $this->getResponseErrorMessage(self::INTERNAL_ERROR);
                throw new Exception($errorMessage);
            }
            
            // if (!$this->isValidParameter($add, $rules)) {
            //     $errorCode = self::INVALID_PARAMETER;
            //     $errorMessage = $this->getResponseErrorMessage(self::INVALID_PARAMETER);
            //     throw new Exception($errorMessage);
            // }


             // Computation
            foreach ($add as $key => $value) {
                $result += $value;
            }

            $errorCode = self::SUCCESS;
            $errorMessage = $this->getResponseErrorMessage(self::SUCCESS);

        } catch (Exception $error) {
            $errorMessage = $error->getMessage();
        }
        // will loop and add all integers

        $data = array(
            'result' => $result
        );
         
        return $this->jsonResponse($data, $errorCode, $errorMessage);
    }

    public function jsonResponse($data, $errorCode, $errorMessage) {
        header('Content-Type: application/json');
        $errorResponse = $this->successResponse($data, $errorCode, $errorMessage);

        return json_encode($errorResponse);
    }

    public function successResponse($data, $errorCode, $errorMessage){
        if ($errorCode === self::SUCCESS) {
            $errorResponse = array(
                'errorCode'    => $errorCode,
                'errorMessage'   => $errorMessage,
            );
        }else{
            $data = []; // return empty
            $errorResponse = array(
                'errorCode'    => $errorCode,
                'errorMessage'   => $errorMessage,
            );
        }
        $response = array_merge($data, $errorResponse); // merge two array
        return $response;
    }

    public function getResponseErrorMessage($errorCode){
        // initialize Variable
        $message = null;

        switch ($errorCode) {
            case self::SUCCESS:
                $message = "Sucess";
                break;
            case self::INTERNAL_ERROR:
                $message = "Internal Error.";
                break;
            case self::INVALID_PARAMETER:
                $message = "Invalid Parameter";
                break;
            default:
                $message = "Fatal Error.";
                break;
        }
        return $message;
    }

    public function validation($data){
        if (empty($data)) {
            return false;
        } 
        return true;
    }


    public function isValidParameter($request, $rules){
        
        foreach ($rules as $key => $value) {
            // print_r($request[$key]);   exit;
            

            if ($value === 'required') {
               echo 'yes';
            }
        
        }

        // if (!$this->validation($data)) {
        //     $errorCode = self::INTERNAL_ERROR;
        //     $errorMessage = $this->getResponseErrorMessage(self::INTERNAL_ERROR);
        //     throw new Exception($errorMessage);
        // }
   
        return true;
    }


    /**
     * Parses the incoming request JSON from the request body and decodes it into an associative array.
     *
     * @return array|null The request parameters as an associative array, or null if the JSON cannot be decoded.
     */
    public function parseRequest() {
        $request_json = file_get_contents('php://input'); // Read the request body as JSON
        $this->request = json_decode($request_json, true); // Decode the JSON into an associative array
        return $this->request; // Return the request parameters as an associative array, or null if decoding fails
    }

}


// $obj = new CalculatorController();
// print_r($obj->sum()); exit;




// Check Error Message if working
// print_r($obj->getResponseErrorMessage(Calculator::INTERNAL_ERROR)); exit;


// Check if Parse is working
// print_r($obj->parseRequest()); exit;







