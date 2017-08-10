<?php

	function email_exists($email,$connect2)
	{
		$result=mysqli_query($connect2,"SELECT id FROM user2 WHERE email='$email'");
		if(mysqli_num_rows($result)!=0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function logged_in()
	{
		if(isset($_SESSION['email'])|| isset($_COOKIE['email']))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	?>