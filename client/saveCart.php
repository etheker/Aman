<?php

include_once './redirectHome.php';

$code = $_POST["code"];
$price = $_POST["price"];
$name = $_POST["name"];

$qty = 1;
$expire = time() + 500;
if (isset($_COOKIE[$code])) {
    $string = $_COOKIE[$code];
    $a = explode(",", $string);
    $qty = $a[0];
    $qty++;
}
setcookie($code, "$qty,$price,$name", $expire);
?>