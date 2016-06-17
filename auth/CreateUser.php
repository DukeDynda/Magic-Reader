<?php
require_once("../phptemplates/ConnectDatabase.php");

$name = $_POST["name"];
$username = $_POST["username"];
$password = MD5($_POST["password"]);

$query = "INSERT INTO users (username,password,displayname) VALUES ('$username','$password','$name')";
$sql = $connection->prepare($query);
$sql->execute();

$query = "SELECT id FROM users WHERE username='$username' AND password='$password'";
$sql = $connection->prepare($query);
$sql->execute();
$sql->setFetchMode(PDO::FETCH_ASSOC);
$response = $sql->fetchAll();

$badLogin = empty($response);
if ($badLogin)
{
  header("Location: http://magicreader.bitzawolf.com/register"); // redirect to signin page
}
else
{
  $id = $response[0]["id"];
  setcookie("userID", $response[0]["id"], time() + (86400), "/");
  header("Location: http://magicreader.bitzawolf.com/Profile/index.php"); // go to user's profile page
}
?>