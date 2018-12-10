<?php
$server = 'localhost';
$user='root';
$pwd='';
$db='letstravel';
$conn=mysqli_connect($server,$user,$pwd,$db);
if(!$conn)
{
	die("Error".mysqli_error());
}
$sql='SELECT FirstName,LastName,Email,Mobile from user';
$result=mysqli_query($conn,$sql);
$data=array();
$i=0;
for($i=0;$i<mysqli_num_rows($result);$i++)
{
	$data[$i]= mysqli_fetch_assoc($result);
}
echo json_encode($data);


$jsonarray = '{"Shivanee":19,"Grusha":12,"Vicky":13,"Rishik":21}';
var_dump(json_decode($jsonarray,true));
?>
