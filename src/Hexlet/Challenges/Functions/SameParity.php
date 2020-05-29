<?php

namespace Home\Work\Hexlet\Challenges\Functions\SameParity;

// https://ru.hexlet.io/challenges/php_functions_same_parity

/*
 * src\Arrays.php
 * Реализуйте функцию getSameParity, которая принимает на вход 
 * список и возвращает новый, состоящий из элементов, у которых 
 * такая же четность, как и у первого элемента входного списка.

 * <?php
 * getSameParity([]); // []
 * getSameParity([-1, 0, 1, -3, 10, -2]); // [-1, 1, -3]

 */

function getSameParity($list)
{
    $check = isEven($list[0]);

    return array_filter($list, fn ($num) => isEven($num) === $check);
}

function isEven($num)
{
    return $num % 2 ? false : true;
}

// print_r(getSameParity([-1, 0, 1, -3, 10, -2]));
