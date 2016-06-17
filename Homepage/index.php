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
<center><img src="../images/MR.png"><br/></center>
		<div class="login" style="margin-bottom:1em">	
			<div class="ribbon-wrapper h2 ribbon-red">
				<div class="ribbon-front">
					<h2>Homepage</h2>
				</div>
				<div class="ribbon-edge-topleft2"></div>
				<div class="ribbon-edge-bottomleft"></div>
			</div>
			<br/>
			<br/>
			<div style="text-align:center">
				<center>
					<img src="../images/Khadgar.jpg" alt="Avatar" width="60%"/>
				</center>
			</div>
			<br/>
			<?php
			if (isset($_COOKIE["userID"]))
			{
			?>
      <a href="../Profile/index.php">
				<div class="submit">
					<input type="submit" value="Profile">
				</div>
			</a>
			<a href="../Track/index.php">
				<div class="submit">
					<input type="submit" value="Reading Logger">
				</div>
			</a>
			<a href="../Results/index.php">
				<div class="submit">
					<input type="submit" value="Your Statistics">
				</div>
			</a>
            <a href="../About/index.php">
				<div class="submit">
					<input type="submit" value="About">
				</div>
			</a>
                        <a href="../auth/Logout.php">
				<div class="submit">
					<input type="submit" value="Logout">
				</div>
			</a>
			<?php
			}
			else
			{
			?>
      <a href="../signin/index.php">
				<div class="submit">
					<input type="submit" value="Signin">
				</div>
			</a>
      <a href="../register/register.php">
				<div class="submit">
					<input type="submit" value="Register">
				</div>
			</a>
             <a href="../About/index.php">
				<div class="submit">
					<input type="submit" value="About">
				</div>
			</a>
			<?php
			}
			?>
			</div>
		</br>
	<!--start-copyright-->
   		<div class="copy-right">
				<p>Copyright &copy; 2015  All rights  Reserved | Template by &nbsp;<a href="http://w3layouts.com">W3layouts</a></p>
		</div>
	<!--//end-copyright-->
</body>
</html>