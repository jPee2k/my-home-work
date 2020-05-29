<?php

namespace Home\Work\Hexlet\Challenges\Functions\Nrzi;

// https://ru.hexlet.io/challenges/php_functions_nrzi

/*
 * NRZI код (Non Return to Zero Invertive) — один из способов линейного 
 * кодирования. Обладает двумя уровнями сигнала и используется для передачи 
 * битовых последовательностей, содержащих только 0 и 1. NRZI применяется, 
 * например, в оптических кабелях, где устойчиво распознаются только два 
 * состояния сигнала — свет и темнота.

 * Принцип кодирования
 * При передаче логического нуля на вход кодирующего устройства передается 
 * потенциал, установленный на предыдущем такте (то есть состояние 
 * потенциала не меняется), а при передаче логической единицы потенциал 
 * инвертируется на противоположный.

 * nrzi

 * src/Nrzi.php
 * Реализуйте функцию decode, которая принимает cтроку в виде графического 
 * представления линейного сигнала и возвращает строку с бинарным кодом.

 * Примеры использования:
 * <?php

 * $signal = '_|¯|____|¯|__|¯¯¯';
 * decode($signal); // '011000110100'

 * $signal_2 = '|¯|___|¯¯¯¯¯|___|¯|_|¯';
 * decode($signal_2); // '110010000100111'

 * $signal_3 = '¯|___|¯¯¯¯¯|___|¯|_|¯';
 * decode($signal_3); // '010010000100111'

 * Подсказки

 * Символ | в строке указывает на переключение сигнала и означает, 
 * что уровень сигнала в следующем такте, будет изменён на противоположный 
 * по сравнению с предыдущим.

 * К сожалению, str_split умеет работать только с ASCII символами, 
 * поэтому для разделения строки на символы используйте конструкцию 
 * preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);, где $str - строка.
 * 
 */

//$signal = '_|¯|____|¯|__|¯¯¯'; '011000110100'

function decodeLowLvl(string $nrzi)
{
    $symbols = preg_split("//u", $nrzi, -1, PREG_SPLIT_NO_EMPTY);

    $result = [];

    for ($key = 0, $count = count($symbols); $key < $count; $key++) {
        if (isset($symbols[$key + 1])) {
            if ($symbols[$key] . $symbols[$key + 1] === '|¯') {
                $result[] = 1;
                $key++;
            } elseif ($symbols[$key] . $symbols[$key + 1] === '|_') {
                $result[] = 1;
                $key++;
            } else {
                $result[] = 0;
            }
        } else {
            $result[] = 0;
        }
    }
    return implode('', $result);
}

function decode(string $nrzi)
{
    $prev = '';
    $symbols = preg_split("//u", $nrzi, -1, PREG_SPLIT_NO_EMPTY);

    $result = array_map(function ($symb) use (&$prev) {
        if ($symb === '|') {
            $prev = $symb;
            return;
        } elseif ($prev === '|') {
            $prev = $symb;
            return 1;
        }
        return 0;
    }, $symbols);

    return implode('', $result);
}

// $signal = '_|¯|____|¯|__|¯¯¯';          //'011000110100'
// $signal_2 = '|¯|___|¯¯¯¯¯|___|¯|_|¯';   // '110010000100111'
// $signal_3 = '¯|___|¯¯¯¯¯|___|¯|_|¯';    // '010010000100111'

// print_r(decode($signal_3));