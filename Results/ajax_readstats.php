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
	
//Login to database (usually this is stored in a separate php file and included in each file where required)
$server = 'mysql.bitzawolf.com'; //localhost is the usual name of the server if apache/Linux.
$login = 'magicreader';
$pword = 'ReadingMagic';
$dbname = 'magicreader';
mysql_connect($server,$login,$pword) or die($connect_error); //or die(mysql_error());
mysql_select_db($dbname) or die($connect_error);

//Get value posted in by ajax
$selBook = $_POST['theOption'];
// die('You sent: ' . $selBook);

// SELECT time into @EndTime from transactions WHERE userID = 1111 AND ISBN = '9780439064873' AND time = (SELECT MAX(time) FROM transactions) limit 1;
// SELECT time into @StartTime from transactions WHERE userID = 1111 AND ISBN = '9780439064873' AND time = (SELECT MIN(time) FROM transactions) limit 1;
// select timediff(@EndTime, @StartTime);

//Run DB query
$selBook = mysql_real_escape_string($selBook);
$query = "SELECT `ISBN` FROM library WHERE `title` = '$selBook'";
$result = mysql_query($query) or die('Fn test86.php ERROR: ' . mysql_error());
$num_rows_returned = mysql_num_rows($result);
// die('Query returned ' . $num_rows_returned . ' rows.');

//Prepare response html markup
$r = '<label>ISBN:</label>';

//Parse mysql results and create response string. Response can be an html table, a full page, or just a few characters
if ($num_rows_returned > 0)
{
	while ($row = mysql_fetch_array($result))
	{
		//$isbn = $row[0];
		$r = $r.$row[0];
		// $r = $r .'<label>'.$isbn.'</label>';
		$isbn = $row[0];
	}
}
else
{
	$r = '<label>No book by that ISBN.</label>';
}
	
//Grab Total Pages Read
/*
$query = "SELECT pageNumber INTO @startPage FROM transactions WHERE userID = 'userID' AND ISBN = '$isbn' AND pageNumber = (SELECT MAX(pageNumber) FROM transactions)";
$sql = $connection->prepare($query);
$sql->execute();

$query = "SELECT pageNumber INTO @endPage FROM transactions WHERE userID = '$userID' AND ISBN = '$isbn' AND pageNumber = (SELECT MIN(pageNumber) FROM transactions)";
$sql = $connection->prepare($query);
$sql->execute();

$query = "@endpage - @startpage";
$result = mysql_query($query) or die('Fn test86.php ERROR: ' . mysql_error());
$num_rows_returned = mysql_num_rows($query);
*/

$query = "SELECT MAX(pageNumber) - MIN(pageNumber) AS TotalPages FROM transactions WHERE userID = '$userID' AND ISBN = '$isbn'";
$result = mysql_query($query) or die('Fn test86.php ERROR: ' . mysql_error());
$num_rows_returned = mysql_num_rows($result);
// die('Query returned ' . $num_rows_returned . ' rows.');

//Prepare response html markup
$r = $r.'<div><label>Pages Read:</label>';

//Parse mysql results and create response string. Response can be an html table, a full page, or just a few characters
if ($num_rows_returned > 0)
{
	while ($row = mysql_fetch_array($result))
	{
		$totalPages = $row[0];
		$r = $r.'<label>'.$totalPages.'</label></div>';
	}
}
else
{
	$r = '<label>0</label>';
}

// Grab Start Time for the book
$query = "SELECT MIN(time) from transactions WHERE userID = '$userID' AND ISBN = '$isbn'";
$result = mysql_query($query) or die('Fn test86.php ERROR: ' . mysql_error());
$num_rows_returned = mysql_num_rows($result);
// die('Query returned ' . $num_rows_returned . ' rows.');

$r = $r.'<div><label>Start Time:</label>';

//Parse mysql results and create response string. Response can be an html table, a full page, or just a few characters
if ($num_rows_returned > 0)
{
	while ($row = mysql_fetch_array($result))
	{
		$startTime = $row[0];
		$r = $r.'<label>'.$startTime.'</label></div>';
	}
}
else
{
	$r = '<label>No start time for the book</label>';
}

// Grab Start Time for the book
$query = "SELECT MAX(time) from transactions WHERE userID = '$userID' AND ISBN = '$isbn'";
$result = mysql_query($query) or die('Fn test86.php ERROR: ' . mysql_error());
$num_rows_returned = mysql_num_rows($result);
// die('Query returned ' . $num_rows_returned . ' rows.');

$r = $r.'<div><label>End Time:</label>';

//Parse mysql results and create response string. Response can be an html table, a full page, or just a few characters
if ($num_rows_returned > 0)
{
	while ($row = mysql_fetch_array($result))
	{
		$endTime = $row[0];
		$r = $r.'<label>'.$endTime.'</label></div>';
	}
}
else
{
	$r = '<label>No end time for the book</label>';
}

// Calculate total time
$readingDuration = strtotime($endTime) - strtotime($startTime);
$readingDuration = round(abs($readingDuration) / 60, 2). " minutes";
$r = $r.'<div><label>Duration:</label><label>'.$readingDuration.'</label><div>';
//The response echoed below will be inserted into the 
echo $r;
?>
