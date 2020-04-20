<?php
require 'db_connection.php';

// PDO Query
$stmt = $conn->query('SELECT * FROM items');
while($row = $stmt->fetch(PDO::FETCH_OBJ))
{
	echo $row->itemID . ' <a href="https://www.amazon.com/gp/product/', 
		htmlspecialchars($row->itemID), '">(amazon link)</a> ' . $row->name . " $" . $row->cost 
		. '<br>';
}

// fetch with positional parameters
// - placeholder user input
$itemID = "B000WON1Z0";
$cost = 10.00;

$stmt = $conn->prepare('SELECT * FROM items WHERE itemID = ? AND cost = ?');
$stmt->execute([$itemID, $cost]);
$items = $stmt->fetchAll(PDO::FETCH_OBJ);

foreach($items as $item)
{
	echo $item->name . '<br>';
}

// get row count
$stmt = $conn->prepare('SELECT * FROM items WHERE cost = ?');
$stmt->execute([$cost]);
$itemCount = $stmt->rowCount();

echo $itemCount;

// insert data
$itemID = "C99WON2Y9";
$name = "Item Numero San";
$cost = 10.00;

$stmt = $conn->prepare('INSERT INTO items(itemID, name, cost) VALUES(?, ?, ?)');
$stmt->execute([$itemID, $name, $cost]);

echo "Item added!";

// update data
$itemID = "C99WON2Y9";
$name = "Item Numero San - UPDATED";

$stmt = $conn->prepare('UPDATE items SET name = ? WHERE itemID = ?');
$stmt->execute([$name, $itemID]);

echo "Item updated!";

// delete data
$itemID = "C99WON2Y9";

$stmt = $conn->prepare('DELETE FROM items WHERE itemID = ?');
$stmt->execute([$itemID]);

echo "Item deleted!"

// search data
$search = "%Thing%";
$stmt = $conn->prepare('SELECT * FROM items WHERE name LIKE ?');
$stmt->execute([$search]);
$items = $stmt->fetchAll(PDO::FETCH_OBJ);

foreach($items as $item)
{
	echo $item->name . '<br>';
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
				<input type = "text" name = "itemID">
			</div>
			<div>
				<label>Name of Item</label>
				<input type = "text" name = "name">
			</div>
			<div>
				<label>Cost of Item</label>
				<input type = "number" name = "cost">
			</div>
			<input type = "submit" value = "Submit Item">
		</form>
	</body>
</html>
