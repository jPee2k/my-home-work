<?php

namespace Home\Work\Hexlet\Trees\GetHiddenFilesCount;

use function Home\Work\Hexlet\Trees\mkdir;
use function Home\Work\Hexlet\Trees\mkfile;
use function Home\Work\Hexlet\Trees\isFile;
use function Home\Work\Hexlet\Trees\getChildren;
use function Home\Work\Hexlet\Trees\getName;

require __DIR__ . '/../../../vendor/autoload.php';

$tree = mkdir('/', [
    mkdir('etc', [
        mkdir('apache', []),
        mkdir('nginx', [
            mkfile('.nginx.conf', ['size' => 800]),
        ]),
        mkdir('.consul', [
            mkfile('.config.json', ['size' => 1200]),
            mkfile('data', ['size' => 8200]),
            mkfile('raft', ['size' => 80]),
        ]),
    ]),
    mkfile('.hosts', ['size' => 3500]),
    mkfile('resolve', ['size' => 1000]),
]);

function getHiddenFilesCount($node)
{
    $name = getName($node);


    if (isFile($node)) {
        $char = $name[0];
        return $char === '.' ? 1 : 0;
    }

    $children = getChildren($node);

    $descendantsCount = array_map(function ($child) {
        return getHiddenFilesCount($child);
    }, $children);

    return array_sum($descendantsCount);
}

// print_r(getHiddenFilesCount($tree)."\n");