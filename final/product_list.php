<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flower Store</title>
    <?php include "./pubilc/meta.php" ?>
</head>
<body>
    <?php include "./pubilc/navbar.php" ?>

    <?php
        include "./phps.php";

        $categories = $_GET['cate'];
        if(!$categories){
            header("location:home.php");
            die;
        }

        $phps = new phps();

        $result = $phps->getCateData($categories);

    ?>

    <div class="container pad">
        <div class="grid gap xs-small md-large">
<!--            <div class="col-xs-6 col-md-3">-->
<!--                <a href="product_item.php?id=">-->
<!--                    <div class="image-circle"><img src="imgs/whiteflower.png" alt=""></div>-->
<!--                    <figcaption>Flowers</figcaption>-->
<!--                </a>-->
<!--            </div>-->

            <?php
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-xs-6 col-md-3">
                                <a href="product_item.php?id='.(int)$row["id"].'">
                                    <div class="image-circle"><img src="'.$row["img"].'" alt=""></div>
                                    <figcaption>'.$row["title"].'&nbsp;&nbsp;$'.$row["price"].'</figcaption>
                                </a>
                            </div>';
                }
            } else {
                echo "No Data";
            }
            ?>
        </div>
    </div>
    <?php include "./pubilc/foot.php" ?>

</body>
</html>
