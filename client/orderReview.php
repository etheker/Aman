<?php
include_once './header.php';
?>
<html>
    <head>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container" style="margin-top: 30px;">

            <table class="table table-bordered">
                <caption><h1 align="center" class="text-primary">Order Review</h1></caption>
                <tr>
                    <td>Name:</td>
                    <td>8288789</td>                    
                </tr>
                <tr>
                    <td>Mobile:</td>
                    <td>8288789</td>                    
                </tr>
                <tr>
                    <td>Address</td>
                    <td>dhn</td>                    
                </tr>
            </table>

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
                        echo "<td>$qty</td>";
                        echo "<td>$price</td>";
                        $t = $qty * $price;
                        echo "<td>$t</td>";
                        $total = $t + $total;

                        echo "</tr>";
                    }
                    ?>
                </tbody>
                <tfoot >
                    <tr class="bg-info">
                        <td colspan="4" align="right"><b>Grand Total:</b></td>
                        <td colspan="4" >Rs.<b class="text-success"><?php echo $total; ?></b></td>
                    </tr>
                    <tr>
                        <td colspan=5 align=right><a href="saveOrder.php" class='btn btn-warning' style=width: 150px>Confirm Order</a></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </body>
</html>