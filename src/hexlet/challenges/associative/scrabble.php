<?php

namespace HomeWork\Hexlet\Challenges\ArraysScrabble;

// https://ru.hexlet.io/challenges/php_associative_arrays_scrabble

/*
 * src/Solution.php
 * Реализуйте функцию scrabble, которая принимает на вход два параметра: набор символов (строку) и слово, и проверяет, можно ли из переданного набора составить это слово. В результате вызова функция возвращает true или false.

 * При проверке учитывается количество символов, нужных для составления слова, и не учитывается их регистр.

 * Примеры
 * <?php

 * use function App\Solution\scrabble;

 * scrabble('rkqodlw', 'world'); 
 * // true
 * scrabble('avj', 'java'); 
 * // false
 * scrabble('avjafff', 'java'); 
 * // true
 * scrabble('', 'hexlet'); 
 * // false
 * scrabble('scriptingjava', 'JavaScript'); 
 * // true
*/

function scrabble($col, $word) {
    $symbols = str_split(strtolower($word));
    foreach ($symbols as $symbol) {
        $key = strpos($col, $symbol);
        if ($key === false) {
            return false;
        }
        $col[$key] = ' ';
    }
    return true;
} 

$col = 'scriptingjava';
$word = 'JavaScript';

var_dump(scrabble($col, $word));