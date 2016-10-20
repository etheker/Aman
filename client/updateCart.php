<?php
include_once './redirectHome.php';

$code = $_POST["code"];
$qty = $_POST["qty"];

$expire = time() + 500;
if (isset($_COOKIE[$code])) {
    $string = $_COOKIE[$code];
    $a = explode(",", $string);
    $price=$a[1];
    $name=$a[2];
    
    setcookie($code, "$qty,$price,$name", $expire);
}
?>