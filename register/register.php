<?php
if (isset($_COOKIE["userID"]))
{
  header("Location: http://magicreader.bitzawolf.com/Homepage/"); // go to user's profile page
}
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
<title>SMagic Reader</title>
<style>
	.error {color: #FF0000;}
</style>
<link href="../stylesheet/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Simple Login Form,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700' rel='stylesheet' type='text/css'>
<!--//webfonts-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>

var goodUserName = false;

function checkUniqueUsername()
{
  goodUserName = false;
  var username = $("#TF_Username").val();
  if (username == "")
  {
    $("#UsernameError").text("");
    return;
  }
  
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
    {
      if (xmlhttp.responseText == "available")
      {
        $("#UsernameError").text("");
        goodUserName = true;
      }
      else
      {
        $("#UsernameError").text("Username unavailable");
        goodUserName = false;
      }
    }
  }
  xmlhttp.open("GET", "http://magicreader.bitzawolf.com/auth/CheckUsernameAvailability.php?username=" + username, true);
  xmlhttp.send();
}

function verifyRegistration()
{
  var submit = true;
  if ($("#TF_Name").val() == "")
  {
    $("#NameError").text("enter name");
    submit = false;
  }
  else
  {
    $("#NameError").text("");
  }
  
  if ($("#TF_Username").val() == "")
  {
    $("#UsernameError").text("enter username");
    submit = false;
  }
  else if (! goodUserName)
  {
    submit = false;
  }
  else
  {
    $("#UsernameError").text("");
  }
  
  if ($("#TF_Password").val() == "")
  {
    $("#PasswordError").text("enter password");
    submit = false;
  }
  else
  {
    $("#PasswordError").text("");
  }
  
  if ($("#TF_PasswordVerify").val() == "" ||
      $("#TF_Password").val() != $("#TF_PasswordVerify").val())
  {
    $("#PasswordVerifyError").text("Passwords do not match");
    submit = false;
  }
  else
  {
    $("#PasswordVerifyError").text("");
  }
  
  return submit;
}
</script>

</head>
<body>

<!--/start-login-one-->
<h1><img src="../images/MR.png"><br>
Magic Reader Registration</h1>


		<div class="login">	
			<div class="ribbon-wrapper h2 ribbon-red">
				<div class="ribbon-front">
					<h2>User Registration</h2>
				</div>
				<div class="ribbon-edge-topleft2"></div>
				<div class="ribbon-edge-bottomleft"></div>
			</div>
      <form method="post" onsubmit="return verifyRegistration()" action="http://magicreader.bitzawolf.com/auth/CreateUser.php">
				<ul>
          Name <span class="error" id="NameError" style="padding-left: 15px;"></span>
          <li style="margin-top:0"><input id="TF_Name" name="name" type="text" value=""><a class="icon user"></a></li>
          
          Username <span class="error" id="UsernameError" style="padding-left: 15px;"></span>
					<li style="margin-top:0"><input id="TF_Username" name="username" type="text" class="text" value="" onchange="checkUniqueUsername()"><a class=" icon user"></a></li>
					
          Password <span class="error" id="PasswordError" style="padding-left: 15px;"></span>
					<li style="margin-top:0"><input id="TF_Password" name="password" type="password" value=""><a class=" icon lock"></a></li>
          
          Verify Password <span class="error" id="PasswordVerifyError" style="padding-left: 15px;"></span>
          <li style="margin-top:0"><input id="TF_PasswordVerify" name="confirm_password" type="password" value=""><a class=" icon lock"></a></li>
				</ul>
        <div class="submit">
          <input type="submit" value="Register">
        </div>
			</form>
      <p style="text-align: center; margin-top: -15px; padding-bottom: 10px;"><a href="../signin/index.php" style="font-size:1em">Back to Sign-In page</a></p>
		</div>
        
<!--start-copyright-->
   		<div class="copy-right">
				<p>Copyright &copy; 2015  All rights  Reserved | Template by &nbsp;<a href="http://w3layouts.com">W3layouts</a></p>
		</div>
	<!--//end-copyright-->
</body>
</html>