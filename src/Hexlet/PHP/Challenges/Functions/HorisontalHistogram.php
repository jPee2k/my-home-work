<?php

namespace Home\Work\Hexlet\PHP\Challenges\Functions\HorisontalHistogram;

/*
 * Горизонтальная гистограмма
 * https://ru.hexlet.io/challenges/php_functions_horisontal_histogram
 *
 * Solution.php
 * Реализуйте функцию play, которая выводит на экран горизонтальную гистограмму.
 * Функция принимает на вход количество бросков кубика и функцию, которая
 * имитирует бросок игральной кости (её реализовывать не нужно). Вызов этой
 * функции генерирует значение от 1 до 6, что соответствует одной из граней
 * игральной кости.

 * Гистограмма содержит строки, каждой из которых соответствует грань игральной
 * кости и количество выпадений этой грани. Результаты отображаются графически
 * (с помощью символов #) и в виде числового значения, за исключением случаев,
 * когда количество равно 0 (нулю).

 * Примеры
 *
 * <?php

    play(100, rollDie);
    // 1|########################## 26
    // 2|######### 9
    // 3|############ 12
    // 4|###################### 22
    // 5|############ 12
    // 6|################### 19

    play(13, rollDie);
    // 1|##### 5
    // 2|# 1
    // 3|## 2
    // 4|
    // 5|#### 4
    // 6|# 1

 * Подсказки
 * Гистограмма https://ru.wikipedia.org/wiki/%D0%93%D0%B8%D1%81%D1%82%D0%BE%D0%B3%D1%80%D0%B0%D0%BC%D0%BC%D0%B0
 */

const rollDie = 'rollDie';

function rollDie()
{
    return rand(1, 6);
}

function play($count, string $foo)
{
    $acc = [];
    while ($count !== 0) {
        $foo = rollDie();
        $acc[$foo][] = '#';
        $count--;
    }

    $preparedString = array_map(
        function ($roll) {
            $count = count($roll);
            $hashTags = str_repeat('#', $count);
            return "|{$hashTags} {$count}";
        },
        $acc
    );

    sort($preparedString);
    printResult($preparedString);
}

function printResult($mapped)
{
    for ($i = 0; $i < 6; $i++) {
        print_r($i + 1 . (isset($mapped[$i]) ? $mapped[$i] : '|') . PHP_EOL);
    }
}

// play(88, rollDie);
