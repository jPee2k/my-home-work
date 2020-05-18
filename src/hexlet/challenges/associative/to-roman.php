<?php

namespace HomeWork\Hexlet\Challenges\Associative\ToRoman;

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

function toRoman(int $num)
{
    $table = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000
    ];

    
}

print_r(toRoman(59));