<?php
require_once '../MySQLIConnection.php';
?>
<?php

$user = $_REQUEST['user'];
$password = $_REQUEST['password'];

$con = connect();


$query = "select password from customer where mobile='$user'";
$result = mysqli_query($con, $query);
if ($result) {
    if ($row = mysqli_fetch_array($result)) {
    
        $p=$row[0];
        if($p==$password)
        {
            session_start();
            $_SESSION["mobile"]=$user;
            $password="";
            echo "Success";
            
        }else
        {
            showMessage();
        }
        
    } else {
        showMessage();
    }
} else {
    showMessage();
}
close_connection($con);
?>
<?php

function showMessage() {
    echo "Invalid mobile no or password";
}
?>