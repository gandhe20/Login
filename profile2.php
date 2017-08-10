<?php
	
	include("connect2.php");
	include("function2.php");
		
	if(logged_in())
	{
		echo "You are logged in";
		?>
		
		<a href="changepassword2.php"> Change Password </a>
		<a href="logout2.php" style="float:right; padding:10px; margin-right:40px; background-color:#eee; color:#333; text-decoration:none;">Logout</a>
		
		
		
		<?php
		
	}
	else
	{
		header("location:login2.php");
		exit();
	}
?>