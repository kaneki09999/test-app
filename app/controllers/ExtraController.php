<?php
// ExtraController.php
namespace App\Controllers;


trait ExtraController {
    
    public function extraMessage(): string{
        return "Test Traits";
    }

    public function errorMessage(): string{
        return "Test Error Message";
    }


}