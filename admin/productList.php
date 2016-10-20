<?php
include './header.php';
require_once '../MySQLIConnection.php';

?>
<html>
    <body>
        <div class="container">
            <h1 align="center">Product List</h1>
            <?php
            $con = connect();

            $query = "select pid,name,price,discount,isactive,description from product";


            $result = mysqli_query($con, $query);
            if ($result) {
                echo "<table class='table table-bordered'  align=center>";
                echo "<tr class='bg-primary'>";
                echo "<th>Photo</th>";
                echo "<th>PID</th>";
                echo "<th>Name</th>";
                echo "<th>Price</th>";
                echo "<th>Discount</th>";
                echo "<th>IsActive</th>";
                echo "<th>Description</th>";

                echo "</tr>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td><img src=images/$row[0].jpg width=80px height=80px;></td>";
                    echo "<td>$row[pid]</td>";
                    echo "<td>$row[name]</td>";
                    echo "<td>$row[price]</td>";
                    echo "<td>$row[discount]</td>";
                    $a = $row['isactive'];
                    if ($a == 1)
                        echo "<td>Yes</td>";
                    else
                        echo "<td>No</td>";
                    echo "<td>$row[description]</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo mysqli_error($con);
            }

            close_connection($con);
            ?>
        </div>
    </body>
</html>
<?php
include './footer.php';
?>