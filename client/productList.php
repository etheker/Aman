<?php
require_once '../MySQLIConnection.php';
?>
<?php
$product = $_POST['product'];
$category = $_POST['category'];

$query = "select pid,name,price,discount,isactive,description from product where cid=$category and name like '%$product%'";
if (empty($category)) {
    $query = "select pid,name,price,discount,isactive,description from product where name like '%$product%'";
}
?>
<html>
    <head>  
    </head>
    <body>
        <h1 align="center">Product List</h1>
<?php
$con = connect();



$result = mysqli_query($con, $query);
if ($result) {

    while ($row = mysqli_fetch_array($result)) {

        echo "<a href=description.php?id=$row[0]><div class='col-md-3 text-center'>";
        echo "<img src=../admin/images/$row[pid].jpg style=width:150px;height:150px;>";
        echo "<h4 class=text-primary>$row[name]</h4>";
        $discount = $row['discount'];
        if ($discount > 0) {
            echo "<h4 class=text-danger>Rs. <s>$row[price]</s></h4>";
            echo "<h4 style=color:green;>Offer:$discount%</h4>";
            $amt = $row['price'] - ($row['price'] * $discount) / 100;
            echo "<h4 class=text-success>Rs.<b>$amt</b></h4>";
        } else
            echo "<h4 class=text-success>Rs. <s>$row[price]</s></h4>";

        echo "</div></a>";
    }
} else {
    echo mysqli_error($con);
}
close_connection($con);
?>
    </body>
</html>