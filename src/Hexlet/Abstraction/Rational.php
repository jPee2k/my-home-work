<?php

namespace Home\Work\Hexlet\Abstraction\Rational;

// BEGIN (write your solution here)
function ratToString($rat)
{
    return getNumer($rat) . '/' . getDenom($rat);
}

function makeRational($numer, $denom)
{
    return normalize($numer, $denom);
}

function getNumer($rational)
{
    return (int) explode('/', $rational)[0];
}

function getDenom($rational)
{
    return (int) explode('/', $rational)[1];
}

function add($rational1, $rational2)
{
    $slice = getSlise($rational1, $rational2);
    $denom = getCommonDenom($rational1, $rational2);

    $factor1 = $denom / $slice['denom1'];
    $factor2 = $denom / $slice['denom2'];

    $sumNumer = $slice['numer1'] * $factor1 + $slice['numer2'] * $factor2;

    return normalize($sumNumer, $denom);
}

function sub($rational1, $rational2)
{
    $slice = getSlise($rational1, $rational2);
    $denom = getCommonDenom($rational1, $rational2);

    $factor1 = $denom / $slice['denom1'];
    $factor2 = $denom / $slice['denom2'];

    $suиNumer = $slice['numer1'] * $factor1 - $slice['numer2'] * $factor2;

    return normalize($suиNumer, $denom);
}

function normalize($numer, $denom)
{
    if ($denom % $numer == false) {
        $denom /= $numer;
        $numer /= $numer;
    } elseif ($numer % $denom == false) {
        $numer /= $denom;
        $denom /= $denom;
    }

    if ($numer < 0 || $denom < 0) {
        $numer = abs($numer);
        $denom = abs($denom);
        return "-{$numer} / {$denom}";
    }

    return "{$numer} / {$denom}";
}

function getSlise($rational1, $rational2)
{
    $numer1 = getNumer($rational1);
    $denom1 = getDenom($rational1);

    $numer2 = getNumer($rational2);
    $denom2 = getDenom($rational2);

    return ['numer1' => $numer1, 'denom1' => $denom1, 'numer2' => $numer2, 'denom2' => $denom2];
}

function getCommonDenom($rational1, $rational2)
{
    $slice = getSlise($rational1, $rational2);

    if ($slice['denom1'] === $slice['denom2']) {
        $denom = $slice['denom1'];
    } else {
        $minDenom = gcd($slice['denom1'], $slice['denom2']);

        if ($minDenom === 1) {
            $denom = $slice['denom1'] * $slice['denom2'];
        } else {
            $denom = $slice['denom1'] < $slice['denom2'] ? $slice['denom1'] * $minDenom : $slice['denom2'] * $minDenom;
        }
    }
    return $denom;
}
// END

function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : abs($b);
}

// $rat1 = makeRational(1, 3);
// $rat2 = makeRational(3, 9);

// print_r(add($rat1, $rat2));
