<?php

namespace Home\Work\Hexlet\PHP\OOP\GetQuestions;

require __DIR__ . '/../../../../vendor/autoload.php';

use function Stringy\create as s;

function getQuestions(string $text)
{
    $lines = s($text)->lines();

    $result = collect($lines)->filter(fn ($line) => $line->endsWith('?'))->all();
    return implode(PHP_EOL, $result);
}
