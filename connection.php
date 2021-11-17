<?php
$url = "127.0.0.1";
$password = "123456";
$connection = mysqli_connect($url, "root", $password, "asialife");

if (!$connection) {
    exit('<h1>連線失敗</h1>');
}
header("content-Type:text/html;charset=utf-8");
mysqli_set_charset($connection, 'utf8');
