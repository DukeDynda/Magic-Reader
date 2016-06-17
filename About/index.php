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

<!--webfonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700' rel='stylesheet' type='text/css'>
<!--//webfonts-->
</head>
<style>
h3 { 
    display: block;
    font-size: 1.25em;
    margin-top: 0.57em;
    margin-bottom: 0.57em;
    margin-left: 0;
    margin-right: 0;
    font-weight: bold;
}
#div3
{
	 margin-right: 10px;
    margin-left: 10px;
}
p{
	  font-family: "Times New Roman", Times, serif;
	    text-align: justify;
    text-justify: inter-word;
	 font-size: .85em;
	  
}

ul.a {
    list-style-type: square;
	font-family: "Times New Roman", Times, serif;
	margin-left: 20px;
	 padding-top: 10px;
	  padding-bottom: 10px;
	  	 font-size: .85em;
		 
}
i { 
    font-style: italic;
}
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
					<h2>About</h2>
				</div>
		
<br/>

<div style="margin-top:1em" action="/my-handling-form-page" method="post">
    <div>
    
      <p style="font-size:1.2em">  <center>
        <em>End User Documentation</em>
      </center></p></div>
<div id=div3>
<h3> Target Audience(s) </h3>
<p> The <i>Magic Reader </i>web application is designed to serve as a productivity tool for those who lack the motivation to complete their reading. <br><br>

By providing a streamlined and easy way for its user to log their readings, organize their schedules, and be rewarded for their progress via virtual achievements, <i> Magic Reader</i> hopes to incentivize the progression of readings and motivate its users to complete their milestones by giving statistical feedback and trivial, but fun, rewards.   

</p>

<h3>Current and Prospective Features</h3>
<p>
As of the current build, <i>Magic Reader</i> is confirmed to have:
<ul class="a">
<li>
user login system recorded onto a database 
</li>
<li>
reading logging page that tracks the users start and end page and timestamp for a session
</li>
<li>
personal statistics page for each user 
</li>
</ul>

</p>
<p>
Features that will be implement and patched in the future:
<ul class="a">
<li>
ranking leaderboards to encourage friendly competition
</li>
<li> scheduling calendars 
</li>
<li> email reminders 
</li>
</ul>

</p>

<h3>Initial Use Guide</h3>
<p>To register, users must first go to the URL <strong>magicreader.bitzawolf.com</strong> and click on the button labeled ‘Register’.  <br><br> This redirects users to the registration page that asks them to populate four fields. <br><br> The first, name, is an identifier that we store on our database. The second, username, is an identifier that is unique to every account. The third and fourth fields are where users need to enter a password; they needs to enter the same password into both fields or else an error message will be displayed when they clicks the button labeled ‘Register’ at the bottom of the page.<br><br> Once they input all of the required information correctly, Users are redirected to their newly created Profile page that displays their name, their username, and the amount of points that they have accumulated reading. Their unique userID, which is stored as a cookie, is used to verify that they are logged in. <br><br> From there users can access their homepage, where they are able to access our other features, or they can logout, which destroys the cookie keeping track of their login-state.  </p><br>
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