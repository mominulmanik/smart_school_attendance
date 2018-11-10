<?php 

session_start();

date_default_timezone_set('Asia/Dhaka');
	
	$timestamp=time()+(60*60*5.5);
	//if($timestamp==)
	
$day=gmstrftime("%d",$timestamp);

$month_name=$_SESSION['month_name'];

$database=$_SESSION['database'];

$roll=$_GET['roll'];
$class=$_SESSION['class'];
$section=$_SESSION['section'];

//echo $database;



$db=mysqli_connect("localhost","root","",$database);


$query="UPDATE `$month_name` SET `$day`='A' WHERE `class`='$class' AND `section`='$section' AND `roll`='$roll'";

if(mysqli_query($db,$query))
	header("Location:index.php");
echo mysql_error();

?>