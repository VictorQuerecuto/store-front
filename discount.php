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
						<li><a href="index.php">Home</a></li>
						<li><a href="discount.php">Discount</a></li>
						<li><a href="checkout.php" class="button special">Check Out</a></li>
					</ul>
				</nav>
			</header>
			

			
			<section id="one" class="wrapper style1">
				<header class="major">
					<h2>Discount List</h2>
				</header>
				<div class="container">
					<div class="row">
						<?php while($product = mysqli_fetch_object($result)) { ?>
							
								<div class="4u">
									<section class="special box">
										<h3><?php echo $product->name;?></h3>
										<p>$<?php echo $product->price;?></p>
										<a href="checkout.php?id=<?php echo $product->id; ?>" class="button alt">Apply discount</a> 
									</section>
								</div>
							
						<?php } ?>
					</div>
				</div>
			</section>
		
		<!-- Footer -->
		<footer id="footer">
		</footer>
		
	</body>		
</html>

        