<?php

namespace HomeWork\Hexlet\Trees\Du;

use function HomeWork\Hexlet\Trees\isDirectory;
use function HomeWork\Hexlet\Trees\isFIle;
use function HomeWork\Hexlet\Trees\reduce;
use function HomeWork\Hexlet\Trees\getName;
use function HomeWork\Hexlet\Trees\getMeta;
use function HomeWork\Hexlet\Trees\getChildren;
use function HomeWork\Hexlet\Trees\mkfile;
use function HomeWork\Hexlet\Trees\mkdir;

require __DIR__ . '/../../../vendor/autoload.php';

$tree = mkdir('/', [
    mkdir('etc', [
        mkdir('apache'),
        mkdir('nginx', [
            mkfile('nginx.conf', ['size' => 800]),
        ]),
        mkdir('consul', [
            mkfile('config.json', ['size' => 1200]),
            mkfile('data', ['size' => 8200]),
            mkfile('raft', ['size' => 80]),
        ]),
    ]),
    mkfile('hosts', ['size' => 3500]),
    mkfile('resolve', ['size' => 1000]),
]);
  
// BEGIN
function addSize($node)
{
    return reduce(function ($acc, $tree) {
        if (isDirectory($tree)) {
            return $acc;
        }

        $meta = getMeta($tree);

        return $acc + $meta['size'];
    }, $node, 0);
}

function du($node)
{
    $result = array_map(function ($node) {
        return [getName($node), addSize($node)];
    }, getChildren($node));

    usort($result, function ($arr1, $arr2) {
        return $arr2[1] <=> $arr1[1];
    });

    return $result;
}
// END

print_r(du($tree));