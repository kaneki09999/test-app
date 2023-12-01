<?php
namespace App\Controllers;

trait Extra{
    
    public function extraMessage(): string{
        return "Test Traits";
    }

    public function errorMessage(): string{
        return "Test Error Message";
    }


}