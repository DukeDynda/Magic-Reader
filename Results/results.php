<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>MagicReader Statistics</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
$(function()
{
	// alert('Document is ready');
    $('#bookSelect').change(function() {
	var sel_Book = $(this).val();
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
</head>
<style>
form
{
	margin: 0 auto;
	width: 400px;
	padding: 1em;
	border: 1px solid #CCC;
	border-radius: 1em;
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
      <label for="formtitle">Reading Results</label>
    </div>
    <div>
        <label for="username">User Name:</label>
<?php
mysql_connect('mysql.bitzawolf.com', 'magicreader', 'ReadingMagic');
mysql_select_db ("magicreader");

$sql = "SELECT displayname FROM users WHERE id = '$userID'";
$result = mysql_query($sql);
while ($row = mysql_fetch_array($result))
{
    echo $row['displayname'];
}
?>
    </div>

    <div>
    <label for="Book Title">Book Title:</label>
<?php
mysql_connect('mysql.bitzawolf.com', 'magicreader', 'ReadingMagic');
mysql_select_db ("magicreader");

// $sql = "SELECT DISTINCT title FROM library JOIN transactions ON library.ISBN = transactions.ISBN where transactions.userID = '$userID'";
$sql = "SELECT DISTINCT title FROM library JOIN transactions ON library.ISBN = transactions.ISBN where transactions.userID = '$userID'";
$result = mysql_query($sql);

echo "<select name='title' id='bookSelect'>";
while ($row = mysql_fetch_array($result)) {
    echo "<option value='" . $row['title'] . "'>" . $row['title'] . "</option>";
}
echo "</select>";
?>
</div>
<!-- **** The AJAX success fn will place found results into this DIV **** -->
<div id="LaDIV"></div>
</form>
</body>
</html>
