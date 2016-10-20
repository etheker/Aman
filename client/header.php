<html>
    <head>
        <script>
        function setValue()
        {
            document.getElementById("address").value=window.location;
        }
        </script>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body onload="setValue()">
        <div class="nav navbar-default navbar-fixed-top " style="margin-bottom: 80px;">
            <div class="navbar-header">
                <a class="navbar-brand"  href="index.php">Let's Net</a>
            </div>
            <ul class="nav nav-tabs">
                <li class="navbar-right"><a href="#">Register</a></li>
                <li class="navbar-right"><a href="register.php">Login</a></li>
                <li class="navbar-right"><a href="cart.php">Cart(<span id="cart">0</span>)</a></li>
                <li class="navbar-right"><input type="text" id="address" hidden="true"></li>
            </ul>
        </div>
    </body>
</html>
