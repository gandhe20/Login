<?php 
	 
	include("connect2.php");
	include("function2.php");
	
	$error="";
	if(isset($_POST['savepass'] ))
	{
		$password=$_POST['password'];
		$confirmPassword=$_POST['passwordConfirm'];
		
		if(strlen($password) < 8)
		{
			$error="Password must be greater than 8 characters";
		}
		else if($password !== $confirmPassword)
		{
			$error=" Password does not match";
		}
		else
		{
			$email=$_SESSION['email'];  
			
			if(mysqli_query($connect2,"UPDATE user2 SET password='$password' WHERE email='$email'"))
			{
				$error="Password changed successfully,<a href='profile2.php'> Click here </a>to go to the Profile";
			}
		}
	}
	if(logged_in())
	{
		
	?> 
		<?php echo $error; ?>
		<form method="POST" action="changepassword2.php">
		<label>New Password:</label><br/>
		<input type="password" name="password" /> <br/> <br/>
		
		<label>Re-enter Password:</label><br/>
		<input type="password" name="passwordConfirm" /><br/><br/>
		<input type="submit" name="savepass" value="save" /><br/><br/>
	
	<?php
	}
	else
	{
		header("location:profile2.php");
	}