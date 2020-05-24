<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flower Store</title>
    <?php include "./pubilc/meta.php" ?>
    <style>
        select{
            height: 38px;
        }
        input[type="submit"]{
            height: 38px;
            width: 80px
        }
    </style>
</head>
<body>
<header>
    <h2 class="alogo">Dream of flower store</h2>
    <?php include "./pubilc/navbar.php" ?>
</header>
    <?php
        if(!isset($_GET['categories'])){
            $_GET['categories'] = "";
        }

        if(!isset($_GET['sort'])){
            $_GET['sort'] = "0";
        }
    ?>
    <div class="container pad" id="categories">
        <form action="" method="GET">
            <select name="categories">
                <option value ="" <?php echo $_GET['categories'] == ''?'selected':'' ?>>All Product</option>
                <option value="Flowers" <?php echo $_GET['categories'] == 'Flowers'?'':'' ?>>Flowers</option>
                <option value="Flowerbox" <?php echo $_GET['categories'] == 'Flowerbox'?'selected':'' ?>>Flowerbox</option>
                <option value="Flowergift" <?php echo $_GET['categories'] == 'Flowergift'?'selected':'' ?>>Flowergift</option>
                <option value="Spical flower design" <?php echo $_GET['categories'] == 'Spical flower design'?'selected':'' ?>>Spical flower design</option>
            </select>
            <select name="sort">
                <option value ="0" <?php echo $_GET['sort']?'':'selected' ?>>high-low</option>
                <option value="1" <?php echo $_GET['sort']?'selected':'' ?>>low-high</option>
            </select>
            <input type="submit" value="select" >
        </form>

        <h2><?php $_GET['categories'] == ''?'All Product':$_GET['categories'] ?></h2>
        <div class="grid gap xs-small md-large addprods">
            <?php
                include "./phps.php";

                $phps = new phps();

                $phps->select($_GET['categories'], $_GET['sort']);
            ?>
        </div>
    </div>

    <?php include "./pubilc/foot.php" ?>
</body>
</html>
