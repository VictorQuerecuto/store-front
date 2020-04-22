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
		<title>SMS - Add Item</title>
	</head>
	<body>
		<form method = "POST" action = "SMS_items.php">
			<input type = "submit" value = "Go back">
		</form>
	</body>
<html>
