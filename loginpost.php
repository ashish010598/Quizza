<?php
	$conn=new mysqli("localhost","root","ashish","quizza");
	if($conn->connect_error){
		die("Connection Failed");
	}
	$email=$conn->real_escape_string($_POST["email"]);
	$password=$conn->real_escape_string($_POST["password"]);
	$query="SELECT password FROM faculty WHERE email='$email'";
	$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
    $row=mysqli_fetch_array($result);
    if($row)
    {
	if($row["password"]==$password)
		header("Location:options.php");
	else
		echo "<script type='text/javascript'>window.location.href='login.html'; alert('Invalid password'); </script>";
    }
    else
        echo "<script type='text/javascript'> alert('Email Not Signed Up');window.location.href='login.html'; </script>";
	?>