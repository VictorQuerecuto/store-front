<?php
require 'db_connection.php';
require 'sms_header.php';
 
//Prepare the select statement.
$stmt = $conn->prepare("SELECT discountID, itemID, created, expires, percent FROM discount");
// TODO need to add WHERE to statement to get only expired discounts
$stmt->execute();
 
//Retrieve the rows using fetchAll.
$discounts = $stmt->fetchAll();

// close connection
$conn = null;
?> 
<!DOCTYPE html>
<html>
	<head>
		<title>SMS - Expired Discounts</title>
	</head>
	<body>
		<form method = "POST" action = "SMS_print_orders.php">
			<div>
				<label for = "discount-select">Choose an expired discount to print orders:</label>
				<select id = "discount-select" name = "discountID">
					<?php foreach($discounts as $discount): ?>
					<option value="<?= $discount['discountID']; ?>">
						<?= $discount['discountID']; ?> 
						<?= $discount['itemID']; ?> 
						created <?= $discount['created']; ?> 
						expires <?= $discount['expires']; ?> 
						discount <?= $discount['percent'] * 100; ?>%
					</option>
					<?php endforeach; ?>
				</select>
			</div>
			<input type = "submit" value = "Print Orders">
		</form>
	</body>
</html>
