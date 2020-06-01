<?php

namespace Home\Work\Hexlet\Challenges\OOP\Introduction;

/*
 * https://ru.hexlet.io/challenges/php_introduction_to_oop_circle
 *
 * src\Circle.php
 * Реализуйте класс Circle для описания кругов. У круга есть только
 * одно свойство - его радиус. Реализуйте методы getArea и getCircumference,
 * которые возвращают площадь и периметр круга соответственно.

 * <?php

 * $circle = new Circle(10);
 * Подсказки
 * Площадь круга: πr2
 * Длина окружности: 2*πR
 *
 */

class Circle
{
    private $_radius;

    public function __construct($radius)
    {
        $this->_radius = $radius;
    }

    public function getArea()
    {
        return pi() * ($this->_radius ** 2);
    }

    public function getCircumference()
    {
        return 2 * pi() * $this->_radius;
    }
}
