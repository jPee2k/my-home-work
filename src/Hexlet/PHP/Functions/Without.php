<?php

namespace Home\Work\Hexlet\PHP\Functions\Without;

function without(array $items, ...$values)
{
    return array_values(
        array_filter(
            $items,
            function ($item) use ($values) {
                return !in_array($item, $values);
            }
        )
    );
}

// $result = without([3, 4, 10, 4, 'true'], 4); // [3, 10, 'true']
// $result = without(['3', 2], 0, 5, 11); // ['3', 2]

// print_r($result);
