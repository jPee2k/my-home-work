<?php

namespace Home\Work\Hexlet\Challenges\QueryString;

// https://ru.hexlet.io/challenges/php_associative_arrays_query_string

/*
 * Query String (строка запроса) — часть адреса страницы в интернете 
 * содержащая константы и их значения. Она начинается после вопросительного 
 * знака и идет до конца адреса. Пример:

 * # query string: page=5
 * https://ru.hexlet.io/blog?page=5
 * Если параметров несколько, то они отделяются амперсандом &:

 * # query string: page=5&per=10
 * https://ru.hexlet.io/blog?per=10&page=5
 * src\AssociativeArrays.php
 * Реализуйте функцию buildQueryString, которая принимает 
 * на вход список параметров и возвращает сформированный query 
 * string из этих параметров:

 * <?php

 * buildQueryString(['per' => 10, 'page' => 1 ]);
 * // → page=1&per=10
 * Имена параметров в выходной строке должны располагаться в 
 * алфавитном порядке (то есть их нужно отсортировать).


function buildQueryString($piecesOfQueryString)
{
    $piece = [];

    $keys = array_keys($piecesOfQueryString);

    foreach ($keys as $key) {
        if (array_key_exists($key, $piecesOfQueryString)) {
            $piece[] = "{$key}={$piecesOfQueryString[$key]}";
        }
    }

    sort($piece);
    return implode('&', $piece);
}

 */

function buildQueryString($piecesOfQueryString)
{
    $result = [];

    foreach ($piecesOfQueryString as $piece) {
        $key = key($piecesOfQueryString);
        $result[] = "{$key}={$piecesOfQueryString[$key]}";
        next($piecesOfQueryString);
    }

    sort($result);
    return implode('&', $result);
}

// $piecesOfQueryString = ['per' => 10, 'page' => 1];

// print_r(buildQueryString($piecesOfQueryString) . PHP_EOL);
