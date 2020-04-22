<?php
require 'db_connection.php';
require 'sms_header.php';
?> 
<!DOCTYPE html>
<html>
	<head>
		<title>SMS - Print Orders</title>
	</head>
	<body>
		<br>
		<?php if(isset($_POST['discountID']))
		{?>
			<h1>Orders for discount code #<?php echo $_POST['discountID'];?></h1>
			<table>
				<tr>
					<th>Order ID</th>
					<th>Discount ID</th>
					<th>Customer ID</th>
					<th>Order Info</th>
					<th>Shipping Info</th>
				<?php $stmt = $conn->prepare('SELECT * FROM item_order WHERE discountID = ?');
				$stmt->execute([$_POST['discountID']]);
				$orders = $stmt->fetchAll(PDO::FETCH_OBJ);
				foreach($orders as $order)
				{
					?><tr>
						<th><?php echo htmlspecialchars($order->orderID);?></th>
						<th><?php echo htmlspecialchars($order->discountID);?></th>
						<th><?php echo htmlspecialchars($order->customerID);?></th>
						<th><?php echo htmlspecialchars($order->orderInfo);?></th>
						<th><?php echo htmlspecialchars($order->shippingInfo);?></th>
					</tr>
				<?php }?>
			</table>
		<?php $conn = null;} else { echo "Please select a discount code from 'Expired Discounts' page"; }?>
		<div>
		</div>
	</body>
</html>
