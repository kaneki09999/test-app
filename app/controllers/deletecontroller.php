<?php
namespace App\Controllers;

use App\Models\UserModel as Insert;
class deletecontroller extends Insert{

    use ExtraController;

    // Properties
    public  string $firstname;
    public  string $lastname;
    public int $age;
    public string $email;
    public string $contact;
    public string $address;
    public $request;
    public $result;
    // public string $operator;
    // public int $num1;
    // public int $num2;
    // public $request;
    // public $result;

    private array $data;    
    
    // Identifier
    const SUCCESS = 'success';

    // Initilize Object Properties
    public function __construct()
    {
        $this->request = parent::parseRequest();
    }

    // Custom Method
    public function operations($id){

        return $this->remove($id);
    }


    

    
    public function answer(){
        $type = 'POST';

        $response = array(
            'status'    => self::SUCCESS,
            // 'method'    => parent::METHOD[$type],
            'firstname'  => $this->firstname,
            'lastname'  => $this->lastname,
            'age'  => $this->age,
            'email'  => $this->email,
            'contact'  => $this->contact,
            'address'  => $this->address,

  
        );

        // $response = parent::response('response',[
        //     'status'    => self::SUCCESS,
        //     'method'    => parent::METHOD[$type],
        //     'result'    => $this->result,
        // ]);

        // return parent::render('Account',[
        //     'name' => 'whyllardermie',
        //     'email' => 'whyllardermie@gmail.com'
        // ]);
        // // Static    

        return $this->jsonResponse($response);
    }

    public static function getErrorResponse(){
        return "Invalid Operations";
    }

   
    // public function test(){

    //     $response = array(
    //         'result' => 'success',
    //         'timeStamp' => $this->ping(),
    //     );

    //     return $this->jsonResponse($response);

    // }

    // public static function getName(): void{
    //    self::SUCCESS;
    // }

    // public function setName(): string{

    //     $name   = $this->request['name'];
    //     $email  = $this->request['email'];
    //     $age    = $this->request['age'];

    //     $response = array(
    //         "status"    => self::SUCCESS,
    //         "name"      => $name,
    //         "email"     => $email,
    //         "age"       => $age
    //     );
        
    //     return $this->jsonResponse($response);
    // }

}

