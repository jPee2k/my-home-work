<?php

namespace Home\Work\Hexlet\Challenges\OOP\Introduction;

/**
 * Генератор случайных чисел
 * https://ru.hexlet.io/challenges/php_introduction_to_oop_rand
 *
 * Random.php
 * Реализуйте генератор рандомных чисел, представленный классом Random.
 * Интерфейс объекта включает в себя три функции:

 * Конструктор. Принимает на вход seed, начальное число генератора
 * псевдослучайных чисел
 *      getNext — метод, возврающающий новое случайное число
 *      reset — метод, сбрасывающий генератор на начальное значение
 * <?php

 * $seq = new Random(100);
 * $result1 = $seq->getNext();
 * $result2 = $seq->getNext();

 * $result1 != $result2; // true

 * $seq->reset();

 * $result21 = $seq->getNext();
 * $result22 = $seq->getNext();

 * $result1 === $result21; // true
 * $result2 === $result22; // true
 * Простейший способ реализовать случайные числа — линейный конгруэнтный метод.
 * https://ru.wikipedia.org/wiki/%D0%9B%D0%B8%D0%BD%D0%B5%D0%B9%D0%BD%D1%8B%D0%B9_%D0%BA%D0%BE%D0%BD%D0%B3%D1%80%D1%83%D1%8D%D0%BD%D1%82%D0%BD%D1%8B%D0%B9_%D0%BC%D0%B5%D1%82%D0%BE%D0%B4
 */

class Random
{
    private const A = 37;
    private const C = 1;
    private const M = 99;

    private $seed;
    private $next;

    public function __construct(int $seed)
    {
        $this->seed = $seed;
        $this->next = $this->seed;
    }

    public function getNext()
    {
        $this->next = (self::A * $this->next + self::C) % self::M;
        return $this->next;
    }

    public function reset()
    {
        return $this->next = $this->seed;
    }
}
