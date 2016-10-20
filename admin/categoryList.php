<?php
$con=  connect();

$result=  mysqli_query($con, "select cid,name from category");
if($result)
{
    while($row=  mysqli_fetch_array($result))
    {
        echo "<option value=$row[0]>$row[1]</option>";
    }
}

close_connection($con);
?>
