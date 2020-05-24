<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product Checkout</title>
    
    <?php include "./pubilc/meta.php" ?>
</head>
<body>

<header>
    <h2 class="alogo">Dream of flower store</h2>
    <?php include "./pubilc/navbar.php" ?>
</header>

    <div class="container">
        <div class="card soft">
            <h2>Product Checkout</h2>

            <div class="car-box">
                <table></table>

                <div class="all_money"></div>
            </div>

            <div class="pay-box">
                <div>
                    <div>Name:</div>
                    <input type="" name="name" placeholder="Please enter a name">
                </div>

                <div>
                    <div>Phone:</div>
                    <input type="" name="phone" placeholder="Please enter the phone number">
                </div>

                <div>
                    <div>Receiving address:</div>
                    <input type="" name="address" placeholder="Please enter the address">
                </div>
            </div>

            <div>
                <button class="form-button">Pay Now</button>
            </div>
        </div>
    </div>

    <?php include "./pubilc/foot.php" ?>
</body>
<script>
    var catr_str = window.localStorage.getItem("cart");
    var cart = [];
    if(catr_str){
        cart = JSON.parse(catr_str);
    }
    var is = false;

    var html = '<tr>\n' +
        '                                <th width="150px">Pic</th>\n' +
        '                                <th>title</th>\n' +
        '                                <th width="100px">price</th>\n' +
        '                                <th width="100px">num</th>\n' +
        '                                <th width="100px">amount</th>\n' +
        '                            </tr>';
    var money = 0;
    for (var i = 0; i < cart.length; i++) {
        var sum_price = (cart[i].price * cart[i].num).toFixed(2);
        html += '<tr class="pro" data-index="'+i+'">' +
            '                                <td width="60px"><img src="'+cart[i].img+'" alt="" width="100px"></td>' +
            '                                <td>'+cart[i].title+'</td>' +
            '                                <td>$<span>'+cart[i].price+'</span></td>' +
            '                                <td><span>'+cart[i].num+'</span></td>' +
            '                                <td class="money">$<span>'+sum_price+'</span></td>' +
            '                            </tr>';
        money += Number(sum_price);
        is = true;
    }

    if(is){
        $(".all_money").html("Sum:&nbsp;&nbsp;$<span>"+money.toFixed(2)+"</span>");
    }else{
        $(".all_money").html("Nothing !!!");
    }

    $(".car-box table").html(html);

    $(".form-button").on("click", function(){
        var catr_str = window.localStorage.getItem("cart");
        if(!catr_str){
            alert("Please select a product");
            window.location.href="home.php";
            return false;
        }

        var name = $("input[name = 'name']").val();
        var phone = $("input[name = 'phone']").val();
        var address = $("input[name = 'address']").val();

        if(!$.trim( name )){
            alert("Please enter a name");
            return false;
        }

        if(!$.trim( phone )){
            alert("Please enter the phone number");
            return false;
        }

        if(!$.trim( address )){
            alert("Please enter the address");
            return false;
        }

        alert("Successful purchase");
        window.localStorage.setItem("cart", "");
        window.location.href="home.php";

    })

</script>
</html>