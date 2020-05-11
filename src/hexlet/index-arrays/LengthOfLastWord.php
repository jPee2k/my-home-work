<?php

namespace HomeWork\Hexlet\IndexArrays\LengthOfLastWord;

function lengthOfLastWord($text)
{
    $words = explode(' ', $text);
    do {
        $lastWord = array_pop($words);
    } while ($lastWord === '');
    return strlen($lastWord);
}

$text = 'sdfgg fdfdfdf gfvgf     ';

print_r(lengthOfLastWord($text));