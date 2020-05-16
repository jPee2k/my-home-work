<?php

use function HomeWork\Specialist\Lvl2\Eshop\Inc\Lib\addItemToCatalog;

    // подключение библиотек
    require "secure/session.inc.php";
	require "../inc/lib.inc.php";
	require "../inc/config.inc.php";

    // recive param
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = mysqli_real_escape_string($connection, $_POST['title']);
        $author = mysqli_real_escape_string($connection, $_POST['author']);
        $pubyear = trim(strip_tags((int)$_POST['pubyear']));
        $price = trim(strip_tags((int)$_POST['price']));
    }
    
    // add item to catalog
    $add = addItemToCatalog($connection, $title, $author, $pubyear, $price);

    if (!$add) {
        echo 'Товар не добавлен в каталог';
    } else {
        header("Location: add2cat.php");
        exit;
    }