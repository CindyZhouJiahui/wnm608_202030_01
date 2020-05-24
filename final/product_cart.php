
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flower Store</title>
    <?php include "./pubilc/meta.php" ?>
    <style>
        .addp{
            margin-top: 20px;
        }
        .pad h2{
            margin-bottom: 12px;
        }
        .all_money{
            margin-top: 15px;
        }
    </style>
</head>
<body>
<header>
    <h2 class="alogo">Dream of flower store</h2>
    <?php include "./pubilc/navbar.php" ?>
</header>
    <div class="container">
        <img src="imgs/flowershop.jpg">
        <nav class="nav-crumbs" style="margin:1em 0">
            <ul>
                <li><a href="product_list.php">Back</a></li>
            </ul>
        </nav>
        <div class="grid gap">
            <div class="col-xs-12 col-md-8">
                <div class="card flat">
                    <div class="car-box">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <!--                            <tr>-->
                                <!--                                <th width="150px">Pic</th>-->
                                <!--                                <th>title</th>-->
                                <!--                                <th width="100px">price</th>-->
                                <!--                                <th width="100px">num</th>-->
                                <!--                                <th width="100px">amount</th>-->
                                <!--                                <th width="100px">operate</th>-->
                                <!--                            </tr>-->

                                <!--                            <tr class="pro">-->
                                <!--                                <td width="60px"><img src="imgs/flowerbox.jpg" alt="" width="100px"></td>-->
                                <!--                                <td>title</td>-->
                                <!--                                <td>$<span>29.00</span></td>-->
                                <!--                                <td><button class="jian">-</button><span>1</span><button class="jia">+</button></td>-->
                                <!--                                <td class="money">$<span>29.00</span></td>-->
                                <!--                                <td><input type="button" value="delete" class="del"></td>-->
                                <!--                            </tr>-->

                            </table>
                        </div>

                        <div class="all_money">

                        </div>

                        <div class="container pad addp">
                            <h3>Recommend</h3>
                            <div class="grid gap xs-small md-large">
<!--                                <div class="col-xs-6 col-md-3">-->
<!--                                    <a href="product_list.php?cate=Flowers">-->
<!--                                        <div class="image-circle"><img src="imgs/whiteflower.png" alt=""></div>-->
<!--                                        <figcaption>Flowers</figcaption>-->
<!--                                    </a>-->
<!--                                </div>-->
                                <?php
                                    include "./phps.php";
                                    $phps = new phps();

                                    $res = $phps->getRandomProducts();
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="card flat">

                    <div class="card-section">
                        <a href="product_checkout.php" class="form-button confirm">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "./pubilc/foot.php" ?>
</body>

<script>
    getCart();

    function getCart() {
        var catr_str = window.localStorage.getItem("cart");
        var cart = [];
        if(catr_str){
            cart = JSON.parse(catr_str);
        }
        var is = false;

        var html = '<tr>\n' +
            '                                <th>Pic</th>\n' +
            '                                <th>title</th>\n' +
            '                                <th>price</th>\n' +
            '                                <th>num</th>\n' +
            '                                <th>amount</th>\n' +
            '                                <th>operate</th>\n' +
            '                            </tr>';
        var money = 0;
        for (var i = 0; i < cart.length; i++) {
            var sum_price = (cart[i].price * cart[i].num).toFixed(2);
            html += '<tr class="pro" data-index="'+i+'">' +
                '                                <td><img src="'+cart[i].img+'" alt="" width="100px"></td>' +
                '                                <td>'+cart[i].title+'</td>' +
                '                                <td>$<span>'+cart[i].price+'</span></td>' +
                '                                <td><div style="display: flex"><button class="jian">-</button><span>'+cart[i].num+'</span><button class="jia">+</button></div></td>' +
                '                                <td class="money">$<span>'+sum_price+'</span></td>' +
                '                                <td><input type="button" value="delete" class="del"></td>' +
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

    }

    $(".car-box table").on("click", ".pro .jian", function () {
        var index = $(this).parents("tr").data("index");
        var catr_str = window.localStorage.getItem("cart");
        var cart = JSON.parse(catr_str);

        if(cart[index].num > 1){
            cart[index].num--;
        }

        window.localStorage.setItem("cart", JSON.stringify(cart));
        getCart();
    })

    $(".car-box table").on("click", ".pro .jia", function () {
        var index = $(this).parents("tr").data("index");
        var catr_str = window.localStorage.getItem("cart");
        var cart = JSON.parse(catr_str);

        cart[index].num++;

        window.localStorage.setItem("cart", JSON.stringify(cart));
        getCart();
    })

    $(".car-box table").on("click", ".del", function () {
        var index = $(this).parents("tr").data("index");
        var catr_str = window.localStorage.getItem("cart");
        var cart = JSON.parse(catr_str);

        cart.splice(index, 1);

        window.localStorage.setItem("cart", JSON.stringify(cart));
        getCart();
    })
</script>

</html>