<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flower Store</title>
    <?php include "./pubilc/meta.php" ?>
    <style>
        .pic{
            width: 100%;
        }
        .f-cartbuyCountWrap{
            margin-left: 30px;
        }

        @media screen and (max-width: 420px) {
            .title{
                margin-top: 30px;
                padding-left: 30px;
            }
        }
    </style>
</head>

<body>
<header>
    <h2 class="alogo">Dream of flower store</h2>
    <?php include "./pubilc/navbar.php" ?>
</header>

    <?php
        include "./phps.php";
        $phps = new phps();

        if(!isset($_GET["id"])){
            header('Location:admin.php');
        }
        $id = $_GET["id"];

        $is = $phps->getItemData($id);
    ?>


    <div class="container pad">
        <div class="grid">
            <div class=" col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <div class="ctl-img">
                    <img src="<?php echo $is['img'] ?>">
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <div class="J_productTitle title g_minor">
                    <span><?php echo $is['title'] ?></span>
                    </span>
                </div>
                <div class="pic">
                    <span class="ppi">Sell Price:</span>
                    <span class="f-mallUnit">$</span>
                    <span class="pcc"><?php echo $is['price'] ?></span>
                </div>

                <div class="fk-pd5MallCartCount">
                    <div class="f-cartbuyCountWrap">
                        <span class="f-propName g_minor" style="width:75px;min-width:75px;max-width: 75px;">Purchase quantity：</span>
                        <input type="number" min='1' value="1" class="g_itext cartBuyCount f-cartBuyCount" id="num">
                    </div>
                </div>
                <div class="fk-pd5MallActBtns">
                    <div class="buttn addbtn">
                        Add Cart
                    </div>
                    <div class="buttn butto">
                        Purchase at once
                    </div>

                </div>

            </div>
        </div>
    </div>
    <?php include "./pubilc/foot.php" ?>
</body>
<script>

    $(".fk-pd5MallActBtns").on("click",".addbtn", function () {
        var data = {
                id: "<?php echo $is['title'] ?>",
                title: "<?php echo $is['title'] ?>",
                price: "<?php echo $is['price'] ?>",
                img: "<?php echo $is['img'] ?>",
                num: $("#num").val(),
        }
        var cart = [];
        var catr_str = window.localStorage.getItem("cart");
        if(catr_str){
            cart = JSON.parse(catr_str);
        }

        cart.push(data);

        window.localStorage.setItem("cart", JSON.stringify(cart));

        alert("Add succeeded")
    })

    $(".fk-pd5MallActBtns").on("click",".butto", function () {
        var data = {
            id: "<?php echo $is['title'] ?>",
            title: "<?php echo $is['title'] ?>",
            price: "<?php echo $is['price'] ?>",
            img: "<?php echo $is['img'] ?>",
            num: $("#num").val(),
        }
        var cart = [];
        var catr_str = window.localStorage.getItem("cart");
        if(catr_str){
            cart = JSON.parse(catr_str);
        }

        cart.push(data);

        window.localStorage.setItem("cart", JSON.stringify(cart));

        window.location.href="product_checkout.php";
    })

</script>

</html>
