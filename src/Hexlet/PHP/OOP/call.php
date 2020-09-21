<?php

use Home\Work\Hexlet\PHP\OOP\PasswordValidator;
use Home\Work\Hexlet\PHP\OOP\Truncater;
use Home\Work\Hexlet\PHP\OOP\DeckOfCards;
use Home\Work\Hexlet\PHP\OOP\Booking;

use function Home\Work\Hexlet\PHP\OOP\Normalize\normalize;
use function Home\Work\Hexlet\PHP\OOP\GetQuestions\getQuestions;

require __DIR__ . '/../../../../vendor/autoload.php';

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

// $booking = new Booking();
// var_dump($booking->book('11-11-2008', '13-11-2008')); // true
// var_dump($booking->book('12-11-2008', '12-11-2008')); // false
// var_dump($booking->book('10-11-2008', '12-11-2008')); // false
// var_dump($booking->book('12-11-2008', '14-11-2008')); // false
// var_dump($booking->book('10-11-2008', '11-11-2008')); // true
// var_dump($booking->book('13-11-2008', '14-11-2008')); // true
// var_dump($booking->book('13-11-2008', '14-11-2008')); // false

// ************************************************************** //

/*
 * $text = <<<HEREDOC
 * lala\r\nr
 * ehu?
 * vie?eii
 * \n \t
 * i see you
 * /r \n
 * one two?\r\n\n
 * HEREDOC;

 * print_r(getQuestions($text));
 *
/*
