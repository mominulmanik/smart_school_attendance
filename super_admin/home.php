
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
if($_SESSION['login']!="super_admin")
	header("Location:/school_attandence/login.php");

$db=mysqli_connect("localhost","root","","");

if(isset($_POST['button'])){

$database=$_POST['database_name'];
$email=$_POST['email'];
$school_name=$_POST['school_name'];
$mobile_no=$_POST['mobile_no'];

$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%*";
$pass = substr( str_shuffle( $chars ), 0, 8 );
echo $pass;
$password=md5($pass);

$msg="Congratulation, You have registered as an admin of school_attandence system. Your email address is : ".$email.". Your password is: ".$pass.". Enjoy this system .Thank you for being an user of this system.";

$db2=mysqli_connect("localhost","root","","super_admin");

$sql="INSERT INTO `admin` (`Admin_email`, `School_id`, `Database_name`, `Mobile_no`,`password`) VALUES ('$email', '$school_name', '$database', '$mobile_no','$password');";
if(mysqli_query($db2,$sql)){

$query="CREATE DATABASE $database ";

$f=mysqli_query($db,$query);

if($f)
	{
	echo "ok";
		try{
                $soapClient = new SoapClient("http://api.onnorokomsms.com/sendsms.asmx?wsdl");
                $paramArray = array(
                'userName'=>"01521487473",
                'userPassword'=>"85818",
                'mobileNumber'=> $mobile_no,
                'smsText'=>$msg,
                'type'=>"1",
                'maskName'=> "",
                'campaignName'=>"",
                );
                $value = $soapClient->__call("OneToOne", array($paramArray));
                } catch (dmException $e) {
                 echo $e;
            }




	$db1=mysqli_connect("localhost","root","",$database);


			$student=" CREATE TABLE `student_info` (`student_name` varchar( 200 ) NOT NULL , `roll` int( 200 ) NOT NULL ,`class` varchar( 200 ) NOT NULL , `section` varchar( 200 ) NOT NULL ,`mobile_no` varchar( 30 ) NOT NULL ) ";

			$approve=" CREATE TABLE `approve` (`email_address` varchar( 200 ) NOT NULL , `name` varchar( 200 ) NOT NULL ,`teacher_id` varchar( 200 ) NOT NULL , `school_id` varchar( 200 ) NOT NULL ,`mobile_no` varchar( 30 ) NOT NULL ,`password` varchar( 100 ) NOT NULL ) ";

			$class=" CREATE TABLE `class` (`id` int( 11 ) NOT NULL , `class` varchar( 200 ) NOT NULL )";
					

		$sql1="CREATE TABLE `january` (`roll` int( 200 ) NOT NULL , `class` varchar( 200 ) NOT NULL ,`section` varchar( 200 ) NOT NULL , `mobile_no` varchar( 30 ) NOT NULL ,`01` varchar( 10 ) NOT NULL, `02` varchar( 10 ) NOT NULL, `03` varchar( 10 ) NOT NULL, `04` varchar( 10 ) NOT NULL, `05` varchar( 10 ) NOT NULL, `06` varchar( 10 ) NOT NULL, `07` varchar( 10 ) NOT NULL, `08` varchar( 10 ) NOT NULL, `09` varchar( 10 ) NOT NULL, `10` varchar( 10 ) NOT NULL, `11` varchar( 10 ) NOT NULL, `12` varchar( 10 ) NOT NULL, `13` varchar( 10 ) NOT NULL, `14` varchar( 10 ) NOT NULL, `15` varchar( 10 ) NOT NULL, `16` varchar( 10 ) NOT NULL, `17` varchar( 10 ) NOT NULL, `18` varchar( 10 ) NOT NULL, `19` varchar( 10 )NOT NULL, `20` varchar( 10 ) NOT NULL, `21` varchar( 10 ) NOT NULL, `22` varchar( 10 ) NOT NULL, `23` varchar( 10 ) NOT NULL, `24` varchar( 10 ) NOT NULL, `25` varchar( 10 ) NOT NULL, `26` varchar( 10 ) NOT NULL, `27` varchar( 10 ) NOT NULL, `28` varchar( 10 ) NOT NULL, `29` varchar( 10 ) NOT NULL, `30` varchar( 10 ) NOT NULL, `31` varchar( 10 ) NOT NULL, `total` int(10) NOT NULL)";


		$sql2="CREATE TABLE `february` (`roll` int( 200 ) NOT NULL , `class` varchar( 200 ) NOT NULL ,`section` varchar( 200 ) NOT NULL , `mobile_no` varchar( 30 ) NOT NULL ,`01` varchar( 10 ) NOT NULL, `02` varchar( 10 ) NOT NULL, `03` varchar( 10 ) NOT NULL, `04` varchar( 10 ) NOT NULL, `05` varchar( 10 ) NOT NULL, `06` varchar( 10 ) NOT NULL, `07` varchar( 10 ) NOT NULL, `08` varchar( 10 ) NOT NULL, `09` varchar( 10 ) NOT NULL, `10` varchar( 10 ) NOT NULL, `11` varchar( 10 ) NOT NULL, `12` varchar( 10 ) NOT NULL, `13` varchar( 10 ) NOT NULL, `14` varchar( 10 ) NOT NULL, `15` varchar( 10 ) NOT NULL, `16` varchar( 10 ) NOT NULL, `17` varchar( 10 ) NOT NULL, `18` varchar( 10 ) NOT NULL, `19` varchar( 10 )NOT NULL, `20` varchar( 10 ) NOT NULL, `21` varchar( 10 ) NOT NULL, `22` varchar( 10 ) NOT NULL, `23` varchar( 10 ) NOT NULL, `24` varchar( 10 ) NOT NULL, `25` varchar( 10 ) NOT NULL, `26` varchar( 10 ) NOT NULL, `27` varchar( 10 ) NOT NULL, `28` varchar( 10 ) NOT NULL, `total` int(10) NOT NULL)";



		$sql3="CREATE TABLE `march` (`roll` int( 200 ) NOT NULL , `class` varchar( 200 ) NOT NULL ,`section` varchar( 200 ) NOT NULL , `mobile_no` varchar( 30 ) NOT NULL ,`01` varchar( 10 ) NOT NULL, `02` varchar( 10 ) NOT NULL, `03` varchar( 10 ) NOT NULL, `04` varchar( 10 ) NOT NULL, `05` varchar( 10 ) NOT NULL, `06` varchar( 10 ) NOT NULL, `07` varchar( 10 ) NOT NULL, `08` varchar( 10 ) NOT NULL, `09` varchar( 10 ) NOT NULL, `10` varchar( 10 ) NOT NULL, `11` varchar( 10 ) NOT NULL, `12` varchar( 10 ) NOT NULL, `13` varchar( 10 ) NOT NULL, `14` varchar( 10 ) NOT NULL, `15` varchar( 10 ) NOT NULL, `16` varchar( 10 ) NOT NULL, `17` varchar( 10 ) NOT NULL, `18` varchar( 10 ) NOT NULL, `19` varchar( 10 )NOT NULL, `20` varchar( 10 ) NOT NULL, `21` varchar( 10 ) NOT NULL, `22` varchar( 10 ) NOT NULL, `23` varchar( 10 ) NOT NULL, `24` varchar( 10 ) NOT NULL, `25` varchar( 10 ) NOT NULL, `26` varchar( 10 ) NOT NULL, `27` varchar( 10 ) NOT NULL, `28` varchar( 10 ) NOT NULL, `29` varchar( 10 ) NOT NULL, `30` varchar( 10 ) NOT NULL, `31` varchar( 10 ) NOT NULL, `total` int(10) NOT NULL)";



		$sql4="CREATE TABLE `april` (`roll` int( 200 ) NOT NULL , `class` varchar( 200 ) NOT NULL ,`section` varchar( 200 ) NOT NULL , `mobile_no` varchar( 30 ) NOT NULL ,`01` varchar( 10 ) NOT NULL, `02` varchar( 10 ) NOT NULL, `03` varchar( 10 ) NOT NULL, `04` varchar( 10 ) NOT NULL, `05` varchar( 10 ) NOT NULL, `06` varchar( 10 ) NOT NULL, `07` varchar( 10 ) NOT NULL, `08` varchar( 10 ) NOT NULL, `09` varchar( 10 ) NOT NULL, `10` varchar( 10 ) NOT NULL, `11` varchar( 10 ) NOT NULL, `12` varchar( 10 ) NOT NULL, `13` varchar( 10 ) NOT NULL, `14` varchar( 10 ) NOT NULL, `15` varchar( 10 ) NOT NULL, `16` varchar( 10 ) NOT NULL, `17` varchar( 10 ) NOT NULL, `18` varchar( 10 ) NOT NULL, `19` varchar( 10 )NOT NULL, `20` varchar( 10 ) NOT NULL, `21` varchar( 10 ) NOT NULL, `22` varchar( 10 ) NOT NULL, `23` varchar( 10 ) NOT NULL, `24` varchar( 10 ) NOT NULL, `25` varchar( 10 ) NOT NULL, `26` varchar( 10 ) NOT NULL, `27` varchar( 10 ) NOT NULL, `28` varchar( 10 ) NOT NULL, `29` varchar( 10 ) NOT NULL, `30` varchar( 10 ) NOT NULL, `total` int(10) NOT NULL)";


		$sql5="CREATE TABLE `may` (`roll` int( 200 ) NOT NULL , `class` varchar( 200 ) NOT NULL ,`section` varchar( 200 ) NOT NULL , `mobile_no` varchar( 30 ) NOT NULL ,`01` varchar( 10 ) NOT NULL, `02` varchar( 10 ) NOT NULL, `03` varchar( 10 ) NOT NULL, `04` varchar( 10 ) NOT NULL, `05` varchar( 10 ) NOT NULL, `06` varchar( 10 ) NOT NULL, `07` varchar( 10 ) NOT NULL, `08` varchar( 10 ) NOT NULL, `09` varchar( 10 ) NOT NULL, `10` varchar( 10 ) NOT NULL, `11` varchar( 10 ) NOT NULL, `12` varchar( 10 ) NOT NULL, `13` varchar( 10 ) NOT NULL, `14` varchar( 10 ) NOT NULL, `15` varchar( 10 ) NOT NULL, `16` varchar( 10 ) NOT NULL, `17` varchar( 10 ) NOT NULL, `18` varchar( 10 ) NOT NULL, `19` varchar( 10 )NOT NULL, `20` varchar( 10 ) NOT NULL, `21` varchar( 10 ) NOT NULL, `22` varchar( 10 ) NOT NULL, `23` varchar( 10 ) NOT NULL, `24` varchar( 10 ) NOT NULL, `25` varchar( 10 ) NOT NULL, `26` varchar( 10 ) NOT NULL, `27` varchar( 10 ) NOT NULL, `28` varchar( 10 ) NOT NULL, `29` varchar( 10 ) NOT NULL, `30` varchar( 10 ) NOT NULL, `31` varchar( 10 ) NOT NULL, `total` int(10) NOT NULL)";



		$sql6="CREATE TABLE `june` (`roll` int( 200 ) NOT NULL , `class` varchar( 200 ) NOT NULL ,`section` varchar( 200 ) NOT NULL , `mobile_no` varchar( 30 ) NOT NULL ,`01` varchar( 10 ) NOT NULL, `02` varchar( 10 ) NOT NULL, `03` varchar( 10 ) NOT NULL, `04` varchar( 10 ) NOT NULL, `05` varchar( 10 ) NOT NULL, `06` varchar( 10 ) NOT NULL, `07` varchar( 10 ) NOT NULL, `08` varchar( 10 ) NOT NULL, `09` varchar( 10 ) NOT NULL, `10` varchar( 10 ) NOT NULL, `11` varchar( 10 ) NOT NULL, `12` varchar( 10 ) NOT NULL, `13` varchar( 10 ) NOT NULL, `14` varchar( 10 ) NOT NULL, `15` varchar( 10 ) NOT NULL, `16` varchar( 10 ) NOT NULL, `17` varchar( 10 ) NOT NULL, `18` varchar( 10 ) NOT NULL, `19` varchar( 10 )NOT NULL, `20` varchar( 10 ) NOT NULL, `21` varchar( 10 ) NOT NULL, `22` varchar( 10 ) NOT NULL, `23` varchar( 10 ) NOT NULL, `24` varchar( 10 ) NOT NULL, `25` varchar( 10 ) NOT NULL, `26` varchar( 10 ) NOT NULL, `27` varchar( 10 ) NOT NULL, `28` varchar( 10 ) NOT NULL, `29` varchar( 10 ) NOT NULL, `30` varchar( 10 ) NOT NULL, `total` int(10) NOT NULL)";

		$sql7="CREATE TABLE `july` (`roll` int( 200 ) NOT NULL , `class` varchar( 200 ) NOT NULL ,`section` varchar( 200 ) NOT NULL , `mobile_no` varchar( 30 ) NOT NULL ,`01` varchar( 10 ) NOT NULL, `02` varchar( 10 ) NOT NULL, `03` varchar( 10 ) NOT NULL, `04` varchar( 10 ) NOT NULL, `05` varchar( 10 ) NOT NULL, `06` varchar( 10 ) NOT NULL, `07` varchar( 10 ) NOT NULL, `08` varchar( 10 ) NOT NULL, `09` varchar( 10 ) NOT NULL, `10` varchar( 10 ) NOT NULL, `11` varchar( 10 ) NOT NULL, `12` varchar( 10 ) NOT NULL, `13` varchar( 10 ) NOT NULL, `14` varchar( 10 ) NOT NULL, `15` varchar( 10 ) NOT NULL, `16` varchar( 10 ) NOT NULL, `17` varchar( 10 ) NOT NULL, `18` varchar( 10 ) NOT NULL, `19` varchar( 10 )NOT NULL, `20` varchar( 10 ) NOT NULL, `21` varchar( 10 ) NOT NULL, `22` varchar( 10 ) NOT NULL, `23` varchar( 10 ) NOT NULL, `24` varchar( 10 ) NOT NULL, `25` varchar( 10 ) NOT NULL, `26` varchar( 10 ) NOT NULL, `27` varchar( 10 ) NOT NULL, `28` varchar( 10 ) NOT NULL, `29` varchar( 10 ) NOT NULL, `30` varchar( 10 ) NOT NULL, `31` varchar( 10 ) NOT NULL, `total` int(10) NOT NULL)";




		$sql8="CREATE TABLE `august` (`roll` int( 200 ) NOT NULL , `class` varchar( 200 ) NOT NULL ,`section` varchar( 200 ) NOT NULL , `mobile_no` varchar( 30 ) NOT NULL ,`01` varchar( 10 ) NOT NULL, `02` varchar( 10 ) NOT NULL, `03` varchar( 10 ) NOT NULL, `04` varchar( 10 ) NOT NULL, `05` varchar( 10 ) NOT NULL, `06` varchar( 10 ) NOT NULL, `07` varchar( 10 ) NOT NULL, `08` varchar( 10 ) NOT NULL, `09` varchar( 10 ) NOT NULL, `10` varchar( 10 ) NOT NULL, `11` varchar( 10 ) NOT NULL, `12` varchar( 10 ) NOT NULL, `13` varchar( 10 ) NOT NULL, `14` varchar( 10 ) NOT NULL, `15` varchar( 10 ) NOT NULL, `16` varchar( 10 ) NOT NULL, `17` varchar( 10 ) NOT NULL, `18` varchar( 10 ) NOT NULL, `19` varchar( 10 )NOT NULL, `20` varchar( 10 ) NOT NULL, `21` varchar( 10 ) NOT NULL, `22` varchar( 10 ) NOT NULL, `23` varchar( 10 ) NOT NULL, `24` varchar( 10 ) NOT NULL, `25` varchar( 10 ) NOT NULL, `26` varchar( 10 ) NOT NULL, `27` varchar( 10 ) NOT NULL, `28` varchar( 10 ) NOT NULL, `29` varchar( 10 ) NOT NULL, `30` varchar( 10 ) NOT NULL, `31` varchar( 10 ) NOT NULL, `total` int(10) NOT NULL)";



		$sql9="CREATE TABLE `september` (`roll` int( 200 ) NOT NULL , `class` varchar( 200 ) NOT NULL ,`section` varchar( 200 ) NOT NULL , `mobile_no` varchar( 30 ) NOT NULL ,`01` varchar( 10 ) NOT NULL, `02` varchar( 10 ) NOT NULL, `03` varchar( 10 ) NOT NULL, `04` varchar( 10 ) NOT NULL, `05` varchar( 10 ) NOT NULL, `06` varchar( 10 ) NOT NULL, `07` varchar( 10 ) NOT NULL, `08` varchar( 10 ) NOT NULL, `09` varchar( 10 ) NOT NULL, `10` varchar( 10 ) NOT NULL, `11` varchar( 10 ) NOT NULL, `12` varchar( 10 ) NOT NULL, `13` varchar( 10 ) NOT NULL, `14` varchar( 10 ) NOT NULL, `15` varchar( 10 ) NOT NULL, `16` varchar( 10 ) NOT NULL, `17` varchar( 10 ) NOT NULL, `18` varchar( 10 ) NOT NULL, `19` varchar( 10 )NOT NULL, `20` varchar( 10 ) NOT NULL, `21` varchar( 10 ) NOT NULL, `22` varchar( 10 ) NOT NULL, `23` varchar( 10 ) NOT NULL, `24` varchar( 10 ) NOT NULL, `25` varchar( 10 ) NOT NULL, `26` varchar( 10 ) NOT NULL, `27` varchar( 10 ) NOT NULL, `28` varchar( 10 ) NOT NULL, `29` varchar( 10 ) NOT NULL, `30` varchar( 10 ) NOT NULL, `total` int(10) NOT NULL)";

		$sql10="CREATE TABLE `october` (`roll` int( 200 ) NOT NULL , `class` varchar( 200 ) NOT NULL ,`section` varchar( 200 ) NOT NULL , `mobile_no` varchar( 30 ) NOT NULL ,`01` varchar( 10 ) NOT NULL, `02` varchar( 10 ) NOT NULL, `03` varchar( 10 ) NOT NULL, `04` varchar( 10 ) NOT NULL, `05` varchar( 10 ) NOT NULL, `06` varchar( 10 ) NOT NULL, `07` varchar( 10 ) NOT NULL, `08` varchar( 10 ) NOT NULL, `09` varchar( 10 ) NOT NULL, `10` varchar( 10 ) NOT NULL, `11` varchar( 10 ) NOT NULL, `12` varchar( 10 ) NOT NULL, `13` varchar( 10 ) NOT NULL, `14` varchar( 10 ) NOT NULL, `15` varchar( 10 ) NOT NULL, `16` varchar( 10 ) NOT NULL, `17` varchar( 10 ) NOT NULL, `18` varchar( 10 ) NOT NULL, `19` varchar( 10 )NOT NULL, `20` varchar( 10 ) NOT NULL, `21` varchar( 10 ) NOT NULL, `22` varchar( 10 ) NOT NULL, `23` varchar( 10 ) NOT NULL, `24` varchar( 10 ) NOT NULL, `25` varchar( 10 ) NOT NULL, `26` varchar( 10 ) NOT NULL, `27` varchar( 10 ) NOT NULL, `28` varchar( 10 ) NOT NULL, `29` varchar( 10 ) NOT NULL, `30` varchar( 10 ) NOT NULL, `31` varchar( 10 ) NOT NULL, `total` int(10) NOT NULL)";



		$sql11="CREATE TABLE `november` (`roll` int( 200 ) NOT NULL , `class` varchar( 200 ) NOT NULL ,`section` varchar( 200 ) NOT NULL , `mobile_no` varchar( 30 ) NOT NULL ,`01` varchar( 10 ) NOT NULL, `02` varchar( 10 ) NOT NULL, `03` varchar( 10 ) NOT NULL, `04` varchar( 10 ) NOT NULL, `05` varchar( 10 ) NOT NULL, `06` varchar( 10 ) NOT NULL, `07` varchar( 10 ) NOT NULL, `08` varchar( 10 ) NOT NULL, `09` varchar( 10 ) NOT NULL, `10` varchar( 10 ) NOT NULL, `11` varchar( 10 ) NOT NULL, `12` varchar( 10 ) NOT NULL, `13` varchar( 10 ) NOT NULL, `14` varchar( 10 ) NOT NULL, `15` varchar( 10 ) NOT NULL, `16` varchar( 10 ) NOT NULL, `17` varchar( 10 ) NOT NULL, `18` varchar( 10 ) NOT NULL, `19` varchar( 10 )NOT NULL, `20` varchar( 10 ) NOT NULL, `21` varchar( 10 ) NOT NULL, `22` varchar( 10 ) NOT NULL, `23` varchar( 10 ) NOT NULL, `24` varchar( 10 ) NOT NULL, `25` varchar( 10 ) NOT NULL, `26` varchar( 10 ) NOT NULL, `27` varchar( 10 ) NOT NULL, `28` varchar( 10 ) NOT NULL, `29` varchar( 10 ) NOT NULL, `30` varchar( 10 ) NOT NULL, `total` int(10) NOT NULL)";



		$sql12="CREATE TABLE `december` (`roll` int( 200 ) NOT NULL , `class` varchar( 200 ) NOT NULL ,`section` varchar( 200 ) NOT NULL , `mobile_no` varchar( 30 ) NOT NULL ,`01` varchar( 10 ) NOT NULL, `02` varchar( 10 ) NOT NULL, `03` varchar( 10 ) NOT NULL, `04` varchar( 10 ) NOT NULL, `05` varchar( 10 ) NOT NULL, `06` varchar( 10 ) NOT NULL, `07` varchar( 10 ) NOT NULL, `08` varchar( 10 ) NOT NULL, `09` varchar( 10 ) NOT NULL, `10` varchar( 10 ) NOT NULL, `11` varchar( 10 ) NOT NULL, `12` varchar( 10 ) NOT NULL, `13` varchar( 10 ) NOT NULL, `14` varchar( 10 ) NOT NULL, `15` varchar( 10 ) NOT NULL, `16` varchar( 10 ) NOT NULL, `17` varchar( 10 ) NOT NULL, `18` varchar( 10 ) NOT NULL, `19` varchar( 10 )NOT NULL, `20` varchar( 10 ) NOT NULL, `21` varchar( 10 ) NOT NULL, `22` varchar( 10 ) NOT NULL, `23` varchar( 10 ) NOT NULL, `24` varchar( 10 ) NOT NULL, `25` varchar( 10 ) NOT NULL, `26` varchar( 10 ) NOT NULL, `27` varchar( 10 ) NOT NULL, `28` varchar( 10 ) NOT NULL, `29` varchar( 10 ) NOT NULL, `30` varchar( 10 ) NOT NULL, `31` varchar( 10 ) NOT NULL, `total` int(10) NOT NULL)";


 
		mysqli_query($db1,$student);
		mysqli_query($db1,$approve);
		mysqli_query($db1,$class);
		mysqli_query($db1,$sql1);
		mysqli_query($db1,$sql2);
		mysqli_query($db1,$sql3);
		mysqli_query($db1,$sql4);
		mysqli_query($db1,$sql5);
		mysqli_query($db1,$sql6);
		mysqli_query($db1,$sql7);
		mysqli_query($db1,$sql8);
		mysqli_query($db1,$sql9);
		mysqli_query($db1,$sql10);
		mysqli_query($db1,$sql11);
		mysqli_query($db1,$sql12);

		echo "ok";
		
	}
else echo mysql_error();
}
else echo mysql_error();
}

?>

<body style="background-color:#DCDCDC;">	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row" style="padding-top:100px; padding-left:400px; ">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="login-form"><!--login form-->

 
	

						<h2>ADD NEW HOST</h2>
						  <form action="home.php" method="POST">
                            <input type="email" name="email" placeholder="Admin Email " id="username" required="1" style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>

                            <input type="text" name="school_name" placeholder="School name" id="school_name" required="1" style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>

                            <input type="text" name="database_name" placeholder="Database name" id="database_name" required="1" style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>

                            <input type="text" name="mobile_no" placeholder="Mobile No" id="mobile_no" required="1" style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>

                            <input style="background-color:orange" style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;" class="buy-btn1" type="submit" name="button" value="Add"/>
                        </form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
   
    
<?php //include('include/footer.php'); ?>
</body>

</html>