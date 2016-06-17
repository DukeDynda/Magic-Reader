<?php
	if (isset($_COOKIE["userID"]))
	{
    header("Location: http://magicreader.bitzawolf.com/Profile/Profile.php");
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
<link href="css/style.css" rel='stylesheet' type='text/css' />
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

<?php

// define variables and set to empty values
$nameErr = $passErr = "";
$name = $comment = $password = $confirm_password= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
   } else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
     }
   }
     if ($_POST["password"] == $_POST["confirm_password"]) {
	   // success!
	    $passErr = "";
	}
	else {
   		$passErr = "The password you entered was not the same";
	}
   
   if (empty($_POST["website"])) {
     $website = "";
   } else {
     $website = test_input($_POST["website"]);
     // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
     if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
       $websiteErr = "Invalid URL"; 
     }
   }
   
   if (empty($_POST["password"])) {
     $password = "";
   } else {
     $password = test_input($_POST["password"]);
   }

if (empty($_POST["confirm_password"])) {
     $password = "";
   } else {
     $password = test_input($_POST["confirm_password"]);
   }

   if (empty($_POST["comment"])) {
     $comment = "";
   } else {
     $comment = test_input($_POST["comment"]);
   }

   if (empty($_POST["gender"])) {
     $genderErr = "Gender is required";
   } else {
     $gender = test_input($_POST["gender"]);
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<!--/start-login-one-->
<h1><img src="images/MR.jpg"><br>
Magic Reader Registration</h1>

	<div>
		<center><p><a href="../signin/index.php" style="color:#000099; font-size:1.3em">Back to Sign-In page</a></p></center>
	</div>

		<div class="login">	
			<div class="ribbon-wrapper h2 ribbon-red">
				<div class="ribbon-front">
					<h2>User Registration</h2>
				</div>
				<div class="ribbon-edge-topleft2"></div>
				<div class="ribbon-edge-bottomleft"></div>
			</div>
			<form method="post" action="http://magicreader.bitzawolf.com/auth/index.php">
				<ul>
                	<li style="border:none">
                    	<span class="error">* required fields.</span>
                    </li>
                    <li style="margin-top:0">
						<input name="name" type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}"><a href="#" class="icon user"></a>
					</li>
                    <span class="error">* <?php echo $nameErr;?></span>
					<li style="margin-top:0">
						<input name="username" type="text" class="text" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" ><a href="#" class=" icon user"></a>
					</li>
                    <span class="error">* <?php echo $nameErr;?></span>
                    <span class="error"><?php echo $passErr;?></span>
					 <li style="margin-top:0">
						<input name="password" type="text" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"><a href="#" class=" icon lock"></a>
					</li>
                    <span class="error">*<?php echo $passErr;?></span>
                    <li style="margin-top:0">
						<input name="confirm_password" type="text" value="Verify Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Verify Password';}"><a href="#" class=" icon lock"></a>
					</li>
                    <span class="error">* <?php echo $emailErr;?></span>
                    <li style="margin-top:0">
                    <input name="email" type="text" class="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" ><a href="#" class=" icon user"></a>
                    </li>
                    <li>
                    <span class="error">* <?php echo $genderErr;?></span>	<br/>
                    	<input type="radio" name="avatar" <?php if(isset($avatar) && $avatar=="Wizard") echo "checked";?><br/>Wizard	<br/>
   			<input type="radio" name="avatar" <?php if(isset($avatar) && $avatar=="Witch") echo "checked";?><br/>Witch	<br/>
			<input type="radio" name="avatar" <?php if(isset($avatar) && $avatar=="Warrior") echo "checked";?><br/>Warrior	<br/>
   
                    </li>
				</ul>

			<div class="submit">
				<input type="submit" onclick="myFunction()" value="Register" >
			</div>
			</form>
		</div>
        
<!--start-copyright-->
   		<div class="copy-right">
				<p>Copyright &copy; 2015  All rights  Reserved | Template by &nbsp;<a href="http://w3layouts.com">W3layouts</a></p>
		</div>
	<!--//end-copyright-->
</body>
</html>