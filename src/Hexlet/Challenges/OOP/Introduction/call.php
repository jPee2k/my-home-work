<?php

use Home\Work\Hexlet\Challenges\OOP\Introduction\Circle;
use Home\Work\Hexlet\Challenges\OOP\Introduction\Random;
use Home\Work\Hexlet\Challenges\OOP\Introduction\Url;

require __DIR__ . '/../../../../../vendor/autoload.php';

// ---------------------------------------------------------------- //

$circle = new Circle(16);

// print_r($circle->getArea() . PHP_EOL);
// print_r($circle->getCircumferrence() . PHP_EOL);

// ---------------------------------------------------------------- //

$random = new Random(5);

// print_r($result1 = $random->getNext() . PHP_EOL);
// print_r($result2 = $random->getNext() . PHP_EOL);
// var_dump($result1 != $result2);

// $random->reset();

// print_r($result21 = $random->getNext() . PHP_EOL);
// print_r($result22 = $random->getNext() . PHP_EOL);
// var_dump($result1 === $result21);
// var_dump($result2 === $result22);

// $i = 20;
// while ($i != 0) {
//     echo $random->getNext() . PHP_EOL;
//     $i--;
// }

// ---------------------------------------------------------------- //

$url = new Url('http://yandex.ru?key=value&key2=value2');

// print_r($url->getScheme() . PHP_EOL);
// print_r($url->getHost() . PHP_EOL);
// print_r($url->getQueryParams());
// print_r($url->getQueryParam('key') . PHP_EOL);
// print_r($url->getQueryParam('key2', 'true') . PHP_EOL);
// print_r($url->getQueryParam('key3', 'false') . PHP_EOL);

// ---------------------------------------------------------------- //
