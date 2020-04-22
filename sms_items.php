<?php
require 'db_connection.php';
require 'sms_header.php';

$stmt = $conn->prepare("SELECT itemID, name, price, description FROM item");
$stmt->execute();

//Retrieve the rows using fetchAll.
$items = $stmt->fetchAll();

// close connection
$conn = null;
?> 
<!DOCTYPE html>
<html>
	<head>
		<title>SMS - Add/Remove Items</title>
	</head>
	<body>
		<br>
		<h1>Remove Items</h1>
		<form method = "POST" action = "SMS_remove_item.php">
			<div>
				<label for = "item-select">Choose an item to remove:</label>
				<select id = "item-select" name = "itemID">
					<?php foreach($items as $item): ?>
					<option value="<?= $item['itemID']; ?>"><?= $item['itemID']; ?> 
						<?= $item['name']; ?> $<?= $item['price']; ?>  <?= $item['description']; ?>
					</option>
					<?php endforeach; ?>
				</select>
			</div>
			<input type = "submit" value = "Remove Item">
		</form>
		<h1>Add Items</h1>
		<form method = "POST" action = "SMS_add_item.php">
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
				<input type = "number" name = "price" step = "0.01" required>
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
