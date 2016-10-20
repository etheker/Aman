<?php
function connect() {
    $con = mysqli_connect("localhost", "root", "", "IMP165");
    if (!$con) {
        die("Connection Failed<br/>");
    }
    return $con;
}
function close_connection($con)
{
    mysqli_close($con);
}
?>
