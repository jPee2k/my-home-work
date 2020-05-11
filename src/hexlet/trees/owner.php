<?php

namespace HomeWork\Hexlet\Trees\Owner;

use function HomeWork\Hexlet\Trees\mkdir;
use function HomeWork\Hexlet\Trees\mkfile;
use function HomeWork\Hexlet\Trees\isFile;
use function HomeWork\Hexlet\Trees\getChildren;
use function HomeWork\Hexlet\Trees\getMeta;
use function HomeWork\Hexlet\Trees\getName;

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
  
function changeOwner($tree, $owner)
{
    $name = getName($tree);
    $newMeta = getMeta($tree);
    $newMeta['owner'] = $owner;

    if (isFile($tree)) {
        return mkfile($name, $newMeta);
    }

    $children = getChildren($tree);

    $newChildren = array_map(function ($child) use ($owner) {
        return changeOwner($child, $owner);
    }, $children);

    return mkdir($name, $newChildren, $newMeta);
}

print_r(changeOwner($tree, 'jPee'));