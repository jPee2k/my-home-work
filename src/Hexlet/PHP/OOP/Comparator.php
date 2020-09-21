<?php

namespace Home\Work\Hexlet\PHP\OOP\Comparator;

use Ds\Stack;

require __DIR__ . '/../../../../vendor/autoload.php';

// BEGIN (write your solution here)
function compare($writedStr1, $writedStr2)
{
    return clearStr($writedStr1) === clearStr($writedStr2);
}

// ac##lala#a
function clearStr($writedStr)
{
    $stack = new Stack();

    $symbols = str_split($writedStr);
    foreach ($symbols as $symbol) {
        if ($symbol !== '#') {
            $stack->push($symbol);
        } else {
            if (!$stack->isEmpty()) {
                $stack->pop();
            }
        }
    }
    return implode('', $stack->toArray());
}
// END

// $a = 'ac##lala#a';
// $b = '#c';
// $c = 'c';
// var_dump(compare($b, $c));
