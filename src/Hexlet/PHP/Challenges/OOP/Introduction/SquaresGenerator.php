<?php

namespace Home\Work\Hexlet\PHP\Challenges\OOP\Introduction;

/**
 * Генератор квадратов
 * https://ru.hexlet.io/challenges/php_introduction_to_oop_square
 *
 * src/SquaresGenerator.php
 * Реализуйте класс SquaresGenerator со статическим методом
 * generate, принимающим два параметра: сторону и количество
 * экземпляров квадрата (по умолчанию 5 штук), которые нужно создать.
 * Функция должна вернуть массив из квадратов.

 * <?php

 * $squares = SquaresGenerator::generate(3, 2);
 * // [new Square(3), new Square(3)];
 */

class SquaresGenerator
{
    public static function generate($side, $count = 5)
    {
        $result = [];

        $i = $count;
        while ($i > 0) {
            $result[] = new Square($side);
            $i--;
        }
        
        return $result;
    }
}
