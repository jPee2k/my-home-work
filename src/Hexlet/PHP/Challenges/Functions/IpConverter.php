<?php

namespace Home\Work\Hexlet\PHP\Challenges\Functions\IpConverter;

/*
 * IP конвертер
 * https://ru.hexlet.io/challenges/php_functions_ip_converter
 * 
 * Solution.php
 * Реализуйте функции ipToInt() и intToIp(), которые преобразовывают
 * представление IP-адреса из десятичного формата с точками в 32-битное
 * число в десятичной форме и обратно.

 * Функция ipToInt() принимает на вход строку и должна возвращать число.
 * А функция intToIp() наоборот: принимает на вход число, а возвращает строку.

 * Эту задачу можно решить с помощью функций long2ip и ip2long, но
 * подразумевается что вы сделаете это без их использования.

 * Примеры
 * <?php

    ipToInt('128.32.10.1'); // 2149583361
    ipToInt('0.0.0.0'); // 0
    ipToInt('255.255.255.255'); // 4294967295

    intToIp(2149583361); // '128.32.10.1'
    intToIp(0); // '0.0.0.0'
    intToIp(4294967295); // '255.255.255.255'

 * Подсказки * 
 * IPv4 https://ru.wikipedia.org/wiki/IPv4
 */

function ipToInt(string $ip)
{
    $parts = explode('.', $ip);
    [$a, $b, $c, $d] = $parts;
    return hexdec(sprintf('%02x%02x%02x%02x', $a, $b, $c, $d));
}

function intToIp(int $num)
{
    $parts = str_split(str_pad(dechex($num), 8, '0', STR_PAD_LEFT), 2);

    $result = array_map(fn ($part) => hexdec($part), $parts);
    return implode('.', $result);
}

// print_r(ipToInt('255.255.255.255'));
// print_r(intToIp(4294967295));