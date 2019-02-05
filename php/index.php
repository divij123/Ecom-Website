<?php

require_once("db.php");
session_start();

if (isset($_POST['sub']))
{
	$email = mysqli_real_escape_string($conn,$_POST['uname']);
	$pass = mysqli_real_escape_string($conn,$_POST['pass']);
	$key = md5($pass);
	$query = "select * from registration where email = '$email' AND password = '$key' ";
	$result = mysqli_query($conn, $query);
	$check = mysqli_num_rows($result);
	$row  = mysqli_fetch_row($result);
	if($check==0)
	{
		echo "<script>alert ('Incorrect Email id or Password')</script>";
	}
	else
	{
		$_SESSION['logged_in'] = true;
        $_SESSION['Email'] = $email;
        $_SESSION['Profile'] = $row['4'];
        $_SESSION['Name'] = $row['1'];
        echo "<script>window.open('../index.html', '_self')</script>";
	}
}

?>