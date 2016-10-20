<?php

include_once './header.php';
?>
<html>
    <head>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/cart.js" type="text/javascript"></script>
        <script src="../js/jquery.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container" style="margin-top: 10px;">
            <table class="table table-bordered">
                <caption><h1 align="center" class="text-primary">Your Shopping Cart</h1></caption>
                <thead class="bg-primary">
                    <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($_COOKIE as $key => $value) {
                        if (!file_exists("../admin/images/$key.jpg"))
                            continue;
                        $arr = explode(",", $value);
                        echo "<br/>";
                        $qty = $arr[0];
                        $price = $arr[1];
                        $name = $arr[2];

                        echo "<tr>";
                        echo "<td><img src=../admin/images/$key.jpg width=80px;80px;></td>";
                        echo "<td>$name</td>";
                        echo "<td><input style=border:none; type=text value=$qty size=5 readonly onclick=editCartQty(this) onfocusout=updateCart(this,'$key',$price)></td>";
                        echo "<td >$price</td>";
                        $t = $qty * $price;
                        echo "<td id='$key'>$t</td>";
                        $total = $t + $total;

                        echo "</tr>";
                    }
                    ?>
                </tbody>
                <tfoot >
                    <tr class="bg-info">
                        <td colspan="4" align="right"><b>Grand Total:</b></td>
                        <td colspan="4" >Rs.<b id="total" class="text-success"><?php echo $total; ?></b></td>
                    </tr>
                    <tr>
                        <?php
                        session_start();
                        if (isset($_SESSION["mobile"])) {
                            echo "<td colspan=5 align=right><a href=orderReview.php class='btn btn-warning' style=width: 150px>Order Review</a></td>";
                        } else {
                            echo "<td colspan=5 align=right><a href=register.php?cart class='btn btn-warning' style=width: 150px>Place Order</a></td>";
                        }
                        ?>

                    </tr>
                </tfoot>
            </table>
        </div>
    </body>
</html>