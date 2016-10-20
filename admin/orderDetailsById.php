<?php
require_once '../MySQLIConnection.php';
?>
<?php

$con = connect();

$id = $_POST["id"];
$query = "select c.mobile,c.name,c.address,o.orderid,o.pid,o.price,o.qty from orderDetails o right outer join customer c  on c.mobile=o.mobile where o.orderid='$id' and o.status=0";
$result = mysqli_query($con, $query);
if ($result) {
    echo "<table class='table table-bordered'>";
    echo "<tr class=bg-primary>";
    echo "<th>Image</th>";
    echo "<th>Product</th>";
    echo "<th>Qty</th>";
    echo "<th>UnitPrice</th>";
    echo "<th>Total</th>";
echo "<th>Total</th>";

    
    $total = 0;
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td><img src=../admin/images/$row[pid].jpg style='width:50px;height:50px;'></td>";
        echo "<td>$row[pid]</td>";
        echo "<td>$row[qty]</td>";
        echo "<td>$row[price]</td>";
        $t = $row['price'] * $row['qty'];
        $total = $total + $t;
        echo "<td>$t</td>";
        echo "</tr>";
    }
    echo "<tr>";
    echo "<td colspan=5 align=right>Rs.<b class='text-success'>$total<b></td>";
    echo "</tr>";
    echo "</tr>";
//    echo "<td colspan=5 align=right><input class='btn btn-warning' style='width:150px;' type=button value=Deliver onclick=updateStatus()></td>";

    echo "<td colspan=5 align=right><button class='btn btn-warning' style='width:150px;' value=$id onclick=updateStatus(this)>Deliver</button></td>";

    echo "</table>";
} else {
    echo mysqli_error($con);
}
close_connection($con);
?>