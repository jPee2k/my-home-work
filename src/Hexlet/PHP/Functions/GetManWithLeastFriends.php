<?php

namespace Home\Work\Hexlet\PHP\Functions\GetManWithLeastFriends;

use function Funct\Collection\minValue;

require __DIR__ . '/../../../vendor/autoload.php';

function getManWithLeastFriends(array $users)
{
    if (empty($users)) {
        return null;
    }
    return minValue($users, function ($user) {
        return count($user['friends']);
    });
}

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
    ['name' => 'Keit', 'friends' => []],
    ['name' => 'Rob', 'friends' => [
        ['name' => 'Taywin', 'gender' => 'male']
    ]],
];

// $result = getManWithLeastFriends($users);
// print_r($result);
// => ['name' => 'Keit', 'friends' => []];