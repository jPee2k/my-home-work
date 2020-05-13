<?php

namespace HomeWork\Hexlet\Challenges\ArraysToRna;

//https://ru.hexlet.io/challenges/php_associative_arrays_to_rna

/*
 * ДНК и РНК это последовательности нуклеотидов.
 * Четыре нуклеотида в ДНК это аденин (A), цитозин (C), гуанин (G) и тимин (T).
 * Четыре нуклеотида в РНК это аденин (A), цитозин (C), гуанин (G) и урацил (U).
 * Цепь РНК составляется на основе цепи ДНК последовательной заменой каждого нуклеотида:

 * G -> C
 * C -> G
 * T -> A
 * A -> U

 * src/Solution.php
 * Напишите функцию toRna, которая принимает на вход цепь ДНК и возвращает соответствующую цепь РНК (совершает транскрипцию РНК).

 * <?php

 * toRna('ACGTGGTCTTAA');
 * // → 'UGCACCAGAAUU'
 */

function toRna($dnk)
{
    $result = [];

    $lib = [
        'A' => 'U',
        'C' => 'G',
        'G' => 'C',
        'T' => 'A'
    ];

    $splitedDnk = str_split($dnk);

    foreach ($splitedDnk as $nucleotide) {
        if (array_key_exists($nucleotide, $lib)) {
            $result[] = $lib[$nucleotide];
        }
    }

    return implode('', $result);
}

/*
function toRna($dnk)
{
    $search = ['A', 'C', 'G', 'T'];
    $replace = ['u', 'g', 'c', 'a'];

    return strtoupper(str_replace($search, $replace, $dnk));
}
*/

$dnk = 'ACGTGGTCTTAA';

print_r(toRna($dnk)."\n");