<?php
require 'db_connection.php';
require 'sms_header.php';

// insert data
if(isset($_POST['itemID']) && isset($_POST['name']) && isset($_POST['price']))
{
	$itemID = htmlentities($_POST['itemID']);
	$name = htmlentities($_POST['name']);
	$price = htmlentities($_POST['price']);
	$image = htmlentities($_POST['image']);
	$description = htmlentities($_POST['description']);

	$stmt = $conn->prepare('INSERT INTO item(itemID, name, price, image, description) VALUES(?, ?, ?, ?, ?)');
	$stmt->execute([$itemID, $name, $price, $image, $description]);

	echo "Item added!";
}

// close connection
$conn = null;
?> 
<!DOCTYPE html>
<html>
	<head>
		<title>SMS - Add/Remove Items</title>
	</head>
	<body>
		<form method = "POST" action = "SMS_items.php">
			<div>
				<label>Item ID</label><br>
				<input type = "text" name = "itemID" required>
			</div>
			<div>
				<label>Name of Item</label>
				<input type = "text" name = "name" required>
			</div>
			<div>
				<label>Cost of Item</label>
				<input type = "number" name = "price" required>
			</div>
			<div>
				<label>Image of Item</label>
				<input type = "text" name = "image" required>
			</div>
			<div>
				<label>Description of Item</label>
				<input type = "text" name = "description" required>
			</div>
			<input type = "submit" value = "Submit Item">
		</form>
	</body>
</html>
