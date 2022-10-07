<?php
session_start();

include("connection.php");
include("./functions/functions.php");

$user_data = check_login($con);

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- font-awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />

	<!-- styles css -->
	<link rel="stylesheet" href="./public/styles.css" />
	<title>Product Store</title>
</head>

<body>
	<!-- navbar start -->
	<nav class="navbar">
		<div class="nav-center">
			<!-- links -->
			<div>
				<button class="toggle-nav">
					<i class="fas fa-bars"></i>
				</button>
				<ul class="nav-links">
					<li class="nav-link">
						<h3 class="username-nav"><?php echo $user_data["username"]; ?></h3>
					</li>
					<li>
						<a href="index.php" class="nav-link">
							Home
						</a>
					</li>
					<li>
						<a href="products.php" class="nav-link">
							Products
						</a>
					</li>
					<li>
						<a href="about.html" class="nav-link">
							About
						</a>
					</li>
					<li>
						<a href="./logout.php" class="nav-link">
							logout
						</a>
					</li>
				</ul>
			</div>
			<!-- logo -->
			<!-- <img src="./images/logo.png" width="250px" class="nav-logo" alt="logo" /> -->
			<!-- cart icon -->
			<div class="toggle-container">
				<button class="toggle-cart">
					<i class="fas fa-shopping-cart"></i>
				</button>
				<span class="cart-item-count">0</span>
			</div>
		</div>
	</nav>
	<!-- navbar end -->

	<!-- hero start -->
	<section class="hero">
		<div class="hero-container">
			<a href="./products.php" class="hero-btn">
				show now
			</a>
		</div>
	</section>
	<!-- hero end -->

	<!-- sidebar start -->
	<div class="sidebar-overlay">
		<aside class="sidebar">
			<!-- close -->
			<button class="sidebar-close">
				<i class="fas fa-times"></i>
			</button>
			<!-- links -->
			<ul class="sidebar-links">
				<h3 class="username">
					<center> <?php echo $user_data["username"]; ?></center>
				</h3>
				</li>
				<li>
					<a href="index.php" class="sidebar-link">
						<i class="fas fa-home fa-fw"></i>
						home
					</a>
				</li>
				<li>
					<a href="./products.php" class="sidebar-link">
						<i class="fas fa-couch fa-fw"></i>
						products
					</a>
				</li>
				<li>
					<a href="./about.html" class="sidebar-link">
						<i class="fas fa-book fa-fw"></i>
						about
					</a>
				</li>
				<li>
					<a href="./logout.php" class="sidebar-link">
						<i class="fas fa-sign-out-alt"></i>
						logout
					</a>
				</li>
			</ul>
		</aside>
	</div>
	<!-- sidebar end -->

	<!-- cart start -->
	<div class="cart-overlay">
		<aside class="cart">
			<button class="cart-close">
				<i class="fas fa-times"></i>
			</button>
			<header>
				<h3 class="text-slanted">your bag</h3>
			</header>
			<!-- cart items -->
			<div class="cart-items">
				<!-- products will redender here when user select products -->
			</div>
			<!-- footer -->
			<footer>
				<h3 class="cart-total text-slanted">
					total : 120.25 Birr
				</h3>
				<button class="cart-checkout btn">checkout</button>
			</footer>
		</aside>
	</div>
	<!-- cart end -->

	<!-- featured products -->
	<section class="section featured">
		<div class="title">
			<h2><span>/</span> featured</h2>
		</div>
		<div class="featured-center section-center">
			<!-- <h2 class="section-loading">
        loading...
     		 </h2> -->
			<!-- single product -->
			<article class="product">
				<div class="product-container">
					<img src="./public/images/main-bcg.jpeg" class="product-img img" alt="" />

					<div class="product-icons">
						<a href="product.html?id=1" class="product-icon">
							<i class="fas fa-search"></i>
						</a>
						<button class="product-cart-btn product-icon" data-id="1">
							<i class="fas fa-shopping-cart"></i>
						</button>
					</div>
				</div>
				<footer>
					<p class="product-name">Coffee Cup</p>
					<h4 class="product-price">589.99Birr</h4>
				</footer>
			</article>
			<!-- end of single product -->
		</div>
		<a href="products.php" class="btn">
			all products
		</a>
	</section>
	<script type="module" src="./public/index.js"></script>
</body>

</html>