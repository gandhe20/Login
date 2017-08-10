<?php
$connect2=mysqli_connect("localhost","root","","new2")
or
die("could not connect");
 if(mysqli_connect_errno())
	 {
		 echo "Error occured while connecting with database".mysqli_connect_errno();
	 }
	 session_start();


?>