<?php
require_once("../phptemplates/ConnectDatabase.php");

echo "<pre>";
print_r($_POST);
echo "</pre>";

/*
$username = $_POST["username"];
$password = MD5($_POST["password"]);

$query = "SELECT id,username,password FROM users WHERE username='$username' AND password='$password'";
$sql = $connection->prepare($query);
$sql->execute();
$sql->setFetchMode(PDO::FETCH_ASSOC);
$response = $sql->fetchAll();

$badLogin = empty($response);
if ($badLogin)
{
  header("Location: http://magicreader.bitzawolf.com/signin"); // redirect to signin page
}
else
{
  $id = $response[0]["id"];
  setcookie("userID", $response[0]["id"], time() + (86400), "/");
  header("Location: http://magicreader.bitzawolf.com/Profile/Profile.php"); // go to user's profile page
}*/

echo "Registering!";
?>