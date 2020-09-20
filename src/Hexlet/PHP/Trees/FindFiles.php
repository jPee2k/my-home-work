<?php

namespace Home\Work\Hexlet\PHP\Trees\FindFiles;

use function Home\Work\Hexlet\PHP\Trees\isDirectory;
use function Home\Work\Hexlet\PHP\Trees\isFIle;
use function Home\Work\Hexlet\PHP\Trees\reduce;
use function Home\Work\Hexlet\PHP\Trees\getName;
use function Home\Work\Hexlet\PHP\Trees\getMeta;
use function Home\Work\Hexlet\PHP\Trees\getChildren;
use function Home\Work\Hexlet\PHP\Trees\mkfile;
use function Home\Work\Hexlet\PHP\Trees\mkdir;

require __DIR__ . '/../../../../vendor/autoload.php';

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
function findFilesByName($root, $subStr)
{
    $iter = function ($node, $ancestry, $acc) use (&$iter, $subStr) {
        $name = getName($node);
        $newAncestry = ($name === '/') ? '' : "$ancestry/$name";
        if (isFile($node)) {
            if (strpos($name, $subStr) === false) {
                return $acc;
            }
            $acc[] = $newAncestry;
            return $acc;
        }

        return array_reduce(
            getChildren($node),
            function ($newAcc, $child) use ($iter, $newAncestry) {
                return $iter($child, $newAncestry, $newAcc);
            },
            $acc
        );
    };

    return $iter($root, '', []);
}
// END