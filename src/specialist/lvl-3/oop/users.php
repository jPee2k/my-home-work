<?php

class User {

    public $name;
    public $login;
    public $password;

    function __construct($name, $login, $password)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
    }

    function __destruct()
    {
        echo "Пользователь: $this->login" . PHP_EOL;
    }

    function showInfo() {
        echo "Имя пользователя: $this->name" . PHP_EOL;
        echo "Логин: $this->login" . PHP_EOL;
        echo "Пароль: $this->password<hr>" . PHP_EOL;
        echo PHP_EOL;
    }
}

$user1 = new User("Петя", "petunya_the_best", "superPassOtPidarass123");
$user2 = new User("Веталь", "Vetaha[O_o]", "qwerty44");
$user3 = new User("Алешка", "gonJa", "gdsjlhgdlfhl333");

//$user1->showInfo();
//$user2->showInfo();
//$user3->showInfo();