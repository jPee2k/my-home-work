<?php

namespace Home\Work\Hexlet\Challenges\Associative\ToRoman;

// https://ru.hexlet.io/challenges/php_associative_arrays_to_roman

/*
 * Для записи цифр римляне использовали буквы 
 * латинского алфавита: I, V, X, L, C, D, M. Например:

 * 1 обозначалась с помощью буквы I
 * 10 с помощью Х
 * 7 с помощью VII
 * Число 2020 в римской записи — это MMXX (2000 = MM, 20 = XX).

 * src/Solution.php
 * Реализуйте функцию toRoman, которая переводит арабские числа в римские. Функция принимает на вход целое число в диапазоне от 1 до 3000, а возвращает строку с римским представлением этого числа.

 * Реализуйте функцию toArabic, которая переводит число в римской записи в число, записанное арабскими цифрами.

 * Примеры
 * <?php

 * use function App\Solution\toRoman;
 * use function App\Solution\toArabic;

 * toRoman(1);
 * // 'I'
 * toRoman(59);
 * // 'LIX'
 * toRoman(3000);
 * // 'MMM'

 * toArabic('I');
 * // 1
 * toArabic('LIX');
 * // 59
 * toArabic('MMM');
 * // 3000

 * Подсказки
 * Подробнее о римской записи — https://ru.wikipedia.org/wiki/Римские_цифры
 */


// Convert Arabic numerals to Roman
function toRoman(int $num): string
{
    $table = [
        'I' => 1,
        'IV' => 4,
        'V' => 5,
        'IX' => 9,
        'X' => 10,
        'XL' => 40,
        'L' => 50,
        'XC' => 90,
        'C' => 100,
        'CD' => 400,
        'D' => 500,
        'CM' => 900,
        'M' => 1000
    ];

    $result = '';

    $reversed = array_reverse($table);
    foreach ($reversed as $roman => $arabic) {
        $multi = intval($num / $arabic);
        if ($multi !== 0) {
            $result .= str_repeat($roman, $multi);
        }
        $num %= $arabic;
    }

    return $result;
}

// Convert Roman numerals to Arabic
function toArabic(string $let): int
{
    $result = 0;
    $let = strtoupper($let);

    $table = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000
    ];

    $special = [
        'IV' => 4,
        'IX' => 9,
        'XL' => 40,
        'XC' => 90,
        'CD' => 400,
        'CM' => 900
    ];

    if (array_key_exists($let, $special)) {
        return $special[$let];
    }

    foreach ($special as $roman => $arabic) {
        $pos = strpos($let, $roman);
        if ($pos) {
            $result += $arabic;
            $let = str_replace($roman, '', $let);
        }
    }

    for ($i = 0, $len = strlen($let); $i < $len; $i++) {
        $result += $table[$let[$i]];
    }

    return $result;
}

// Command line
if (count($argv) === 3) {
    $foo = $argv[1];
    $param = $argv[2];

    if ($foo == 'toRoman') {
        print_r(toRoman($param) . "\n");
    } elseif ($foo == 'toArabic') {
        print_r(toArabic($param) . "\n");
    }
} else {
    echo "Наберите: php ToRoman.php 'название ф-ции' и 'конвертируемое значение'\n";
}
