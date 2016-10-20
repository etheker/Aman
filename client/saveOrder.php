<?php
include_once './header.php';
require_once '../MySQLIConnection.php';
?>
<html>
    <head>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container" style="margin-top: 150px;">
            <?php
            session_start();
            if (isset($_SESSION['mobile'])) {
                $mobile = $_SESSION["mobile"];
                $orderid = "O" . date('Ymdhis');

                $con = connect();

                foreach ($_COOKIE as $key => $value) {
                    if (!file_exists("../admin/images/$key.jpg"))
                        continue;
                    $arr = explode(",", $value);
                    $qty = $arr[0];
                    $price = $arr[1];



                    //0-pending,1-canceled,-2-delivered
                    mysqli_query($con, "insert into orderdetails(mobile,orderid,orderdate,pid,qty,price,status) values($mobile,'$orderid',curDate(),'$key',$qty,$price,0)");
                    setcookie($key, "", -1);
                }
                echo "<h1 class='text-center text-primary' >Order Successfull your order id:$orderid</h1>";
                close_connection($con);
            } else {
                header("location:index.php");
            }
            ?>
        </div>
    </body>
</html>
