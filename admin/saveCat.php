<?php
require_once '../MySQLIConnection.php';
?>
<?php

if (isset($_POST["name"])) {
    $name = $_POST["name"];

    $con = connect();

    $query = "insert into category(name) values('$name')";

    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<h3 class=text-success>Successfully Saved</h3>";
    } else {
        $code = mysqli_errno($con);
        if ($code == 1062)
            echo "<h3 class= text-danger>$name already exist</h3>";
        else
            echo "Not save " . mysqli_error($con);
    }
    close_connection($con);
}
else {
    header("location:newCategory.php");
}
?>

