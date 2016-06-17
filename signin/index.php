<?php
if (isset($_COOKIE["userID"]))
  header("Location: http://magicreader.bitzawolf.com/Homepage/");
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
<link href="../stylesheet/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Simple Login Form,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<!--webfonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700' rel='stylesheet' type='text/css'>
<!--//webfonts-->
</head>
<body>

<!--/start-login-one-->
<h1><img src="../images/MR.png"><br>
Magic Reader Sign-In</h1>
		<div class="login" style="margin-bottom:1em">	
			<div class="ribbon-wrapper h2 ribbon-red">
				<div class="ribbon-front">
					<h2>User Login</h2>
				</div>
				<div class="ribbon-edge-topleft2"></div>
				<div class="ribbon-edge-bottomleft"></div>
			</div>
			<form method="post" action="http://magicreader.bitzawolf.com/auth/index.php">
				<ul>
					<li>
						<input name="username" type="text" class="text" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" ><a href="#" class=" icon user"></a>
					</li>
					 <li>
						<input name="password" type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"><a href="#" class=" icon lock"></a>
					</li>
				</ul>

			<div class="submit">
				<input type="submit" onclick="myFunction()" value="Log in" >
			</div>
			</form>

      <div>
        <center>
          <p>Don't have an account yet?</p>
          <a href="../register/register.php" style="font-size:1.5em; color:#000099">Create Account</a>
        </center>
      </div>
		</div>
		</br>
<!--start-copyright-->
   		<div class="copy-right">
				<p>Copyright &copy; 2015  All rights  Reserved | Template by &nbsp;<a href="http://w3layouts.com">W3layouts</a></p>
		</div>
	<!--//end-copyright-->
</body>
</html>