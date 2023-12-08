<?php
namespace App\Controllers\Abstract;

use App\Controllers\Interface\PaymentInterface;

abstract class PaymentAbstract implements PaymentInterface{

    abstract public function visaPayment(): string;

    public function payOut(): string{
        return "Sahod Na!";
    }
        
}

