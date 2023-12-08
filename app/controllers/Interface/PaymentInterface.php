<?php
namespace App\Controllers\Interface;


interface PaymentInterface{
    // set of rules.
    public function payNow();
    public function paymentProcess();
    public function withDrawProcess(string $name, int $id);
}

