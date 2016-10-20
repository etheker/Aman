
<html>
    <head>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery.min.js" type="text/javascript"></script>
        <script src="../js/register.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container" style="margin-top: 50px;">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-header bg-primary text-center" style="padding-top: 1px;">
                        <h3 >Existing User?</h3>
                    </div>
                    <!--<form class="form-horizontal">-->
                        <div class="form-group">
                            <label class="control-label col-sm-2">Mobile</label>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" id="LUserName">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Password</label>
                            <div class="col-sm-6">
                                <input class="form-control" type="password" id="LPassword">
                            </div>
                        </div>   
                        <div class="form-group">
                            <div class ="col-sm-offset-4">
                                <span id="error"></span>
                            </div>      
                        </div>
                        <div class="form-group">
                            <div class ="col-sm-offset-4">
                                <input type="submit" value="Login" class="btn btn-primary" onclick="return login()">
                            </div>      
                        </div>
                    <!--</form>-->
                </div>
                <div class="col-sm-6">
                    <div class="page-header bg-primary text-center" style="padding-top: 1px;">
                        <h3>New User?</h3>
                    </div>
                </div>
            </div>
        </div>  
    </body>
</html>
