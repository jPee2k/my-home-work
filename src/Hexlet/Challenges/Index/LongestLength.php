<?php

namespace Home\Work\Hexlet\Index\LongestLength;

function longestLength(string $text)
{
    $max = 0;
    $result = [];

    $symbols = str_split($text);

    if (empty($symbols[0])) {
        return 0;
    }

    foreach ($symbols as $symbol) {
        $key = array_search($symbol, $result);
        $result[] = $symbol;

        if ($key !== false) {
            $result = array_slice($result, $key + 1);
        }

        $sumOfSymbols = count($result);
        if ($sumOfSymbols > $max) {
            $max = $sumOfSymbols;
        }
    }

    return $max;
}


// $a = longestLength('abcdeef'); // 5
// $b = longestLength('jabjcdel'); // 7
// $c = longestLength(''); // 0
// $d = longestLength('abbccddeffg'); // 3

// print_r($c);