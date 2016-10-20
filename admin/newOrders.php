<?php
include_once './header.php';
?>
<html>
    <head>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery.min.js" type="text/javascript"></script>
        <script src="../js/order.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            <div class="page-header text-center">
                <h1 class="text-primary">Pending Orders</h1>
            </div>
            <div class="text-center">

                <?php
                require_once '../MySQLIConnection.php';
                $con = connect();
                $result = mysqli_query($con, "select distinct(orderid) from orderdetails where status=0 order by orderid desc");
                if ($result) {
                    $count = mysqli_num_rows($result);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<div class=row>";
                        echo "<div class=col-md-12><h3><a  style=color:red; onclick=getProduct(this) href=#>$row[0]</a></h3></div>";
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
        </div>
    </body>
</html>