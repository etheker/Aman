function saveCart(code, price, name)
{
    var qty = document.getElementById("cart").innerHTML;
    qty = parseInt(qty);
    qty++;
    document.getElementById("cart").innerHTML = qty;


    var formData = {code: code, price: price, name: name};
    $.ajax(
            {
                //url as same action attribute in form
                url: "saveCart.php",
                type: "POST",
                data: formData,
                success: function (data, textStatus, jqXHR)
                {

                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert("error");
                    alert(textStatus);

                    alert(jqXHR.status);
                }
            });
}

function readCart()
{

}
function editCartQty(text)
{
    text.readOnly = false;
}
function updateCart(text, code, price)
{
    exp = /^\d{1,}$/
    if (exp.test(text.value))
    {
        var qty = parseInt(text.value);
        var total = qty * price;
        var oldAmount = document.getElementById(code).innerHTML;
        oldAmount = parseInt(oldAmount);
        var oldGrandTotal = document.getElementById("total").innerHTML;

        total=Math.round(total);
        oldGrandTotal=Math.round(oldGrandTotal);
        oldGrandTotal = oldGrandTotal - oldAmount;
        oldGrandTotal = oldGrandTotal + total;

        
        document.getElementById(code).innerHTML = total;
        document.getElementById("total").innerHTML = oldGrandTotal;
        
        

        var formData = {code: code, qty: qty};
        $.ajax(
                {
                    //url as same action attribute in form
                    url: "updateCart.php",
                    type: "POST",
                    data: formData,
                    success: function (data, textStatus, jqXHR)
                    {

                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert("error");
                        alert(textStatus);

                        alert(jqXHR.status);
                    }
                });

    } else
    {
        text.focus();
        alert('Invalid qty');
    }
}