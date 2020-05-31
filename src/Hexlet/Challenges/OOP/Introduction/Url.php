<?php

namespace Home\Work\Hexlet\Challenges\OOP\Introduction;

/**
 * Url
 * https://ru.hexlet.io/challenges/php_introduction_to_oop_url
 *
 * src\Url.php
 * Реализуйте класс Url который описывает переданный в конструктор
 * HTTP адрес и позволяет извлекать из него части:

 * <?php

 * $url = new Url('http://yandex.ru?key=value&key2=value2');
 * $url->getScheme(); // http
 * $url->getHost(); // yandex.ru
 * $url->getQueryParams();
 * // [
 * //     'key' => 'value',
 * //     'key2' => 'value2'
 * // ];
 * $url->getQueryParam('key'); // value
 * // второй параметр - значение по умолчанию
 * $url->getQueryParam('key2', 'lala'); // value2
 * $url->getQueryParam('new', 'ehu'); // ehu
 * Подсказка:

 * То что нужно реализовать описано в интерфейсе UrlInterface
 * Для разбора адреса воспользуйтесь функцией parse_url
 * Для разбора параметров запроса воспользуйтесь функцией parse_str
 */

class Url
{
    private $url;
    private $data;

    public function __construct($url)
    {
        $this->url = $url;
        $this->make($this->url);
    }

    public function make($url)
    {
        $this->data = parse_url($url);
        $queryParams = [];
        if (isset($this->data['query'])) {
            parse_str($this->data['query'], $queryParams);
        }
        $this->data['queryParams'] = $queryParams;
        return $this->data;
    }

    public function getScheme()
    {
        return $this->data['scheme'];
    }

    public function getHost()
    {
        return $this->data['host'];
    }

    public function getQueryParams()
    {
        return $this->data['queryParams'];
    }

    public function getQueryParam($paramName, $default = null)
    {
        return $this->data['queryParams'][$paramName] ?? $default;
    }
}
