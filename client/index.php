<?php
require_once '../MySQLIConnection.php';
?>
<html>
    <head>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery.min.js" type="text/javascript"></script>
        <script>
            function getProductList()
            {
                document.getElementById("list").innerHTML = '<h1 align=center>Loading...</h1>';
                var name = document.getElementById("search").value;
                var category=document.getElementById("category").value;
                
                var formData = {product: name,category:category};
                $.ajax(
                        {
                            //url as same action attribute in form
                            url: "productList.php",
                            type: "POST",
                            data: formData,
                            success: function (data, textStatus, jqXHR)
                            {

                                document.getElementById("list").innerHTML = data;

                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                alert("error");
                                alert(textStatus);

                                alert(jqXHR.status);
                            }
                        });
            }
        </script>
    </head>
    <body onload="getProductList()">
        <div class="nav navbar-default navbar-fixed-top " style="margin-bottom: 100px;">
            <div class="navbar-header">
                <a class="navbar-brand"  href="#">Let's Net</a>
            </div>
            <ul class="nav nav-tabs">
                <li>
                    <select id="category" class="form-control">
                        <option value="">-All-</option>
                        <?php
                        require_once '../admin/categoryList.php';
                        ?>
                    </select>
                </li>
                <li>
                    <input class="form-control" placeholder="Search Product" type="text" id="search" >
                </li>
                <li>
                    <input class="btn btn-primary" type="button" value="Search" onclick="getProductList()">
                </li>
                <li class="navbar-right"><a href="#">Register</a></li>
                <li class="navbar-right"><a href="register.php">Login</a></li>
            </ul>
        </div>
        <div class="container" style="margin-top: 50px;">
            <div class="row" id="list">
               
            </div>
        </div>
    </body>
</html>