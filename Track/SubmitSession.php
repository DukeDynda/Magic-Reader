<?php
// Grab user id
if (!isset($_COOKIE['userID']))
{
	// no valid cookie found
}
else
{
	$userID = $_COOKIE['userID'];
}

require_once("../phptemplates/ConnectDatabase.php");
// $id = $_REQUEST["id"];
$selectedBook = $_REQUEST["bookTitle"];
$type = $_REQUEST["type"];
$pageNumber = $_REQUEST["pg"];
$time = date('y-m-d h:i:s');

// die('Title:'.$selectedBook);

// Get ISBN
mysql_connect('mysql.bitzawolf.com', 'magicreader', 'ReadingMagic');
mysql_select_db ("magicreader");
$selectedBook = mysql_real_escape_string($selectedBook);
$query = "SELECT `ISBN` FROM library WHERE `title` = '$selectedBook'";
$result = mysql_query($query) or die('Fn test86.php ERROR: ' . mysql_error());
// $num_rows_returned = mysql_num_rows($result);
$row = mysql_fetch_array($result);
$isbn = $row[0];

// die('ISBN:'.$isbn);

$query = "INSERT INTO transactions (userID,ISBN, pageNumber,time,transCode) VALUES ('$userID','$isbn','$pageNumber','$time','$type')";
$sql = $connection->prepare($query);
$sql->execute();

if ($type == 'S')
{
	$cookie_name = 'startPage';
	setcookie($cookie_name, $pageNumber, time() + (86400 * 30), '/');	// set cookie to expire in 24 hours
}
else if ($type == 'E')
{
	$startPage = $_COOKIE["startPage"];
	$endPage = $pageNumber;
	$points = $endPage - $startPage;
	unset($_COOKIE["startPage"]);	// expire cookie
	
	$query = "UPDATE users SET points = points + '$points' WHERE id = '$userID'";
	$sql = $connection->prepare($query);
	$sql->execute();
}
?>