<?php
include 'db_connection.php';

// PDO Query
$stmt = $conn->query('SELECT * FROM items');
while($row = $stmt->fetch(PDO::FETCH_OBJ))
{
	echo '<a href="https://www.amazon.com/gp/product/', htmlspecialchars($row->itemID), '">', 
		htmlspecialchars($row->itemID), '</a>' . " " . $row->name . " $" . $row->cost . '<br>';
}

// close connection
$conn = null;
?> 