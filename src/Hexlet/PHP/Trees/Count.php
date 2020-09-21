<?php

namespace Home\Work\Hexlet\PHP\Trees\Count;

use function Home\Work\Hexlet\PHP\Trees\mkdir;
use function Home\Work\Hexlet\PHP\Trees\mkfile;
use function Home\Work\Hexlet\PHP\Trees\isFile;
use function Home\Work\Hexlet\PHP\Trees\getChildren;

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
                        mkfile('nginx.conf'),
                    ],
                    ['owner' => 'lol']
                ),
                mkdir(
                    'consul',
                    [
                        mkfile('config.json'),
                        mkdir('data'),
                    ]
                ),
            ],
            ['owner' => 'lol']
        ),
        mkdir('logs'),
        mkfile('hosts', ['owner' => 'lol'])
    ]
);

function getNodeCount($node)
{
    if (isFile($node)) {
        return 1;
    }

    $children = getChildren($node);

    $descendantsCount = array_map(
        function ($child) {
            return getNodeCount($child);
        },
        $children
    );

    return 1 + array_sum($descendantsCount);
}

// print_r(getNodeCount($tree)."\n");
