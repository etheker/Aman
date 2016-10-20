<?php

include_once "./header.php";
require_once '../MySQLIConnection.php';

?>
<?php

//request_method is key associated method value of form submission 
//return GET or POST
$method = $_SERVER["REQUEST_METHOD"];

if ($method == "POST") {

    $pcode = $_POST["productcode"];
    $category = $_POST["category"];
    $name = $_POST["name"];
    $isactive = $_POST["isactive"];
    if($isactive=="Y")
        $isactive=TRUE;
    else
        $isactive=FALSE;
    
    $discount = $_POST["discount"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $con = connect();
    
    $query = "insert into product(cid,pid,name,discount,price,description,isactive)"
            . "values($category,'$pcode','$name',$discount,$price,'$description',$isactive)";
    
    $result = mysqli_query($con,$query);

    if ($result) {
        $file = $_FILES["photo"];
        $filename = $pcode . ".jpg";
        $size = $file["size"];
        $tempname = $file["tmp_name"];
        $input = fopen($tempname, "rb");
        $data = fread($input, $size);

        $output = fopen("images/" . $filename, "wb");
        fwrite($output, $data);

        echo "<h1 align=center>Successfully Added</h1>";
        echo "<a href=newProduct.php><h3 align=center>Add More</h3>";
    }else
    {
        mysqli_error($con);
    }
    close_connection($con);
} else {
    header("location:newProduct.php");
}
?>