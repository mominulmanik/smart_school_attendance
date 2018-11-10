 
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

session_start();
if(isset($_SESSION['login']))
	header("Location:invalid.php");

$db=mysqli_connect("localhost","root","","super_admin");

if(isset($_POST['button']))
{
	
	$email=$_POST['email'];
	$pass=$_POST['password'];
	//echo $pass;
	$password=md5($_POST['password']);
	//echo $password;
	$type=$_POST['type'];
	//echo 'type';
	//echo $email;
	if($type=='super_admin')
		{
			if($password==md5("mominulcse13")&&$email=="mominulmanikcse13@gmail.com")
			{
				$_SESSION['login']="super_admin";
				header("Location:super_admin/home.php");
			}
		}
	elseif($type=='admin')
		{
			//echo $password;
			$sql="SELECT * FROM `admin` WHERE `Admin_email` = '$email' AND `password`='$password'";

			 $result = mysqli_query($db,$sql);
			 //var($result);
			 //if($result) echo "oook";
			 if( mysqli_num_rows($result)==1)
        	{

        		$row = mysqli_fetch_array($result);
        		if(!$row)
        			echo mysql_error();
        		else {
         			$database=$row['Database_name'];
				$school_id=$row['School_id'];

        			$_SESSION['login']="admin";
        			$_SESSION['database']=$database;
				$_SESSION['school_id']=$school_id;
      				header("Location:admin/index.php");
      			}
        	}
   // mysqli_num_rows($result);
    else $_SESSION['invalid']="Invalid email/password";
		}

elseif($type=='user')
		{
			//echo "type";
		
		$sql="SELECT *
FROM `user`
WHERE `user_email` = '$email'
AND `password` = '$password'";
			
			 $result = mysqli_query($db,$sql);
			 //var($result);

			 $num=mysqli_num_rows($result);
			 //echo $num;

			 if( $num==1)
        	{
        		

        		$row = mysqli_fetch_array($result);
        		if(!$row)
        			echo mysql_error();
        		else {
        			
         			$database=$row['school_id'];

        			$_SESSION['login']="user";
        			$_SESSION['database']=$database;
      				header("Location:user/index.php");
      			}
        	}
   // mysqli_num_rows($result);
    $_SESSION['invalid']="Invalid email/password";
    
		}		

}


?>

<body style="background-color:#DCDCDC;">	
	
				<div class="col-sm-4 col-sm-offset-4">
					<div class="login-form" style="padding-left:150px; height:400px;width:300px;"><!--login form-->
					<?php if(!empty($_SESSION['invalid']))
					echo $_SESSION['invalid']; ?>
						<h2>Login</h2>
						  <form action="login.php" method="POST">
 
                            <input type="text" name="email" placeholder="Email address" id="username" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>

                            <input type="password" name="password" placeholder="Password" id="password" required="1" style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>

                            <select name="type" placeholder="Login as" required="1" style="padding:10px;height:40px;font-size:15px;width:300px; font:Arial;margin:10px;" >
							<option value="super_admin">Super_admin</option>
							<option value="admin">Admin</option>
							<option value="user">user</option>
							</select>


                            

                            <input style="background-color:orange;padding:5px;height:40px;font-size:20px; font:Arial;margin:10px; width:100px;"
                            type="submit" name="button" value="Log In" />

                            <h5 style="width:300px">Create a new account <a href="user/register.php" style="">sign up</</a></h5>
                            
                        </form>
					</div><!--/login form-->
				</div>
			<!--/form-->
	
	
   
    
<?php //include('include/footer.php'); ?>
</body>

</html>
	
