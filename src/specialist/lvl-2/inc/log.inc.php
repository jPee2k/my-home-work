<?php

$dt = time();
$page = $_SERVER['REQUEST_URI'];
$ref = $_SERVER['HTTP_REFERER'];

$path = "{$dt}|{$page}|{$ref}".PHP_EOL;

$file = fopen("log/".PATH_LOG, "a+");
fwrite($file, $path);
fclose($file);