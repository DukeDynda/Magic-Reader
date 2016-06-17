<?php
require_once("../phptemplates/ConnectDatabase.php");
$username = $_REQUEST["username"];

$query = "SELECT username FROM users WHERE username='$username'";
$sql = $connection->prepare($query);
$sql->execute();
$sql->setFetchMode(PDO::FETCH_ASSOC);
$response = $sql->fetchAll();

if (count($response) == 0)
  echo "available";
else
  echo "unavailable";
?>