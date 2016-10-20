<?php

require_once '../MySQLIConnection.php';
?>
<?php

$con = connect();

$id = $_POST["id"];
$query = "select c.mobile,c.name,c.address,o.orderid,o.pid,o.price,o.qty,o.status from orderDetails o right outer join customer c  on c.mobile=o.mobile where o.orderid='$id'";
$result = mysqli_query($con, $query);
if ($result) {
    echo "<table class='table table-bordered'>";
    echo "<tr class=bg-primary>";
    echo "<th>Image</th>";
    echo "<th>Product</th>";
    echo "<th>Qty</th>";
    echo "<th>UnitPrice</th>";
    echo "<th>Total</th>";
    echo "<th>Action</th>";
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
        $status = $row['status'];
        if ($status == 0) {
            echo "<td id='$id$row[pid]'><button  class='btn btn-danger' onclick=cancelProduct('$id','$row[pid]')>Cancel</button></td>";
        } else if ($status == 1) {
            echo "<td>Canceled</td>";
        } else {
            echo "<td class=text-success>Delivered</td>";
        }
        echo "</tr>";
    }
    echo "<tr>";
    echo "<td colspan=5 align=right>Rs.<b class='text-success'>$total<b></td>";
    echo "</tr>";
    echo "</tr>";
    echo "</table>";
} else {
    echo mysqli_error($con);
}
close_connection($con);
?>