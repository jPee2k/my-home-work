<?php

// connection const
const DB_HOST = 'localhost';
const DB_LOGIN = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'eshop';

// users personal info
const ORDER_LOG = 'orders.log';

// users basket
$basket = [];

// amount items in basket
$count = 0;

$connection = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);

if (mysqli_connect_errno()) {
    print_r("Соединение не удалось: " . mysqli_connect_error());
    exit();
}
