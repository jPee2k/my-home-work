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