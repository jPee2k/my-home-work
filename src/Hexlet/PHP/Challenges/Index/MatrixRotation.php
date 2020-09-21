<?php

namespace Home\Work\Hexlet\PHP\Challenges\Index\MatrixRotation;

/*
 * https://ru.hexlet.io/challenges/php_arrays_matrix_rotation
 *
 * src\Solution.php
 * Реализуйте функции rotateLeft и rotateRight, которые поворачивают
 * матрицу влево (против часовой стрелки) и соответственно вправо
 * (по часовой стрелке).
$matrix = [
  [1, 2, 3, 4],
  [5, 6, 7, 8],
  [9, 0, 1, 2],
];
rotateLeft($matrix);
// [
//   [4, 8, 2],
//   [3, 7, 1],
//   [2, 6, 0],
//   [1, 5, 9],
// ]
rotateRight($matrix);
// [
//   [9, 5, 1],
//   [0, 6, 2],
//   [1, 7, 3],
//   [2, 8, 4],
// ]
*/

function rotateLeft(array $matrix): array
{
    $result = [];

    foreach ($matrix as $piece) {
        $index = count($piece) - 1;
        foreach ($piece as $j => $num) {
            $result[$index - $j][] = $num;
        }
    }

    ksort($result);
    return $result;
}

function rotateRight(array $matrix): array
{
    $result = [];

    for ($i = count($matrix) - 1; $i >= 0; $i--) {
        foreach ($matrix[$i] as $j => $num) {
            $result[$j][] = $num;
        }
    }

    return $result;
}

/*
 * $matrix = [
 *     [1, 2, 3, 4],
 *     [5, 6, 7, 8],
 *     [9, 0, 1, 2],
 *   ];
 *
 * print_r(rotateRight($matrix));
*/
