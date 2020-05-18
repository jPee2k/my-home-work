<?php

namespace HomeWork\Hexlet\IndexArrays\SumIntervals;

//use function Funct\Collection\union;

require __DIR__ . '/../../../vendor/autoload.php';

$intervals = [
    [1, 5],
    [-10, 19],
    [1, 7],
    [16, 100],
    [5, 11],
    [1, 2],
    [11, 12],
    [2, 7],
    [6, 6],
    [1, 9],
    [7, 12],
    [3, 4],
    [-7, 10],
    [1, 4],
    [2, 5]
];

function sumIntervals(array $intervals)
{
    $result = [];

    foreach ($intervals as $key => $interval) {
        [$a, $b] = $interval;
        for ($i = $a, $length = $b; $i < $length; $i++) {
            $result[$i] = ':)';
        }
    }
    return count($result);
}

$a = sumIntervals($intervals);
print_r($a);