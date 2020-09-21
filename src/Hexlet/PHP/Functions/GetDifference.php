<?php

namespace Home\Work\Hexlet\PHP\Functions\GetDifference;

function getDifference(array $first, array $second)
{
    return array_reduce(
        $first,
        function ($acc, $value) use ($second) {
            if (!in_array($value, $second)) {
                $acc[] = $value;
            }
            return $acc;
        },
        []
    );
}

// print_r(getDifference([2, 1], [2, 3])); // [1]
