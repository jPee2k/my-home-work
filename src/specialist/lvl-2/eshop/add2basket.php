<?php
// require libs

use function HomeWork\Specialist\Lvl2\Eshop\Inc\Lib\add2Basket;

require "inc/lib.inc.php";
require "inc/config.inc.php";

if ($_GET['id'] > 0) {
    $id = $_GET['id'];
}

if ($id) {
    add2Basket($id);
}
header("Location: catalog.php");
exit;
