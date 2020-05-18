<?php

namespace HomeWork\Hexlet\Trees\getSubdirectoriesInfo;

use function HomeWork\Hexlet\Trees\mkdir;
use function HomeWork\Hexlet\Trees\mkfile;
use function HomeWork\Hexlet\Trees\isFile;
use function HomeWork\Hexlet\Trees\isDirectory;
use function HomeWork\Hexlet\Trees\getChildren;
use function HomeWork\Hexlet\Trees\getName;

require __DIR__ . '/../../../vendor/autoload.php';

$tree = mkdir('/', [
    mkdir('etc', [
      mkdir('apache'),
      mkdir('nginx', [
        mkfile('nginx.conf'),
      ]),
    ]),
    mkdir('consul', [
      mkfile('config.json'),
      mkfile('file.tmp'),
      mkdir('data'),
    ]),
    mkfile('hosts'),
    mkfile('resolve'),
  ]);
  
function getFilesCount($dir)
{
    if (isFile($dir)) {
        return 1;
    }

    $children = getChildren($dir);

    $desCount = array_map(function ($child) {
        return getFilesCount($child);
    }, $children);

    return array_sum($desCount);
}

function getSubdirectoriesInfo($dir)
{
    $children = getChildren($dir);

    $filtered = array_filter($children, function ($child) {
        return isDirectory($child);
    });

    return array_map(function ($child) {
        return [getName($child), getFilesCount($child)];
    }, $filtered);
}

print_r(getSubdirectoriesInfo($tree));