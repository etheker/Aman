<?php
include './header.php';
require_once '../MySQLIConnection.php';
?>
<html>
    <head>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../../ajax/usingJQuery/jquery.min.js" type="text/javascript"></script>

    </head>
    <body>
        <div class="container">
            <form action="saveProduct.php" method="POST" enctype="multipart/form-data">
                Category:
                <select name="category">
                    <?php
                    require_once './categoryList.php';
                    ?>
                </select><br/>
                Product Code:
                <input type="text" name="productcode"/><br/>
                Name
                <input type="text" name="name"/><br/>

                Price:
                <input type="text" name="price"/><br/>
                Discount:
                <input type="text" name="discount"/><br/>

                Is Active:
                <select name="isactive">
                    <option value="Y">Yes</option>
                    <option value="N">No</option>
                </select><br/>

                Description:
                <textarea name="description">
                 
                </textarea><br/>
                Image:
                <input type="file" name="photo"/><br/>
                <input type="submit" value="Submit"/>
                <input type="reset" value="Reset"/>
            </form>
        </div>
    </body>
</html>
<?php
include './footer.php';
?>
