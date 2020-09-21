<?php

namespace Home\Work\Hexlet\PHP\Challenges\Associative\FromPairs;

// https://ru.hexlet.io/challenges/php_associative_arrays_from_pairs

/*
 * src\AssociativeArrays.php
 * Реализуйте функцию fromPairs, которая принимает на вход массив, состоящий из
 * массивов-пар, и возвращает ассоциативный массив, полученный из этих пар.

 * Примечания
 * Если при конструировании объекта попадаются совпадающие ключи, то берётся
 * ключ из последнего массива-пары:

 * <?php

 * fromPairs([['cat', 5], ['dog', 6], ['cat', 11]]);
 * // ['cat' => 11, 'dog' => 6]

 * Примеры
 * <?php

 * fromPairs([['fred', 30], ['barney', 40]]);
 * // ['fred' => 30, 'barney' => 40]
 *
 */

function fromPairs($pairs)
{
    $result = [];

    foreach ($pairs as [$key, $value]) {
        $result[$key] = $value;
    }

    return $result;
}

// $pairs = [['fred', 30], ['barney', 40]];
// $pairs = [['cat', 5], ['dog', 6], ['cat', 11]];

// print_r(fromPairs($pairs));
