<?php
include './header.php';
?>
<html>
    <head>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery.min.js" type="text/javascript"></script>

        <script>
            function postData()
            {
                var name = document.getElementById("name").value;

                var formData = {name: name};
                $.ajax(
                        {
                            //url as same action attribute in form
                            url: "saveCat.php",
                            type: "POST",
                            data: formData,
                            success: function (data, textStatus, jqXHR)
                            {
                                if (data.indexOf("Saved")!=-1)
                                {
                                    document.getElementById("name").value="";
                                }
                                document.getElementById("message").innerHTML = data;
                                document.getElementById("name").focus();

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
    <body>

        <div class="container">
            <div class="page-header">
                <h2 class="text-primary">Add New Category</h2>
            </div>
            <div class="row">
                <form class="form-horizontal" method="POST">
                    <div class="form-group">
                        <label class="col-md-1">Name:</label>
                        <div class="col-md-3">
                            <input type="text" id="name" class="form-control">
                        </div>
                    </div>                      
                    <div class="form-group">
                        <input type="button" value="Save" class="col-md-offset-2 btn btn-md btn-primary" onclick="postData()">
                    </div>  
                    <div class="form-group">
                        <span class="col-md-offset-6"   id="message"></span>
                    </div>  
                </form>
            </div>
        </div>
    </body>
</html>
<?php
include './footer.php';
?>
