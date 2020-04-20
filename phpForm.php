<?php
require 'db_connection.php';

// insert data
if(isset($_POST['itemID']) && isset($_POST['name']) && isset($_POST['cost']))
{
	$itemID = htmlentities($_POST['itemID']);
	$name = htmlentities($_POST['name']);
	$cost = htmlentities($_POST['cost']);

	$stmt = $conn->prepare('INSERT INTO items(itemID, name, cost) VALUES(?, ?, ?)');
	$stmt->execute([$itemID, $name, $cost]);

	echo "Item added!";
}

// close connection
$conn = null;
?> 
<!DOCTYPE html>
<html>
	<head>
		<title>Example Title</title>
	</head>
	<body>
		<form method = "POST" action = "add_item.php">
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
				<input type = "number" name = "cost" required>
			</div>
			<input type = "submit" value = "Submit Item">
		</form>
	</body>
</html>
