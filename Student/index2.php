<?php
$server='localhost';
$user='root';
$pwd='';
$db='student_db';
$conn=mysqli_connect($server,$user,$pwd,$db);
if(!$conn)
{
	die("Connection failed");
}
if(isset($_POST['add']))
{
	$roll=$_POST['roll'];
	$name=$_POST['name'];
	$class=$_POST['class'];
	$m1=$_POST['m1'];
	$m2=$_POST['m2'];
	$m3=$_POST['m3'];
	$sql = "INSERT into student_info(rollno,name,class,m1,m2,m3) values(".$roll.",'".$name."','".$class."',".$m1.",".$m2.",".$m3.")";
	$result = mysqli_query($conn,$sql);
	if($result==true)
	{
		echo '<script type="text/javascript">alert("Inserted");window.location="index.php";</script>';
	}
	else
	{
		echo '<script type="text/javascript">alert("error");window.location="index.php";</script>';
	}
}
if(isset($_POST['del']))
{
	$roll = $_POST['rolltbd'];
	$sql = "SELECT * from student_info where rollno=".$roll;
	$res = mysqli_query($conn,$sql);
	$rows=mysqli_num_rows($res);
	if($rows==0)
	{
		echo '<script type="text/javascript">alert("Not found");window.location="index.php";</script>';
	}
	else
	{
		$sql2 = 'DELETE from student_info where rollno='.$roll;
		$res2 = mysqli_query($conn,$sql2);
		if($res2==true)
		{
			echo '<script type="text/javascript">alert("Deleted");window.location="index.php";</script>';
		}
		else
		{
			echo '<script type="text/javascript">alert("error");window.location="index.php";</script>';
		}
	}
}

?>
