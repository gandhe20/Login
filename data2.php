<?php

	include("connect2.php");
	include("function2.php");
	 $error="";
	if(isset($_POST['submit']))
	{
		$firstName = ($_POST['fname']);
		$lastName = ($_POST['lname']);
		$email = ($_POST['email']);
		$password = $_POST['password'];
		$passwordConfirm = $_POST['passwordConfirm'];
		if(strlen($firstName) < 3)
		{
			$error ="First name is too short";

		}
		elseif(strlen($lastName) < 3) 
		{
			$error = "Last name is too short";
			
		}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$error = "Please enter valid email address";

		}
		
		elseif(strlen($password) < 8)
		{
			$error = "Password must me greater than 8 characters";

		}
		elseif(email_exists($email, $connect2))
		{
			$error ="Someone is already registered with this email"; 
		}
		elseif($password !== $passwordConfirm)
		{
			$error= "Password does not match";
		}
		else{
		if(mysqli_query($connect2,"INSERT INTO user2(firstname,secondname,email,password,passwordconfirm)VALUES('$firstName','$lastName','$email','$password','$passwordConfirm')"))
		{
		echo "You are successfully registered";
		}
	else{
			echo "NOT register some thing problem";
		}
		}
		}
		
		echo $error;
		
	?>
	