<html>
    <head>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery.min.js" type="text/javascript"></script>
        <script src="../js/cart.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
        include_once './header.php';
        require_once '../MySQLIConnection.php';
        ?>
        <?php
        $id = $_REQUEST["id"];

        $con = connect();
        $query = "select pid,name,price,discount,isactive,description from product where pid='$id'";

        $result = mysqli_query($con, $query);
        if ($result) {
            $row = mysqli_fetch_array($result);
            $name = $row['name'];
            $discount = $row['discount'];
            $description = $row['description'];
            $price = $row['price'];
            $amt = $row['price'] - ($row['price'] * $discount) / 100;
        }

        close_connection($con);
        ?>
        <div class="container" style="margin-top: 100px;">
            <div class="page-header">
                <h3 class="text-primary"><?php echo $name; ?></h3>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <img src=<?php echo "../admin/images/$id.jpg"; ?> style="width: 300px; height: 300px;">
                </div>
                <div class="col-md-6">                      
                    <h2 class="text-warning">Description</h2>
                    <p><?php echo $description; ?></p>
                    <h4>Rs.<s><?php echo $price; ?></s></h4>
                    <h4 class="text-success">Amount:<b><?php echo $amt; ?></b></h4>
                    <input type="button" class="btn btn-primary" value="AddToCart" onclick="saveCart(<?php echo "'$id'";?>,<?php echo $amt;?>,<?php echo "'$name'";?>)"/>
                </div>
            </div>
        </div>
    </body>
</html>
