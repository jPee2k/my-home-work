<?php

use Home\Work\Hexlet\OOP\PasswordValidator;

require __DIR__ . '/../../../vendor/autoload.php';

$debug = new PasswordValidator(['containNumbers' => true]);

// $password = 'qwerty';
// print_r($debug->validate($password));