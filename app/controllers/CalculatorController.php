<?php
namespace App\Controllers;

require_once dirname(__DIR__) . '/../vendor/autoload.php';

class CalculatorController extends BaseController {

    use ExtraController;

    // Properties
    public string $operator;
    public int $num1;
    public int $num2;
    
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
    public function operations(array $data): string{
        
        // Get Requested Data
        $this->operator     = $data['operator'];
        $this->num1         = $data['first_number'];
        $this->num2         = $data['second_number'];
        
        // Computation
        $result = match ($this->operator) {
            'addition'          => $this->num1 + $this->num2,
            'subtraction'       => $this->num1 - $this->num2,
            'multiplication'    => $this->num1 * $this->num2,
            'division'          => $this->num1 / $this->num2,
            default             => $this->getErrorResponse(),
        };

        $response = array(
            'result'    => $result,
            'others'    => array(
                'CLASS'     => __CLASS__,
                'DIRECTORY' => __DIR__,
                'FILE'      => __FILE__,
                'FUNCTION'  => __FUNCTION__,
                'METHOD'    => __METHOD__,
                'LINE'      => __LINE__,
                'NAMESPACE' => __NAMESPACE__,
            ),
            'status'    => self::SUCCESS,
            'message'   => $this->extraMessage().$this->errorMessage(),
        );
        
        return $this->jsonResponse($response);
    }
    
    public static function getErrorResponse(){
        return "Invalid Operations";
    }

    public function test(){

        $response = array(
            'result' => 'success',
            'timeStamp' => $this->ping(),
        );

        return $this->jsonResponse($response);

    }

}