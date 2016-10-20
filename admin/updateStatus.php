<?php

require_once '../MySQLIConnection.php';
?>
<?php

$con = connect();
$id = $_POST["id"];
$query = "update orderdetails set status=2 where orderid='$id' and status=0";

$result = mysqli_query($con, $query);
if ($result) {
    echo "<b style=color:green;>Delivered Successfull</b>";
} else {
    echo mysqli_error($con);
}



close_connection($con);
?>