<?php

use Home\Work\Hexlet\Challenges\OOP\Introduction\Circle;

require __DIR__ . '/../../../../../vendor/autoload.php';

$circle = new Circle(16);
print_r($circle->getArea() . PHP_EOL);
print_r($circle->getCircumferrence() . PHP_EOL);
