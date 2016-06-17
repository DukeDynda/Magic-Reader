<?php
require_once("../phptemplates/RequireLogin.php");
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Simple Login Form Responsive Widget Template :: w3layouts</title>
<link href="../../stylesheet/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Simple Login Form,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>



</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
var STATE_BEFORE_SESSION = 0;
var STATE_IN_SESSION = 1;
var STATE_END_SESSION = 2;
var userID = <?php if (isset($_COOKIE["userID"])) echo $_COOKIE["userID"]; else echo "-1"; ?> <!-- This php snippet either sets the javascript variable userID to the value stored in the cookie if the cookie is present. If the cookie is not present, then the javascript variable gets the value '-1'. Ideally, up above there is php code the prevents this page from being loaded if the user is not logged in altogether. -->

var state = STATE_BEFORE_SESSION;

function regex_escape(str) {
    return str.replace(new RegExp('[.\\\\+*?\\[\\^\\]$(){}=!<>|:\\-]', 'g'), '\\$&');
}

function runAjax()
{
  if (state == STATE_BEFORE_SESSION)
  {
    if ($("#input_Page").val() == "")
    {
      return;
    }
    
    state = STATE_IN_SESSION;
    $("#Heading").text("Currently Reading");
    setEnabled("#input_Page", false);
    setEnabled("#input_PageEnd", true);
     document.getElementById('yolo').value = "end";
	 bookTitle = $("#bookSelect option:selected").text();
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
      {
        if (xmlhttp.responseText != "")
        {
          alert(xmlhttp.responseText);
        }
      }
    }
    var pageNum = $("#input_Page").val();
	bookTitle = regex_escape(bookTitle);
    xmlhttp.open("GET", "SubmitSession.php?id=" + userID + "&bookTitle=" + bookTitle + "&type=S&pg=" + pageNum, true);
    xmlhttp.send();
  }
  else if (state == STATE_IN_SESSION)
  {
    if ($("#input_PageEnd").val() == "")
    {
      return;
    }
    
    state = STATE_END_SESSION;
    $("#Heading").text("Finished Reading");
    setEnabled("#input_PageEnd", false);
    $("#button").attr("disabled", true);
    
    var xmlhttp = new XMLHttpRequest();
    var pageNum = $("#input_PageEnd").val();
    // xmlhttp.open("GET", "SubmitSession.php?id=" + userID + "&type=E&pg=" + pageNum, true);
	// alert(bookTitle);
	xmlhttp.open("GET", "SubmitSession.php?id=" + userID + "&bookTitle=" + bookTitle + "&type=E&pg=" + pageNum, true);
    xmlhttp.send();
  }
  else if (state == STATE_END_SESSION)
  {
    
  }
}

function setEnabled(id, enabled)
{
  $(id).attr("disabled", !enabled);
  if (enabled)
  {
    $(id).css("background-color", "#CFF");
    $(id).css("border-color", "#CFF");
  }
  else
  {
    $(id).css("background-color", "#999");
    $(id).css("border-color", "#999");
  }
}
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
	border: 0px solid #CCC;
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
    color: white;
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
					<h2>Reading Logger</h2>
				</div>
				<div class="ribbon-edge-topleft2"></div>
				<div class="ribbon-edge-bottomleft"></div>
			</div>
			<br/>

<div style="margin-top:1em" action="/my-handling-form-page" method="post">
    <div style="width:auto">
      <center><p style="font-size:1.2em"><em> Please select a title  for your library and start your session!
</em></p></center></div>
<div  style="width:auto"><form>
  <center><label>Book Title</label><br>
 <?php
mysql_connect('mysql.bitzawolf.com', 'magicreader', 'ReadingMagic');
mysql_select_db ("magicreader");

$sql = "SELECT title, isbn FROM library ORDER BY title ASC";
$result = mysql_query($sql);

echo "<select name='title' id='bookSelect'  style=''width: auto''>";
while ($row = mysql_fetch_array($result)) {
    // echo "<option value='" . $row['title'] . "'>" . $row['title'] . "</option>";
	echo "<option value=\"" . $row['title'] . "\">" . $row['title'] . "</option>";
}
echo "</select>";
?></center><br>
  <center>
  <span>Start Page</span><br>
  <input id="input_Page" type="text" value = ""/ style="background-color:#CCFFFF; color:black; border: 3px inset #CCFFFF; padding: 5px; width: auto;">  <br/>
  <span>End Page</span><br>
  <input id="input_PageEnd" type="text" value = "" disabled / style="background-color:#999; color:black; border: 3px inset #999; padding: 5px; width:auto;"></center>

  
</form>
<div class="otherbutton" onclick="runAjax()" >
  <input id="yolo" type="otherbutton" value = "Start" readonly>
	</div>

<a href="../Homepage/index.php">
				<div class="submit">
					<input type="submit" value="Home">
				</div>
			</a>
        
	<!--//end-copyright-->
</body>
</html>