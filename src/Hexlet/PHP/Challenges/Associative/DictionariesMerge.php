<?php

namespace Home\Work\Hexlet\PHP\Challenges\Associative\DictionariesMerge;

// https://ru.hexlet.io/challenges/php_associative_arrays_dictionaries_merge

/*

 * src/Solution.php
 * Реализуйте функцию combine, которая объединяет несколько
 * словарей (ассоциативных массивов) в один общий словарь.
 * Функция принимает любое количество аргументов и возвращает
 * результат в виде ассоциативного массива, в котором каждый
 * ключ содержит массив уникальных значений. Элементы в массиве
 * располагаются в том порядке, в котором они появляются во
 * входящих словарях.

 * Примеры
 * <?php
 * combine([], [], [], []);
 *  [];

 * combine([ 'a' => 1, 'b' => 2 ], [ 'a' => 3 ]);
 *  [ 'a' => [1, 3], 'b' => [2]];

 * combine(
 *   [ 'a' => 1, 'b' => 2, 'c' => 3 ],
 *   [],
 *   [ 'a' => 3, 'b' => 2, 'd' => 5],
 *   [ 'a' => 6 ],
 *   [ 'b' => 4, 'c' => 3, 'd' => 2 ],
 *   [ 'e' => 9 ],
 * );

 *  [
 *    'a' => [1, 3, 6],
 *    'b' => [2, 4],
 *    'c' => [3],
 *    'd' => [5, 2],
 *    'e' => [9],
 *
 *  ];
 *
 */

function combine(...$dictionaries)
{
    $result = [];

    foreach ($dictionaries as $dict) {
        foreach ($dict as $key => $value) {
            if (array_key_exists($key, $result) && in_array($value, $result[$key])) {
                continue;
            }
            $result[$key][] = $value;
        }
    }
    return $result;
}

/*
 * print_r(combine(
 *     ['a' => 1, 'b' => 2, 'c' => 3],
 *     [],
 *     ['a' => 3, 'b' => 2, 'd' => 5],
 *     ['a' => 6],
 *     ['b' => 4, 'c' => 3, 'd' => 2],
 *     ['e' => 9]
 * ));
 *
 */
