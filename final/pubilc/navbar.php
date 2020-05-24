<header class="navbar">
	<div class="container display-flex aflex">
		<div class="pad">
			<nav class="nav">
                <ul class="display-flex">
                    <a href="home.php">Home</a>
                    <a href="store.php">Store</a>
                    <a href="about.php">About</a>
                    <a href="product_cart.php">Cart</a>
                </ul>
		    </nav>
        </div>

        <div>
            <?php
                session_start();
                if(isset($_SESSION['countant'])){
            ?>
                    <a href="javascript:void(0);">Welcome： <?php echo $_SESSION['countant']; ?></a>
                    |
                    <a href="logout.php">logout</a>
            <?php
                }else{
            ?>
                    <a href="login.html">User</a>
                    |
                    <a href="register.html">register</a>
                    |
                    <a href="admin_login.html">Admin</a>
            <?php
                }
            ?>

        </div>
	</div>
</header>