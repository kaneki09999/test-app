<?php

// require_once "../../config/auto_class_loader.php";
require_once "../../config/auto_class_loader.php";

// call Object Test
// since you are outside of the class Test(), you have to define variable in order to call the class Test() 
$obj = new Test();

// although $work have default value you can overide the value itself.
print_r($obj->personalDetails("awdawd")); exit;
