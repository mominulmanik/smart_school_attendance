 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Attandence</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       

</head><!--/head-->



<?php  



if(isset($_POST['button']))
{
	
	$email=$_POST['email'];
	$teacher_id=$_POST['teacher_id'];
	$name=$_POST['name'];
	$school_id=$_POST['school_id'];
	$mobile_no=$_POST['mobile_no'];
	$password=md5($_POST['password']);
	$con_pass=md5($_POST['confirm_password']);
	
	$db=mysqli_connect("localhost","root","","$school_id");

	if($db)
	{
		$sql="INSERT INTO `approve` (`email_address`, `name`, `teacher_id`, `school_id`, `mobile_no`, `password`) VALUES ('$email', '$name', '$teacher_id', '$school_id', '$mobile_no', '$password')";

		$request=mysqli_query($db,$sql);

		if($request){ ?>
	<h5  style="padding-left:400px; padding-top:50px;">Approval request send to admin. After After admin approval you can log in. To log in click here <a href="/school_attandence/login.php" style="">login</</a></h5>
		<?php
		}

	}
	else echo "Invalid School_id";

	
}


?>		

<body style="background-color:#DCDCDC;">

	<form style="padding-top:100px; padding-left:400px; " action="register.php" method="POST">
	

	<h3>Registration form</h3>
		<table>
		<tr>
			<td><input type="text" name="name" placeholder="Name" id="username" required="1" style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
			</td>

		</tr>
			
		<tr>
			<td><input type="text" name="teacher_id" placeholder="ID" id="teacher_id" required="1" style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
			</td>

		</tr>
		
		<tr>
			<td><input type="email" name="email" placeholder="Email Address" id="email" required="1" style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
			</td>

		</tr>
		
		<tr>
			<td><input type="text" name="school_id" placeholder="School Id" id="school_id" required="1" style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
			</td>

		</tr>
		
		<tr>
			<td><input type="text" name="mobile_no" placeholder="Mobile No" id="mobile_no" required="1" style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
			</td>

		</tr>
		

		<tr>
		<td>
			<input type="password" name="password" placeholder="Password" id="password" required="1" style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>			
			</td>
		</tr>

		<tr>
		<td>
			<input type="password" name="confirm_password" placeholder="Confirm Password" id="password" required="1" style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>			
			</td>
		</tr>

		<tr>
			<td>
			<input style="background-color:orange" class="btn btn-primary" type="submit" name="button" value="Register" style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
			</td>
		</tr>
		</table>
		
	</form>
</body>
</html>