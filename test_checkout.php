<?php
session_start ();
require 'connect.php';
require 'item.php';

if (isset ( $_GET ['id'] ) && !isset($_POST['update'])) {

	$result = mysqli_query ( $con, 'select * from product where id=' . $_GET ['id'] );
	$product = mysqli_fetch_object ( $result );
	$item = new Item ();
	$item->id = $product->id;
	$item->name = $product->name;
	$item->price = $product->price;
	$item->quantity = 1;
	// Check product is existing in cart
	$index = - 1;
	if (isset ( $_SESSION ['cart'] )) {
		$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
		for($i = 0; $i < count ( $cart ); $i ++)
		if ($cart [$i]->id == $_GET ['id']) {
			$index = $i;
			break;
		}
	}
	if ($index == - 1)
	$_SESSION ['cart'] [] = $item;
	else {
		$cart [$index]->quantity ++;
		$_SESSION ['cart'] = $cart;
	}
}

// Delete product in cart
if (isset ( $_GET ['index'] ) && !isset($_POST['update'])) {
	$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
	unset ( $cart [$_GET ['index']] );
	$cart = array_values ( $cart );
	$_SESSION ['cart'] = $cart;
}

// Update quantity in cart
if(isset($_POST['update'])) {
	$arrQuantity = $_POST['quantity'];

	// Check validate quantity
	$valid = 1;
	for($i=0; $i<count($arrQuantity); $i++)
	if(!is_numeric($arrQuantity[$i]) || $arrQuantity[$i] < 1){
		$valid = 0;
		break;
	}
	if($valid==1){
		$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
		for($i = 0; $i < count ( $cart ); $i ++) {
			$cart[$i]->quantity = $arrQuantity[$i];
		}
		$_SESSION ['cart'] = $cart;
	}
	else
		$error = 'Quantity is InValid';
}
?>

<?php echo isset($error) ? $error : ''; ?>


<!DOCTYPE HTML>
<!--
	Ion by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Group 14 - Store Front - Discounts</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
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
		<!-- Header -->
			<header id="header" class="skel-layers-fixed">
				<h1><a href="#">G17</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="test_index.php">Test Index</a></li>
						<li><a href="test_discount.php">Test Discount</a></li>
						<li><a href="test_checkout.php">Test Check Out</a></li>
						
						<li><a href="index.html">Home</a></li>
						<li><a href="discount.html">Discounts</a></li>
					</ul>
				</nav>
			</header>


		<!-- Main -->
		<section id="main" class="wrapper style1">
			<header class="major">
				<h2>Checkout List</h2>
			</header>
				<form method="post">
					<?php
						$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
						$s = 0;
						$index = 0;
						for($i = 0; $i < count ( $cart ); $i ++) {
							$s += $cart [$i]->price * $cart [$i]->quantity;
					?>

					<div class="container">
						<div class="row">
							<div class="8u">
								<section>
									<h2>Product: <?php echo $cart[$i]->name; ?></h2>
									<p> Price: <?php echo $cart[$i]->price; ?></p>
									<p>Discount Applied: %%%%% </p>
									<p>Qty: <input type="text" value="<?php echo $cart[$i]->quantity; ?>"style="width: 50px;" name="quantity[]"> </p>
									<p>Price with discount included: <?php echo $cart[$i]->price * $cart[$i]->quantity; ?> </p>
									<a href="test_checkout.php?index=<?php echo $index; ?>"  class="button alt" onclick="return confirm('Are you sure?')">Remove</a>
								</section>
								<hr class="major" />
							</div>
							<?php
							$index ++;
							}
							?>	
							<div class="4u">
								<section>
									<h3>Check Out</h3>
									<p>Total Price: <?php echo $s; ?></p>
									<ul class="actions">
										<li><a href="#" class="button alt">Check Out</a></li>
									</ul>
								</section>
								<a href="test_index.php">Continue Shopping</a>
							</div>
						</div>
					</div>
				</form>
		</section>

	</body>
</html>
