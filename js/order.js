function getProduct(link)
{
    var id = link.innerHTML;
    document.getElementById(id).innerHTML = "<span style=color:blue;>Loading..</span>";
    var formData = {id: id};
    $.ajax(
            {
                //url as same action attribute in form
                url: "orderDetailsById.php",
                type: "POST",
                data: formData,
                success: function (data, textStatus, jqXHR)
                {
                    document.getElementById(id).innerHTML = data;
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert("error");
                    alert(textStatus);

                    alert(jqXHR.status);
                }
            });

}
function getOrderedProductDetails(link)
{
    var id = link.innerHTML;
    document.getElementById(id).innerHTML = "<span style=color:blue;>Loading..</span>";
    var formData = {id: id};
    $.ajax(
            {
                //url as same action attribute in form
                url: "orderedProductDetails.php",
                type: "POST",
                data: formData,
                success: function (data, textStatus, jqXHR)
                {
                    document.getElementById(id).innerHTML = data;
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert("error");
                    alert(textStatus);

                    alert(jqXHR.status);
                }
            });

}
function updateStatus(button)
{
    var result = confirm("Are you sure?");

    if (result)
    {
        var id = button.value;
        document.getElementById(id).innerHTML = "<span style=color:blue;>Updating..</span>";
        var formData = {id: id};
        $.ajax(
                {
                    //url as same action attribute in form
                    url: "updateStatus.php",
                    type: "POST",
                    data: formData,
                    success: function (data, textStatus, jqXHR)
                    {
                        document.getElementById(id).innerHTML = data;
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert("error");
                        alert(textStatus);

                        alert(jqXHR.status);
                    }
                });
    }
}
function cancelProduct(id, pid)
{
    var formData = {id: id, pid: pid};
    $.ajax(
            {
                //url as same action attribute in form
                url: "cancelProduct.php",
                type: "POST",
                data: formData,
                success: function (data, textStatus, jqXHR)
                {
                    if (data == "Success")
                    {
                        document.getElementById(id+pid).innerHTML="Canceld";
                    } else
                    {
                        alert(data);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert("error");
                    alert(textStatus);

                    alert(jqXHR.status);
                }
            });

}