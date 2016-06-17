<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<link href="../../stylesheet/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Simple Login Form,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>



</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">
$(function()
{
	// alert('Document is ready');
    $('#bookSelect').change(function() {
		
	// x = x.replace(/'/g, "\\\'"); 
	var sel_Book = $(this).val();
	// var sel_Book = ($(this).val()).replace(/'/g, "\\\'");
	// alert('You picked: ' + sel_Book);
	$.ajax({
		type: "POST",
		url: "ajax_readstats.php",
		data: 'theOption=' + sel_Book,
		success: function(response)
		{
			// alert('Server-side response: ' + response);
            $('#LaDIV').html(response);
		} //END success fn
	}); //END $.ajax
	}); //END dropdown change event
}); //END document.ready
</script>

<!--webfonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700' rel='stylesheet' type='text/css'>
<!--//webfonts-->
</head>
<style>
form
{
	margin: 0 auto;
	width: auto;
	padding: 1em;
	
}

form div + div
{
	margin-top: 1em;
}

label
{
	/* Make sure all labels have the same size and alignment */
	display: inline-block;
	width: 90px;
	text-align:: right;
}

input, textarea
{
    /* To make sure that all text fields have the same font settings
       By default, textareas have a monospace font */
    font: 1em sans-serif;

    /* To give the same size to all text field */
    width: 300px;
    -moz-box-sizing: border-box;
    box-sizing: border-box;

    /* To harmonize the look & feel of text field border */
    border: 1px solid #999;
}

input:focus, textarea:focus
{
    /* To give a little highlight on active elements */
    border-color: #000;
}

textarea
{
    /* To properly align multiline text fields with their labels */
    vertical-align: top;

    /* To give enough room to type some text */
    height: 5em;

    /* To allow users to resize any textarea vertically
       It does not work on every browsers */
    resize: vertical;
}

.button {
    /* To position the buttons to the same position of the text fields */
    padding-left: 90px; /* same size as the label elements */
}
button {
    /* This extra margin represent roughly the same space as the space
       between the labels and their text fields */
    margin-left: .5em;
}
</style>

<body>

<!--/start-login-one-->
<center><img src="../../images/MR.png"></center>
		<div class="login" style="margin-bottom:1em">	
			<div class="ribbon-wrapper h2 ribbon-red">
				<div class="ribbon-front">
					<h2>Statistics </h2>
				</div>
				<div class="ribbon-edge-topleft2"></div>
				<div class="ribbon-edge-bottomleft"></div>
			</div>
			<br/>

<div style="margin-top:1em" action="/my-handling-form-page" method="post">
    <div>
      <center><p style="font-size:1.2em"><em> Review your reading statistics so far!
</em></p></center></div><br>
<div id=div3>
<?php
	if (!isset($_COOKIE['userID']))
	{
		// no valid cookie found
	}
	else
	{
		echo "Userid: ";
		$userID = $_COOKIE['userID'];
		echo $userID;
	}
?>

<form action="/my-handling-form-page" method="post">
    <div>
        <label for="username">User Name:</label><br><center>
<?php
mysql_connect('mysql.bitzawolf.com', 'magicreader', 'ReadingMagic');
mysql_select_db ("magicreader");

$sql = "SELECT displayname FROM users WHERE id = '$userID'";
$result = mysql_query($sql);
while ($row = mysql_fetch_array($result))
{
    echo $row['displayname'];
}
?></center>
    </div>

    <div>
    <label for="Book Title">Book Title:</label><br><center>
<?php
mysql_connect('mysql.bitzawolf.com', 'magicreader', 'ReadingMagic');
mysql_select_db ("magicreader");

// $sql = "SELECT DISTINCT title FROM library JOIN transactions ON library.ISBN = transactions.ISBN where transactions.userID = '$userID' ORDER BY library.title DESC";
$sql = "SELECT DISTINCT title FROM library JOIN transactions ON library.ISBN = transactions.ISBN where transactions.userID = '$userID' ORDER BY title ASC";
$result = mysql_query($sql);

echo "<select name='title' id='bookSelect'>";
echo "<option disabled selected> -- select a book to view stats -- </option>";
while ($row = mysql_fetch_array($result)) {
    // echo "<option value='" . $row['title'] . "'>" . $row['title'] . "</option>";
	echo "<option value=\"" . $row['title'] . "\">" . $row['title'] . "</option>";
}
echo "</select>";
?></center>
</div>
<!-- **** The AJAX success fn will place found results into this DIV **** -->
<div id="LaDIV"></div>
</form>




</div>
<!--<div class="otherbutton" onclick="runAjax()" >
  <input id="yolo" type="otherbutton" value = "Start" readonly="readonly">
	</div> -->

<a href="../Homepage/index.php">
				<div class="submit">
					<input type="submit" value="Home">
				</div>
			</a>
        
	<!--//end-copyright-->
</body>
</html>