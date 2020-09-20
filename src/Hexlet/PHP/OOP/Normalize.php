<?php

namespace Home\Work\Hexlet\PHP\OOP\Normalize;

use Tightenco\Collect\Support;

require __DIR__ . '/../../../../vendor/autoload.php';

/**
 * Fluent Interface
 * https://ru.hexlet.io/courses/php-object-oriented-design/lessons/fluent-interface/exercise_unit
 */

function normalize(array $assoc)
{
    $collection = collect($assoc);

    return $collection->map(fn($items) => array_map(fn($item) => trim(strtolower($item)), $items))
        ->unique(fn($item) => $item['name'] . $item['country'])
        ->sortBy(fn ($city) => $city['name'])
        ->mapToGroups(fn ($item) => [$item['country'] => $item['name']])
        ->sortKeys()
        ->toArray();
}