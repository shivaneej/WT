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

$sql = "SELECT DISTINCT country FROM info";
			$res = mysqli_query($conn,$sql);
			if(mysqli_num_rows($res)>0)
			{
				echo '<form action="srch.php" method="get" target="_self">';
				while($rows = mysqli_fetch_assoc($res))
				{
					echo '<input type="checkbox" name="country[]" value="'.$rows["country"].'">'.$rows["country"].'<br>';
				}
				echo '<input type="submit" name="search" value="view">';
				echo '</form>';
			}
			else
			{
				echo 'empty db';
			}
		
	
	if(isset($_GET['search']))
 {
 	$sql = 'SELECT * FROM info WHERE country IN (';
 	foreach ($_GET['country'] as $countries )
 	{
 		$sql = $sql.'"'.$countries.'",';
 	}
 	$sql = trim($sql,", ");
 	$sql = $sql.");";
 	$res = mysqli_query($conn,$sql);
 	echo "<table border='1'><tr><th>Name</th><th>Country</th><th>Gender</th></tr>";
 	while($row = mysqli_fetch_assoc($res))
 	{
 		echo "<tr><td>".$row['name']."</td><td>".$row['country']."</td><td>".$row['gender']."</td></tr>";
 	}
 	echo "</table>";
 }


?>
