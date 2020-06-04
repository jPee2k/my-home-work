<?php

use Home\Work\Hexlet\OOP\PasswordValidator;
use Home\Work\Hexlet\OOP\Truncater;
use Home\Work\Hexlet\OOP\DeckOfCards;

use function Home\Work\Hexlet\OOP\Normalize\Normalize;

require __DIR__ . '/../../../vendor/autoload.php';

// $debug = new PasswordValidator(['containNumbers' => true]);
// $password = 'qwerty';
// print_r($debug->validate($password));

// ************************************************************** //

/*
 * $truncater = new Truncater();
 * print_r($truncater->truncate('one two'));
 * echo PHP_EOL;
 * print_r($truncater->truncate('one two', ['length' => 6]));
 * echo PHP_EOL;
 * print_r($actual = $truncater->truncate('one two', ['separator' => '.']));
 * echo PHP_EOL;
 * print_r($truncater->truncate('one two', ['length' => '3']));
 * echo PHP_EOL;
 * echo PHP_EOL;

 * $truncater = new Truncater(['length' => 3]);
 * print_r($truncater->truncate('one two'));
 * echo PHP_EOL;
 * print_r($truncater->truncate('one two', ['separator' => '!']));
 * echo PHP_EOL;
 * print_r($truncater->truncate('one two'));
 * echo PHP_EOL;
 * echo PHP_EOL;
 * print_r($truncater->truncate('one two', ['length' => 7]));
 * echo PHP_EOL;
*/

// ************************************************************** //

// $cards = new DeckOfCards([1, 2, 2, 4, 8]);
// print_r($cards->getShuffled());

// ************************************************************** //

/*
 * $raw = [
 *     [
 *         'name' => 'istambul',
 *         'country' => 'turkey'
 *     ],
 *     [
 *         'name' => 'Moscow ',
 *         'country' => ' Russia'
 *     ],
 *     [
 *         'name' => 'iStambul',
 *         'country' => 'tUrkey'
 *     ],
 *     [
 *         'name' => 'antalia',
 *         'country' => 'turkeY '
 *     ],
 *     [
 *         'name' => 'samarA',
 *         'country' => '  ruSsiA'
 *     ],
 *     [
 *         'name' => 'istambul',
 *         'country' => 'usa'
 *     ],
 * ];

 * print_r(normalize($raw));
*/

// ************************************************************** //
