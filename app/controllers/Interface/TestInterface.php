<?php
namespace App\Controllers\Interface;


interface PaymentInterface{
    // set of rules.
    public function payNow();
    public function paymentProcess();
    public function withDrawProcess($name, $id);
}

interface LoginInterface{
    public function loginFirst();
}

class Paypal implements PaymentInterface, LoginInterface{
    public function payNow(){}
    public function withDrawProcess($name, $id){}
    public function loginFirst(){}
    public function paymentProcess(){
        $this->payNow();
        $this->loginFirst();
    }
}

class Visa implements PaymentInterface{
    public function payNow(){}
    public function withDrawProcess($name, $id){}
    public function paymentProcess(){
        $this->payNow();
    }
}

class Cash implements PaymentInterface{
    public function payNow(){}

    public function withDrawProcess($name, $id){}
    public function paymentProcess(){
        $this->payNow();
    }

}

class BuyProduct{
    public function pay(PaymentInterface $paymentType){
       $paymentType->paymentProcess();
    }
}


