<?php

namespace Home\Work\Hexlet\PHP\Functions\Users;

require __DIR__ . '/../../../../vendor/autoload.php';

use function Funct\Collection\flatten;

$users = [
    ['name' => 'Tirion', 'friends' => [
        ['name' => 'Mira', 'gender' => 'female'],
        ['name' => 'Ramsey', 'gender' => 'male']
    ]],
    ['name' => 'Bronn', 'friends' => []],
    ['name' => 'Sam', 'friends' => [
        ['name' => 'Aria', 'gender' => 'female'],
        ['name' => 'Keit', 'gender' => 'female']
    ]],
    ['name' => 'Rob', 'friends' => [
        ['name' => 'Taywin', 'gender' => 'male']
    ]],
];

function getGirlFriends($users)
{
    $friends = array_map(
        function ($user) {
            return $user['friends'];
        },
        $users
    );

    $girls = array_filter(
        flatten($friends),
        function ($user) {
            return $user['gender'] === 'female';
        }
    );

    return array_values($girls);
}

// print_r(getGirlFriends($users));
