<?php

namespace Home\Work\Hexlet\Challenges\Functions\FindNearest;

// https://ru.hexlet.io/challenges/php_functions_find_nearest

/*
 * src\Arrays.php
 * Реализуйте функцию findIndexOfNearest, которая принимает на вход 
 * массив чисел и искомое число. Задача функции — найти в массиве ближайшее 
 * число к искомому и вернуть его индекс в массиве.

 * Если в массиве содержится несколько чисел, одновременно являющихся 
 * ближайшими к искомому числу, то возвращается наименьший из индексов 
 * ближайших чисел.

 * Примеры
 * <?php

 * findIndexOfNearest([], 2); // null
 * findIndexOfNearest([15, 10, 3, 4], 0); // 2
 * 
 */


function classicFindOfNearest($numbers, $find)
{
    $result = [];
    foreach ($numbers as $num) {
        $diff = abs($num - $find);
        $result[] = $diff;
    }

    asort($result);
    return array_key_first($result);
}

function findIndexOfNearest($numbers, $find)
{
    uasort($numbers, fn ($a, $b) => abs($a - $find) <=> abs($b - $find));

    return array_key_first($numbers);
}

// print_r(findIndexOfNearest([15, 10, 3, 4], 0)); // 2