<?php
// // Load the File
require dirname(__DIR__).'/vendor/autoload.php';

use Config\Database;

$obj = new Database();

$obj->connect();