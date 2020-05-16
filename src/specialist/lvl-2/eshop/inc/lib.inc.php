<?php

namespace HomeWork\Specialist\Lvl2\Eshop\Inc\Lib;

function addItemToCatalog($connection, $title, $author, $pubyear, $price)
{
    $sql = 'INSERT INTO catalog (title, author, pubyear, price) VALUE (?, ?, ?, ?)';

    if (!$stmt = mysqli_prepare($connection, $sql)) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "ssii", $title, $author, $pubyear, $price);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return true;
}

function selectAllItems($connection)
{
    $sql = 'SELECT id, title, author, pubyear, price FROM catalog';

    if (!$result = mysqli_query($connection, $sql)) {
        return false;
    }
    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //mysqli_free_result($result);
    return $items;
}

function saveToBasket()
{
    global $basket;
    $basket = base64_encode(serialize($basket));

    setcookie('basket', $basket, 0x7FFFFFFF);
}

function basketInit()
{
    global $basket, $count;

    if (!isset($_COOKIE['basket'])) {
        $basket = ['orderid' => uniqid()];
        saveToBasket();
    } else {
        $basket = unserialize(base64_decode($_COOKIE['basket']));
        $count = count($basket) - 1;
    }
}

function add2Basket($id)
{
    global $basket;
    $basket[$id] = 1;
    saveToBasket();
}
