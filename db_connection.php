<?php
$servername = "localhost";
$username = "mainuser";
$password = "mainuser123!";
$db = "group_buy";

try
{
	$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e)
{
	echo "Connection failed: " . $e->getMessage();
}
?>