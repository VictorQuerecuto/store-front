<?php
$servername = "localhost:3306";
$username = "mainuser";
$password = "mainuser123!";
$db = "fundibula";

try
{
	$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Connected successfully." . '<br><br>' . htmlspecialchars("<BEGIN NON-CONN CODE>") . '<br>';
} catch (PDOException $e)
{
	echo "Connection failed: " . $e->getMessage();
}
?>