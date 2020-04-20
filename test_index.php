<?php
	require 'connect.php';
	$result = mysqli_query($con, 'select * from product');
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Group 14 - Store Front </title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body id="top">

	<header id="header" class="skel-layers-fixed">
				<h1><a href="#">G14</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="test_index.php">Test Index</a></li>
						<li><a href="test_discount.php">Test Discount</a></li>
						<li><a href="test_checkout.php">Test Check Out</a></li>
						<li><a href="index.html">Home</a></li>
						<li><a href="discount.html">Discounts</a></li>
						<li><a href="checkout.html" class="button special">Check Out[%%%]</a></li>
					</ul>
				</nav>
			</header>
			

			<section id="banner">
				<div class="inner">
					<h2>Welcome to to the Store Front</h2>
					<p>Developed by group 14 </p>
				</div>
			</section>

			
			<section id="one" class="wrapper style1">
				<header class="major">
					<h2>Product List</h2>
				</header>
				<div class="container">
					<div class="row">
						<?php while($product = mysqli_fetch_object($result)) { ?>
							
								<div class="4u">
									<section class="special box">
										<h3><?php echo $product->name;?></h3>
										<p>$<?php echo $product->price;?></p>
										<a href="test_checkout.php?id=<?php echo $product->id; ?>" class="button alt">Add to Cart</a> <!--Figure out how to refresh -->
									</section>
								</div>
							
						<?php } ?>
					</div>
				</div>
			</section>
					
</html>

        