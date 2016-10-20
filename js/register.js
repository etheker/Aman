function register()
{
    
}
function login()
{
    var user=document.getElementById("LUserName").value;
    var password=document.getElementById("LPassword").value;
    
    var formData = {user: user, password: password};
    
    $.ajax(
            {
                //url as same action attribute in form
                url: "validateUser.php",
                type: "POST",
                data: formData,
                success: function (data, textStatus, jqXHR)
                {
                    if(data=="Success")
                    {
                     //   alert(data);
                        //return true;
                        window.location="http://localhost:8012/IMP165/PHP/OnlineShopping/client/orderReview.php";
                        
                    }else
                    {
                        document.getElementById("error").innerHTML="<b class=text-danger>"+data+"</b>";
                        return false;
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                   alert(jqXHR.statusText);
                    return false;
                }
            });
}
