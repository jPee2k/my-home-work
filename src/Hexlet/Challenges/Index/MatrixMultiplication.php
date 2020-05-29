<?php

namespace Home\Work\Hexlet\Challenges\Index\MatrixMultiplication;

// use function Home\Work\Hexlet\Challenges\Index\MatrixRotation\rotateLeft;

require __DIR__ . '/../../../../vendor/autoload.php';

// https://ru.hexlet.io/challenges/php_arrays_matrix_multiplication

/*
 * Операция умножения двух матриц А и В представляет собой вычисление 
 * результирующей матрицы С, где каждый элемент C(ij) равен сумме 
 * произведений элементов в соответствующей строке первой матрицы 
 * A(ik) и элементов в столбце второй матрицы B(kj).

 * Две матрицы можно перемножать только в том случае, если количество 
 * столбцов в первой матрице совпадает с количеством строк во второй 
 * матрице. Это значит, что первая матрица обязательно должна быть 
 * согласованной со второй матрицей. В результате операции умножения 
 * матрицы размера M×N на матрицу размером N×K является матрица размером M×K.

 * src\Solution.php
 * Реализуйте функцию multiply, которая принимает две матрицы и 
 * возвращает новую матрицу — результат их произведения.

 * Примеры
 * <?php

 * $matrixA = [[1, 2], [3, 2]];
 * $matrixB = [[3, 2], [1, 1]];

 * multiply($matrixA, $matrixB);
 * // [[5, 4], [11, 8]]

 * $matrixC = [
 *   [2, 5],
 *   [6, 7],
 *   [1, 8],
 * ];
 * $matrixD = [
 *   [1, 2, 1],
 *   [0, 1, 0],
 * ];

 * multiply($matrixC, $matrixD);
 * // [
 * //   [2, 9, 2],
 * //   [6, 19, 6],
 * //   [1, 10, 1],
 * // ]
 * 
 * Подсказки:
 * Описание алгоритма перемножения матриц.
 * https://www.math10.com/ru/vysshaya-matematika/matrix/umnozhenie-matric.html
 * 
 * Демонстрация операции перемножения матриц.
 * http://matrixmultiplication.xyz/
 * 
 */

function multiply($matrixA, $matrixB)
{
    $result = [];

    $rowA = getRow($matrixA);
    $rowB = getRow($matrixB);
    $colB = getCol($matrixB);

    // create empty matrix (result)
    for ($i = 0; $i < $colB; $i++) {
        $result[$i] = array_fill(0, $colB, 0);
    }

    //$rotatedB = array_reverse(rotateLeft($matrixB));

    for ($a = 0; $a < $rowA; $a++) {
        for ($b = 0; $b < $colB; $b++) {
            for ($c = 0; $c < $rowB; $c++) {
                $result[$a][$b] += $matrixA[$a][$c] * $matrixB[$c][$b];
            }
        }
    }
    return $result;
}

function isMatch($matrixA, $matrixB)
{
    return getCol($matrixA) === getRow($matrixB);
}

function isMatrix(array $array)
{
    $sum = [];

    foreach ($array as $item) {

        if (!is_array($item)) {
            return false;
        }

        $sum[] = count($item);
    }

    return array_sum($sum) % count($sum) ? false : true;
}

function getParam(array $matrix)
{
    $count = 0;

    if (isMatrix($matrix)) {
        foreach ($matrix as $item) {
            $count++;
            $col = count($item);
        }
        return ['col' => $col, 'row' => $count];
    }
}

function getCol($matrix)
{
    return getParam($matrix)['col'];
}

function getRow($matrix)
{
    return getParam($matrix)['row'];
}

/*
 * 
 * $matrixA = [
 *     [1, 2, 1],
 *     [0, 1, 0]
 * ];
 * 
 * $matrixB = [
 *     [2, 5],
 *     [6, 7],
 *     [1, 8]
 * ];
 * 
 * 
 * $matrixC = [
 *     [1, 2, 2],
 *     [3, 1, 1]
 * ];
 * $matrixD = [
 *     [4, 2],
 *     [3, 1],
 *     [1, 5]
 * ];
 * 
 * $matrixF = [
 *     [1, 2],
 *     [3, 2]
 * ];
 * $matrixG = [
 *     [3, 2],
 *     [1, 1]
 * ];
 * 
*/

// print_r(multiply($matrixF, $matrixG));
