<?php

	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$dbname = 'exp1';
	$conn = mysqli_connect($host,$user,$pass,$dbname);
	if(!$conn)
	{
		die ("Connection error".mysqli_connect_error());
	}
 	if(isset($_GET['submit']))
 {
		$name =$_GET['name'];
		$country =$_GET['country'];
		$gender = $_GET['gender'];
		$sql = "INSERT INTO info VALUES ('".$name."','".$country."','".$gender."')";
		$res = mysqli_query($conn,$sql);
		if(!$res)
		{
			die('error in insertion'.mysqli_error($res));
		}
		else
		{
			echo "<script type='text/javascript'>alert('Insertion successful!');window.location='exp1.html';</script>";
		}
}

 

?>
