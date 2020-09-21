<?php

namespace Home\Work\Hexlet\PHP\Trees\Owner;

use function Home\Work\Hexlet\PHP\Trees\mkdir;
use function Home\Work\Hexlet\PHP\Trees\mkfile;
use function Home\Work\Hexlet\PHP\Trees\isFile;
use function Home\Work\Hexlet\PHP\Trees\getChildren;
use function Home\Work\Hexlet\PHP\Trees\getMeta;
use function Home\Work\Hexlet\PHP\Trees\getName;

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

function changeOwner($tree, $owner)
{
    $name = getName($tree);
    $newMeta = getMeta($tree);
    $newMeta['owner'] = $owner;

    if (isFile($tree)) {
        return mkfile($name, $newMeta);
    }

    $children = getChildren($tree);

    $newChildren = array_map(
        function ($child) use ($owner) {
            return changeOwner($child, $owner);
        },
        $children
    );

    return mkdir($name, $newChildren, $newMeta);
}

// print_r(changeOwner($tree, 'jPee'));
