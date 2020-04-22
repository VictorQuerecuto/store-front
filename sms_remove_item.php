<?php
require 'db_connection.php';
require 'sms_header.php';

// delete data
if(isset($_POST['itemID']))
{
	$itemID = htmlentities($_POST['itemID']);

	$stmt = $conn->prepare('DELETE FROM item WHERE itemID = ?');
	$stmt->execute([$itemID]);

	echo "Item deleted!";
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
