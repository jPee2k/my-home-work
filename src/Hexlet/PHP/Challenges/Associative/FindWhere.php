<?php

namespace Home\Work\Hexlet\PHP\Challenges\Associative\FindWhere;

// https://ru.hexlet.io/challenges/php_associative_arrays_find_where

/*
 * src\Arrays.php
 * Реализуйте функцию findWhere, которая принимает на вход массив
 * (элементы которого - ассоциативные массивы) и пары ключ-значение
 * (тоже в виде массива), а возвращает первый элемент исходного массива,
 * значения которого соответствуют переданным парам (всем переданным).
 * Если совпадений не было, то функция должна вернуть null.

 * <?php

 * findWhere(
 *   [
 *       ['title' => 'Book of Fooos', 'author' => 'FooBar', 'year' => 1111],
 *       ['title' => 'Cymbeline', 'author' => 'Shakespeare', 'year' => 1611],
 *       ['title' => 'The Tempest', 'author' => 'Shakespeare', 'year' => 1611],
 *       ['title' => 'Book of Foos Barrrs', 'author' => 'FooBar', 'year' => 2222],
 *       ['title' => 'Still foooing', 'author' => 'FooBar', 'year' => 3333],
 *       ['title' => 'Happy Foo', 'author' => 'FooBar', 'year' => 4444],
 *   ],
 *   ['author' => 'Shakespeare', 'year' => 1611]
 * ); // ['title' => 'Cymbeline', 'author' => 'Shakespeare', 'year' => 1611]

 */

function findWhere($col, $param)
{
    $num = count($param);

    foreach ($col as $find => $item) {
        $count = 0;
        foreach ($param as $key => $value) {
            if ($item[$key] === $value) {
                $count++;
            }
            if ($count === $num) {
                return $col[$find];
            }
        }
    }
    return null;
}

$col = [
    ['title' => 'Book of Fooos', 'author' => 'FooBar', 'year' => 1111],
    ['title' => 'Cymbeline', 'author' => 'Shakespeare', 'year' => 1611],
    ['title' => 'The Tempest', 'author' => 'Shakespeare', 'year' => 1611],
    ['title' => 'Book of Foos Barrrs', 'author' => 'FooBar', 'year' => 2222],
    ['title' => 'Still foooing', 'author' => 'FooBar', 'year' => 3333],
    ['title' => 'Happy Foo', 'author' => 'FooBar', 'year' => 4444],
];

$param = ['author' => 'Shakespeare', 'year' => 1611];

// print_r(findWhere($col, $param));
