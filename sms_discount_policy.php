<?php
require 'db_connection.php';
require 'sms_header.php';

if(isset($_POST['percent']))
{
	$percent = htmlentities($_POST['percent']);

	// delete
	$stmt = $conn->prepare('DELETE FROM discount_policy WHERE percentID = 1');
	$stmt->execute();

	// insert
	$stmt = $conn->prepare('INSERT INTO discount_policy(percentID, percent) VALUES(1, ?)');
	$stmt->execute([$percent]);

	echo "Discount policy updated!";
}

// close connection
$conn = null;
?> 
<!DOCTYPE html>
<html>
	<head>
		<title>SMS - Discount Policy</title>
	</head>
	<body>
		<form method = "POST" action = "SMS_discount_policy.php">
			<div>
				<label>Discount Percent per Person</label>
				<input type = "number" name = "percent" step = "0.0001" required>
			<input type = "submit" value = "Update Discount Policy">
		</form>
	</body>
</html>
