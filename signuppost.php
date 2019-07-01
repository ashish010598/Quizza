<?php
	$conn=new mysqli("localhost","root","ashish","quizza");
	if($conn->connect_error){
		die("Connection Failed");
	}
	$name=$conn->real_escape_string($_POST["name"]);
	$email=$conn->real_escape_string($_POST["email"]);
	$password=$conn->real_escape_string($_POST["password"]);
	$check="SELECT * FROM faculty WHERE email='$email'";
	$result=mysqli_query($conn,$check) or die(mysqli_error($conn));
	$row=mysqli_fetch_array($result);
	if($row)
		echo "<script type='text/javascript'>window.location.href='../login/login.html';alert('Already signed up. Try logging in.');</script>";
	else
	{
	$query="INSERT INTO faculty(name,email,password) VALUES ('".$name."','".$email."','".$password."')";
	$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
	header("Location:../login/login.html");
    }
	?>