
<?php
include_once './header.php';
require_once '../MySQLIConnection.php';
?>
<?php
session_start();
if (isset($_SESSION["mobile"])) {
    $mobile = $_SESSION["mobile"];

    $query = "select mobile,name,address from customer";
    $con = connect();

    $result = mysqli_query($con, $query);
    if ($result) {
        if ($row = mysqli_fetch_array($result)) {
            $name = $row['name'];
            $address = $row['address'];
        }
    } else {
        die("Something Went Wrong " . mysqli_errno($con));
    }

    close_connection($con);
} else {
    header("location:index.php");
}
?>
<html>
    <head>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/order.js" type="text/javascript"></script>
        <script src="../js/jquery.min.js" type="text/javascript"></script>

    </head>
    <body>
        <div class="container text-center" style="margin-top: 50px;">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h2 class="text-primary" >Customer Profile</h2>
                </div>
                <div class="panel-body">
                    Name:<?php echo $name; ?><br/>
                    Mobile:<?php echo $mobile; ?><br/>
                    Address:<?php echo $address; ?><br/>                
                </div>
            </div>
            <h2 class="text-primary">Your Order History</h2>
            <hr/>

            <?php
            $con = connect();
            $result = mysqli_query($con, "select distinct(orderid) from orderdetails where mobile='$mobile' order by orderid desc");
            if ($result) {
                $count = mysqli_num_rows($result);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<div class=row>";
                    echo "<div class=col-md-12><h3><a  style=color:red; onclick=getOrderedProductDetails(this) href=#>$row[0]</a></h3></div>";
                    echo "<div class=col-md-12 id='$row[0]'></div>";
                    echo "</div>";
                }
                if ($count == 0) {
                    echo "<h1 align=center style=color:red>No New Orders</h1>";
                }
            } else {
                echo mysqli_error($con);
            }
            close_connection($con);
            ?>
        </div>
    </body>
</html>
