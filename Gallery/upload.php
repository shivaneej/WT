<?php
$server="localhost";
$user="root";
$pwd="";
$db="gallery";
$conn=mysqli_connect($server,$user,$pwd,$db);
if(!$conn)
{
	die("Connection failed ".mysql_connect_error());
}
if(isset($_POST['upload']))
{
	if(isset($_FILES['imgSrc']))
	{
		$img = $_FILES['imgSrc'];
		$imgName = $img['name'];
		$ext = explode(".",$imgName);
		$ext1 = strtolower(end($ext));
		$correct = array('jpg','png','jpeg','svg');
		$canUpload = 0;
		if(in_array($ext1, $correct))
		{
			if($img['error']===0)
			{
				$sql="INSERT into images values('".$imgName."')";
				$result = mysqli_query($conn,$sql);
				$fileDest='images/'.$img['name'];
	  			move_uploaded_file($img['tmp_name'], $fileDest);
	  			$canUpload=1;
			}
			else
			{
  				echo "<script type='text/javascript'>alert('Some shit happened idk!');window.location='//www.facebook.com';</script>";
  			}
		}
		else
		{
  			echo "<script type='text/javascript'>alert('You cannot upload files of this type!');window.location='//www.facebook.com';</script>";
  		}
  		if($canUpload==1)
  		{
  			header("Location: gallery.php");
  		}
  		else
  		{
  			echo "<script type='text/javascript'>alert('');window.location='//www.facebook.com';</script>";
  		}
	}
	
}

?>
