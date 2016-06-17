<?php
$serverhost = "mysql.bitzawolf.com";
$username = "magicreader";
$password = "ReadingMagic";
$databasename = "magicreader";
$connection;

try
{
	$connection = new PDO("mysql:host=$serverhost;dbname=$databasename", $username, $password);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo "Connection failed: " . $e->getMessage();
}
?>