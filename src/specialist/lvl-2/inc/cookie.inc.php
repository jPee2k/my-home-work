<?php

$visitCounter = 0;
$lastVisit = "";

if (isset($_COOKIE["visitCounter"])) {
    $visitCounter = $_COOKIE["visitCounter"];
    $visitCounter++;
} else {
    $visitCounter = 1;
}

if (isset($_COOKIE["lastVisit"])) {
    $lastVisit = date("d-m-Y H-i-s", $_COOKIE["lastVisit"]);
}

if (date('d-m-Y', $_COOKIE["lastVisit"]) !== date('d-m-Y')) {
    setcookie("visitCounter", $visitCounter, time()+3600);
    setcookie("lastVisit", time(), time()+3600);
}
