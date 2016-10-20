<?php

require_once '../MySQLIConnection.php';
?>
<?php

$con = connect();
$id = $_POST["id"];
$pid=$_POST["pid"];
$query = "update orderdetails set status=1 where orderid='$id' and pid='$pid' and status=0";

$result = mysqli_query($con, $query);
if ($result) {
    echo "Success";
} else {
    echo mysqli_error($con);
}
close_connection($con);
?>