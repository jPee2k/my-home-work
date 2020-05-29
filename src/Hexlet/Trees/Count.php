<?php

namespace Home\Work\Hexlet\Trees\Count;

use function HomeWork\Hexlet\Trees\mkdir;
use function HomeWork\Hexlet\Trees\mkfile;
use function HomeWork\Hexlet\Trees\isFile;
use function HomeWork\Hexlet\Trees\getChildren;

require __DIR__ . '/../../../vendor/autoload.php';

$tree = mkdir('/', [
    mkdir('etc', [
        mkdir('apache'),
        mkdir('nginx', [
            mkfile('nginx.conf'),
        ], ['owner' => 'lol']),
        mkdir('consul', [
            mkfile('config.json'),
            mkdir('data'),
        ]),
    ], ['owner' => 'lol']),
    mkdir('logs'),
    mkfile('hosts', ['owner' => 'lol'])
]);

function getNodeCount($node)
{
    if (isFile($node)) {
        return 1;
    }

    $children = getChildren($node);

    $descendantsCount = array_map(function ($child) {
        return getNodeCount($child);
    }, $children);

    return 1 + array_sum($descendantsCount);
}

// print_r(getNodeCount($tree)."\n");