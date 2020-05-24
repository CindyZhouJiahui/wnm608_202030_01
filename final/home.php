<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Flower Store</title>

    <?php include "./pubilc/meta.php" ?>
</head>
<body>
<header>
	<h2 class="alogo">Dream of flower store</h2>
    <?php include "./pubilc/navbar.php" ?>
</header>

<div class="view-window hero" style="background-image:url(imgs/flowershop.jpg)">
	<h1>Flower Garden</h1>
	<div class="col-xs-12 col-md-6">
	</div>

	<div class="container pad" id="introduction">
		<div class="card card-soft card-light card-flat">
			<div class="grid">
				<div class="col-xs-12 col-md-12 center-child">
					<div style="max-width:75%">
						<h2>Dream of Flower Store</h2>
						<p>Looking for some flowers? 
						<span>There are some flower that you like.</span>
						<span>pretty flowers for you to choose. </span>
						<span>It will make your life wonderfully.</span>
						<span>If you like our shop please fllow us.</span>
						<span>contact us</span>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	<div class="container pad" id="categories">
		<h2>Categories</h2>
		<div class="grid gap xs-small md-large item">
			<div class="col-xs-6 col-md-3 col-lg-3">
				<a href="product_list.php?cate=Flowers">
					<div class="image-circle"><img src="imgs/whiteflower.jpg" alt=""></div>
					<figcaption>Flowers</figcaption>
				</a>
			</div>
			<div class="col-xs-6 col-md-3 col-lg-3 item">
                <a href="product_list.php?cate=Flowerbox">
					<div class="image-circle"><img src="imgs/flowerbox.jpg" alt="">
					</div>
					<figcaption>Flowerbox</figcaption>
				</a>
			</div>
			<div class="col-xs-6 col-md-3 col-lg-3 item">
                <a href="product_list.php?cate=Flowergift">
					<div class="image-circle"><img src="imgs/flowergift.jpg" alt=""></div>
					<figcaption>Flowergift</figcaption>
				</a>
			</div>
				<div class="col-xs-6 col-md-3 col-lg-3  item">
                    <a href="product_list.php?cate=Spical flower design">
					<div class="image-circle"><img src="imgs/spcialflower.jpg" alt=""></div>
					<figcaption>Spical design</figcaption>
				</a>
			</div>
        </div>
    </div>
<br>
<p>Contact us at
<br>9:00-18:00 daily
<br>Tel: 415-9999666
<br>Address:923 Folsom,San Francisco,CA</p>
<hr>
<footer text align="center">Flower Store©Copyright 2020</footer>
    <?php include "./pubilc/foot.php" ?>
</body>
</html>