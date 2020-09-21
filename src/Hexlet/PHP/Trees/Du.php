<?php

namespace HomeWork\Hexlet\PHP\Trees\Du;

use function Home\Work\Hexlet\PHP\Trees\isDirectory;
use function Home\Work\Hexlet\PHP\Trees\isFIle;
use function Home\Work\Hexlet\PHP\Trees\reduce;
use function Home\Work\Hexlet\PHP\Trees\getName;
use function Home\Work\Hexlet\PHP\Trees\getMeta;
use function Home\Work\Hexlet\PHP\Trees\getChildren;
use function Home\Work\Hexlet\PHP\Trees\mkfile;
use function Home\Work\Hexlet\PHP\Trees\mkdir;

require __DIR__ . '/../../../../vendor/autoload.php';

$tree = mkdir(
    '/',
    [
        mkdir(
            'etc',
            [
                mkdir('apache'),
                mkdir(
                    'nginx',
                    [
                        mkfile('nginx.conf', ['size' => 800]),
                    ]
                ),
                mkdir(
                    'consul',
                    [
                        mkfile('config.json', ['size' => 1200]),
                        mkfile('data', ['size' => 8200]),
                        mkfile('raft', ['size' => 80]),
                    ]
                ),
            ]
        ),
        mkfile('hosts', ['size' => 3500]),
        mkfile('resolve', ['size' => 1000]),
    ]
);

// BEGIN
function addSize($node)
{
    return reduce(
        function ($acc, $tree) {
            if (isDirectory($tree)) {
                return $acc;
            }

            $meta = getMeta($tree);

            return $acc + $meta['size'];
        },
        $node,
        0
    );
}

function du($node)
{
    $result = array_map(
        function ($node) {
            return [getName($node), addSize($node)];
        },
        getChildren($node)
    );

    usort(
        $result,
        function ($arr1, $arr2) {
            return $arr2[1] <=> $arr1[1];
        }
    );

    return $result;
}
// END

// print_r(du($tree));
