<?php

namespace HomeWork\Hexlet\Challenges\Functions\RgbHexConversion;

use Funct\Collection;

require __DIR__ . '/../../../../vendor/autoload.php';

// https://ru.hexlet.io/challenges/php_functions_rgb_hex_conversion

/*
 * Конвертер цветов
 * 
 * Для задания цветов в HTML и CSS используются числа в шестнадцатеричной 
 * системе счисления. Чтобы не возникало путаницы в определении системы 
 * счисления, перед шестнадцатеричным числом ставят символ решетки #, 
 * например, #135278. Обозначение цвета (rrggbb) разбивается на три 
 * составляющие, где первые два символа обозначают красную компоненту 
 * цвета, два средних — зеленую, а два последних — синюю. Таким образом 
 * каждый из трех цветов — красный, зеленый и синий — может принимать 
 * значения от 00 до FF в шестнадцатеричной системе исчисления.

 * src/Solution.php
 * При работе с цветами часто нужно получить отдельные значения красного, 
 * зеленого и синего (RGB) компонентов цвета в десятичной системе исчисления 
 * и наоборот. Реализуйте функции rgbToHex и hexToRgb, которые конвертируют 
 * цвета в соответствующие представления.

 * Функция hexToRgb принимает строку с цветом в шестнадцатеричном формате 
 * и возвращает массив компонентов.

 * Функция rgbToHex принимает 3 параметра (цветные компоненты) и возвращает строку.

 * Примеры:
 * <?php
 * hexToRgb('#24ab00'); // ['r' => 36, 'g' => 171, 'b' => 0]

 * rgbToHex(36, 171, 0); // '#24ab00'
 */

function hexToRgbOnceMore($hex)
{
    $parts = str_split(trim($hex, '#'), 2);
    [$r, $g, $b] = $parts;

    return ['r' => hexdec($r), 'g' => hexdec($g), 'b' => hexdec($b)];
}

function hexToRgb($hex)
{
    $parts = str_split(trim($hex, '#'), 2);
    $keys = ['r', 'g', 'b'];

    $result = array_map(function ($part, $key) {
        return [$key => hexdec($part)];
    }, $parts, $keys);

    return array_merge(...$result);
}

function rgbToHex($r, $g, $b)
{
    return sprintf("#%02x%02x%02x", $r, $g, $b);
}

print_r(hexToRgbOnceMore('#24ab00'));
//print_r(rgbToHex(0, 255, 0));
//print_r(hexToRgb('#24ab00'));