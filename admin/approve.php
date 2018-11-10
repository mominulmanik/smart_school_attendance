<?php


$id=$_GET['id'];

$database=$_GET['db'];

$db=mysqli_connect("localhost","root","",$database);

$db1=mysqli_connect("localhost","root","","super_admin");

$sql1="SELECT * FROM approve where teacher_id='$id'";

$result1 = mysqli_query($db,$sql1);

$row1 = mysqli_fetch_array($result1);
//if($result1) echo mysqli_num_rows($result1);
$email=$row1['email_address'];
$name=$row1['name'];
$school_id=$row1['school_id'];
$mobile_no=$row1['mobile_no'];
$password=$row1['password'];

echo $email.$name.$school_id.$mobile_no.$password;

$sql2="INSERT INTO user(`user_email`, `teacher_id`, `name`, `school_id`, `mobile_no`, `password`) VALUES ('$email','$id','$name','$school_id','$mobile_no','$password')";

$result2=mysqli_query($db1,$sql2);

$sql3="DELETE FROM approve WHERE teacher_id='$id'";

mysqli_query($db,$sql3);

header("location:index.php");





?>