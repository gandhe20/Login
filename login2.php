<?php
	include("connect2.php");
	include("function2.php");
	
	if(logged_in())
	{
		header("location: profile2.php");
		exit();
	}

	
		if(isset($_POST['submit']))
	{
		
		$email = ($_POST['email']);
		$password = ($_POST['password']);
		$checkbox = isset($_POST['keep']);
		if(email_exists($email, $connect2))
		{
			$result = mysqli_query($connect2, "SELECT password FROM user2 WHERE email='$email'");
			$retrievepassword = mysqli_fetch_assoc($result);

			if($password!== $retrievepassword['password'])
			{
				$error = "Password is incorrect";
			}
			else
			{
				$_SESSION['email'] = $email;

				if($checkbox == "on")
				{
					setcookie("email",$email, time()+3600);
				}
				header("location: profile2.php");
			}
		}
		else
		{
			$error = "Email does not exists";
		}
		}
		
	
	?>
	
	<html>
<head>
	<title>Login Page</title> 
</head>
<body>
		
			<a href="register2.html">Sign Up</a>
			<a href="login2.php">Login</a><br>
		

	<form method="POST" action="login2.php">
<label>Email</label>
<input type="text" class="inputFields" name="email" required/><br/><br/>
  

<label>Password</label>
<input type="password" class="inputFields" name="password" required/><br/><br/>

<input type="checkbox" name="Keep">
<label>Keep me logged in</label><br/><br/>
<input type="submit" class="theButtons" name="submit" value="login"/>
</form>

</body>
</html>
