<?php
  require_once("../phptemplates/RequireLogin.php");
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
  require("../phptemplates/ConnectDatabase.php");
	
	$userID = $_COOKIE['userID'];
	
	$query = "SELECT displayname,username,points FROM users WHERE id=$userID";
	$sql = $connection->prepare($query);
	$sql->execute();
	$sql->setFetchMode(PDO::FETCH_ASSOC);
	$user = $sql->fetchALL();
	$user = $user[0];
?>


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
<center><img src="../images/MR.png"></center>
		<div class="login" style="margin-bottom:1em">	
			<div class="ribbon-wrapper h2 ribbon-red">
				<div class="ribbon-front">
					<h2>Profile</h2>
				</div>
				<div class="ribbon-edge-topleft2"></div>
				<div class="ribbon-edge-bottomleft"></div>
			</div>
			<br/> <br/>
			<div style="text-align:center">
				<center>
					<img src="../images/Khadgar.jpg" alt="Avatar" width="60%"/>
				</center>
			</div>
			<div>
				<center>
				<p style="font-size:1.1em; margin-bottom:0">
					Hello <?php echo $user["displayname"];?>!
		</p>
		</center>
		
		<table>
			<tr>
				<td style="font-size:1.1em; font-family:comic-sans">Username: <?php echo $user["username"]?> </td>
			</tr>
		</table>

		<br/>

		<table width="100%" style="margin:auto">
			<tr>
				<td align="left" style="font-size:1em"> <?php echo $user["points"]?> Points</td>

			</tr>
		</table>
		
		<br/>
			</div>
			<br/>
           
			<a href="../Homepage/index.php">
				<div class="submit">
					<input type="submit" value="Homepage">
				</div>
			</a>
             <a href="../auth/Logout.php">
				<div class="submit">
					<input type="submit" value="Logout">
				</div>
			</a>
		</div>
		</br>
	<!--start-copyright-->
   		<div class="copy-right">
				<p>Copyright &copy; 2015  All rights  Reserved | Template by &nbsp;<a href="http://w3layouts.com">W3layouts</a></p>
		</div>
	<!--//end-copyright-->
</body>
</html>