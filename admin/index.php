 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Attandence</title>
    <!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.transitions.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
  
</head><!--/head-->

<?php

session_start();

if($_SESSION['login']!='admin')
header("Location:/school_attandence/login.php");

date_default_timezone_set('Asia/Dhaka');
    
$timestamp=time()+(60*60*5.5);
    
$day=gmstrftime("%d",$timestamp);

$month=gmstrftime("%m",$timestamp);

echo $_SESSION['school_id'];


if($month==01) $month_name="january";
elseif($month==02) $month_name="february";
elseif($month==03) $month_name="march";
elseif($month==04) $month_name="april";
elseif($month==05) $month_name="may";
elseif($month==06) $month_name="june";
elseif($month==07) $month_name="july";
elseif($month==08) $month_name="august";
elseif($month==09) $month_name="september";
elseif($month==10) $month_name="october";
elseif($month==11) $month_name="november";
else $month_name="december";

//$sql1="UPDATE `$month_name` SET `$day`='P'";

//$check=mysqli_query($db,$sql1);

//if($check)

$database=$_SESSION['database'];

$db=mysqli_connect("localhost","root","",$database);


?>

<body id="home" class="homepage">

    <header id="header">
        <nav id="main-menu" class="navbar navbar-default navbar-fixed-top top-nav-collapse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img style="width:300px;" src="images/logo.png" alt="logo"></a>
                </div>
                
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        
                        <li class="scroll active "><a href="#services">Add Students </a></li>
                        <li class="scroll"><a href="#portfolio">Send SMS</a></li>                       
                        <li class="scroll"><a href="#pricing">Check Attandence</a></li>
                        <li class="scroll"><a href="#blog">Update</a></li>
                        <li class="scroll"><a href="#testimonial">Approve </a></li>
                        <li class="scroll"><a href="more.php">More </a></li>
                        <li class=""><a href="/school_attandence/logout.php">Logout</a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->

    <section id="services" >
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Add new student</h2>
                
            </div>

            <div class="row">
                <div class="features">
                    
                        <div class="media service-box">
               <?php

                        if(isset($_POST['add_student'])){

                            $name=$_POST['name'];
                            $class=$_POST['class'];
                            $section=$_POST['section'];
                            $roll=$_POST['roll'];
                            $mobile_no=$_POST['mobile_no'];


                            $sql="INSERT INTO `student_info`(`student_name`, `roll`, `class`, `section`, `mobile_no`) VALUES ('$name','$roll','$class','$section','$mobile_no')";

                            $action=mysqli_query($db,$sql);

                            $sql1="INSERT INTO `january`( `roll`, `class`, `section`, `mobile_no`,`total`) VALUES ('$roll','$class','$section','$mobile_no',0)";

                            $sql2="INSERT INTO `february`( `roll`, `class`, `section`, `mobile_no`,`total`) VALUES ('$roll','$class','$section','$mobile_no',0)";

                            $sql3="INSERT INTO `march`( `roll`, `class`, `section`, `mobile_no`,`total`) VALUES ('$roll','$class','$section','$mobile_no',0)";

                            $sql4="INSERT INTO `april`( `roll`, `class`, `section`, `mobile_no`,`total`) VALUES ('$roll','$class','$section','$mobile_no',0)";

                            $sql5="INSERT INTO `may`( `roll`, `class`, `section`, `mobile_no`,`total`) VALUES ('$roll','$class','$section','$mobile_no',0)";

                            $sql6="INSERT INTO `june`( `roll`, `class`, `section`, `mobile_no`,`total`) VALUES ('$roll','$class','$section','$mobile_no',0)";

                            $sql7="INSERT INTO `july`( `roll`, `class`, `section`, `mobile_no`,`total`) VALUES ('$roll','$class','$section','$mobile_no',0)";

                            $sql8="INSERT INTO `august`( `roll`, `class`, `section`, `mobile_no`,`total`) VALUES ('$roll','$class','$section','$mobile_no',0)";

                            $sql9="INSERT INTO `september`( `roll`, `class`, `section`, `mobile_no`,`total`) VALUES ('$roll','$class','$section','$mobile_no',0)";

                            $sql10="INSERT INTO `october`( `roll`, `class`, `section`, `mobile_no`,`total`) VALUES ('$roll','$class','$section','$mobile_no',0)";

                            $sql11="INSERT INTO `november`( `roll`, `class`, `section`, `mobile_no`,`total`) VALUES ('$roll','$class','$section','$mobile_no',0)";

                            $sql12="INSERT INTO `december`( `roll`, `class`, `section`, `mobile_no`,`total`) VALUES ('$roll','$class','$section','$mobile_no',0)";

                            mysqli_query($db,$sql1);
                            mysqli_query($db,$sql2);
                            mysqli_query($db,$sql3);
                            mysqli_query($db,$sql4);
                            mysqli_query($db,$sql5);
                            mysqli_query($db,$sql6);
                            mysqli_query($db,$sql7);
                            mysqli_query($db,$sql8);
                            mysqli_query($db,$sql9);
                            mysqli_query($db,$sql10);
                            mysqli_query($db,$sql11);
                            mysqli_query($db,$sql12);


                            if($action)
                            {
                                echo "Inserted";
                            }

                        }


                    ?>

                        
                          <form action="index.php" method="POST">
 
                            <input type="text" name="name" placeholder="Name" id="username" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px;"/>

                          <select name="class" required="1" style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px;">
                          <?php  
                                $clss="SELECT `class` FROM `class`";
                                $cc=mysqli_query($db,$clss);
                                if($cc)
                                {
                                    while($ccc=mysqli_fetch_array($cc)){
                                        $class1=$ccc['class'];
                                        
                                        echo '<option value="'.$class1.'">'.$class1.'</option>';
                                        
                                    }
                                }
                           ?>
                          </select>


                            <input type="text" name="section" placeholder="Section" id="section" required="1" style="padding:10px;height:40px;font-size:15px; font:Arial;margin:10px;"/>

                            <input type="text" name="roll" placeholder="Roll" id="roll" required="1" style="padding:10px;height:40px;font-size:15px; font:Arial;margin:10px;"/>

                            <input type="text" name="mobile_no" placeholder="Mobile_no" id="mobile_no" required="1" style="padding:10px;height:40px;font-size:15px; font:Arial;margin:10px;"/>


                            <input style="background-color:orange;padding:10px;height:40px; width:180px;font-size:20px; font:Arial; margin:10px; "
                            type="submit" name="add_student" value="Add" />
                        </form>


                        </div>
                   

                        </div>
                    </div><!--/.col-md-4-->
                </div>
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#services-->
    
                <?php if(isset($_POST['send']))
                        {
                            $i=0;
                            $mobile=array();
                             $msg="From ".$_SESSION['school_id'].". Your son /daughter is absent today.";                      
                        $query="SELECT * FROM  `$month_name` WHERE `$day`='A'";

                            $result=mysqli_query($db,$query);   
                            //echo $month_name;
                        while($row=mysqli_fetch_array($result)){
                            $i=$i+1;
                            $mobile_no=$row['mobile_no'];
                              array_push($mobile, $mobile_no);

                            }
                            echo $i;
                            //echo $mm;
                            echo "Responds:";
                            try{
                             $soapClient = new SoapClient("http://api.onnorokomsms.com/sendsms.asmx?wsdl");
                             $paramArray = array(
                             'userName' => "01521487473",
                             'userPassword' => "85818",
                             'messageText' => $msg,
                             'numberList' => join(',',$mobile),//print_r($mm),
                             'smsType' => "TEXT",
                             'maskName' => '',
                             'campaignName' => '',
                             );
                             $value = $soapClient->__call("OneToMany", array($paramArray));
                             echo $value->OneToManyResult;

                            } catch (Exception $e) {
                             echo $e->getMessage();
                            }
                            echo "Balance:";
                            try{
                             $soapClient = new SoapClient("http://api.onnorokomsms.com/sendsms.asmx?wsdl");
                             $paramArray = array(
                             'userName' => "01521487473",
                             'userPassword' => "85818",
                             );
                             $value = $soapClient->__call("GetBalance", array($paramArray));
                             echo $value->GetBalanceResult;
                            } catch (Exception $e) {
                             echo $e->getMessage();
                            }

                        }

                       
                        ?>

                        <?php 

                        if(isset($_POST['sendtoall']))
                        {
                            $msg=$_POST['text'];
                            $t=$_POST['type'];
                            $i=0;
                            $mobile=array();
                            //echo $msg;
                            //echo $t;
                            if($t=="none"){
                                //echo $t;
                          $sql="SELECT `mobile_no` FROM student_info";
                          $re=mysqli_query($db,$sql);
                          while($row=mysqli_fetch_array($re)){
                            $i=$i+1;
                            $mobile_no=$row['mobile_no'];
                              array_push($mobile, $mobile_no);

                            }
                            echo $i;
                            //echo $mm;
                            echo "Responds:";
                            try{
                             $soapClient = new SoapClient("http://api.onnorokomsms.com/sendsms.asmx?wsdl");
                             $paramArray = array(
                             'userName' => "01521487473",
                             'userPassword' => "85818",
                             'messageText' => $msg,
                             'numberList' => join(',',$mobile),//print_r($mm),
                             'smsType' => "TEXT",
                             'maskName' => '',
                             'campaignName' => '',
                             );
                             $value = $soapClient->__call("OneToMany", array($paramArray));
                             echo $value->OneToManyResult;

                            } catch (Exception $e) {
                             echo $e->getMessage();
                            }
                            echo "Balance:"
                            try{
                             $soapClient = new SoapClient("http://api.onnorokomsms.com/sendsms.asmx?wsdl");
                             $paramArray = array(
                             'userName' => "01521487473",
                             'userPassword' => "85818",
                             );
                             $value = $soapClient->__call("GetBalance", array($paramArray));
                             echo $value->GetBalanceResult;
                            } catch (Exception $e) {
                             echo $e->getMessage();
                            }


                          }

                        

                        else {
                            //echo $t;
                          $sql="SELECT `mobile_no` FROM student_info WHERE `class`='$t'";
                          $re=mysqli_query($db,$sql);
                          while($row=mysqli_fetch_array($re)){
                            $i=$i+1;
                            $mobile_no=$row['mobile_no'];
                              array_push($mobile, $mobile_no);

                            }
                            echo $i;
                            //echo $mm;
                            echo "Responds:";
                            try{
                             $soapClient = new SoapClient("http://api.onnorokomsms.com/sendsms.asmx?wsdl");
                             $paramArray = array(
                             'userName' => "01521487473",
                             'userPassword' => "85818",
                             'messageText' => $msg,
                             'numberList' => join(',',$mobile),//print_r($mm),
                             'smsType' => "TEXT",
                             'maskName' => '',
                             'campaignName' => '',
                             );
                             $value = $soapClient->__call("OneToMany", array($paramArray));
                             echo $value->OneToManyResult;

                            } catch (Exception $e) {
                             echo $e->getMessage();
                            }
                            echo "Balance: ";
                            try{
                             $soapClient = new SoapClient("http://api.onnorokomsms.com/sendsms.asmx?wsdl");
                             $paramArray = array(
                             'userName' => "01521487473",
                             'userPassword' => "85818",
                             );
                             $value = $soapClient->__call("GetBalance", array($paramArray));
                             echo $value->GetBalanceResult;
                            } catch (Exception $e) {
                             echo $e->getMessage();
                            }
                        }


                    }


                        

                        ?>
    
        <section id="portfolio">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Send SMS</h2>
                <p class="text-center wow fadeInDown">Hello. This is an online attandence system. <br>You can send SMS here.</p>
            </div>
                        
                        
            <div class="text-center">
                <ul class="portfolio-filter">
                    
                    <li><form action="index.php" method="POST">
                                <input style="background-color:orange;padding:10px;height:40px; width:180px;font-size:20px; font:Arial; margin:10px; " class="btn btn-primary"
                            type="submit" name="send" value="Send" />
                            </form></li>

                            </ul>
                            <ul style="list-style-type: none; ">
                    <li><form action="index.php" method="POST">
                                
                                <li><textarea name ="text" rows="10" cols="30" ></textarea></li>
                          <select name="class" required="1" style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px;">
                          <?php  
                                $clss="SELECT `class` FROM `class`";
                                $cc=mysqli_query($db,$clss);
                                if($cc)
                                {
                                    while($ccc=mysqli_fetch_array($cc)){
                                        $class1=$ccc['class'];
                                        
                                        echo '<option value="'.$class1.'">'.$class1.'</option>';
                                        
                                    }
                                }
                           ?>
                          </select>

                                <input style="background-color:orange;padding:10px;height:40px; width:180px;font-size:20px; font:Arial; margin:10px; " class="btn btn-primary"
                            type="submit" name="sendtoall" value="Send" />
                            </form></li>
                   
                </ul><!--/#portfolio-filter-->
		
            </div>
<!--/.portfolio-item-->
            </div>
        
    </section><!--/#portfolio-->
    
    
    <section id="pricing">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Check Attandence</h2>
                <p class="text-center wow fadeInDown">Hello. This is an online attandence system. <br>You can check attandence of a specific group.</p>
            </div>

            <div class="row">
                
                    <div class="wow zoomIn" data-wow-duration="400ms" data-wow-delay="0ms">
                        <ul class="pricing">
                                                    
                        <form action="index.php" method="POST">
                        <li>
                        <select name="class" required="1" style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px;">
                          <?php  
                                $clss="SELECT `class` FROM `class`";
                                $cc=mysqli_query($db,$clss);
                                if($cc)
                                {
                                    while($ccc=mysqli_fetch_array($cc)){
                                        $class1=$ccc['class'];
                                        
                                        echo '<option value="'.$class1.'">'.$class1.'</option>';
                                        
                                    }
                                }
                           ?>
                          </select>
                        </li>
                        <li>
                          <input type="text" name="section" placeholder="Sections" id="section" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
                        </li>
                        <li>
                           <input type="submit" name="button1" value="Done" id="button" class="btn btn-primary" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
                        </li>
                        </form>
                           
                        </ul>
                    </div>
<?php                    


if(isset($_POST['button1']))
{

    $class=$_POST['class'];
    $section=$_POST['section'];



$query="SELECT * FROM  `$month_name` WHERE `class`='$class' AND `section`='$section' ";

    $result=mysqli_query($db,$query);   
    //echo $month_name;

?>              


               
<div style="padding-left:350px;">
<table border="1" class="col-sm-6" >

<th>Roll</th>
<th>Attandence</th>

<th>Roll</th>
<th>Attandence</th>



<?php  
$i=0;
    while($row=mysqli_fetch_array($result)){
        $i=$i+1;
        if($row[$day]=='P')
            $at='Present';
        else $at='Absent';
         
        if($i%2==1)

        { ?>

        <tr>
<?php   } ?>
        
        <td>
        <?php echo $row['roll'];?>
        </td>

        <td>
        <?php echo $at;  ?>
        </td>
        <?php if($i%2==0)
                {?>
                </tr>
        

    <?php
    }
    }
}

?>

</table>
</div>
               </div> 
        </div>
    </section><!--/#pricing-->
    
    
    
    <section id="blog">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Update</h2>
                <p class="text-center wow fadeInDown">Hello. This is an online attandence system. <br>You can update here.</p>
            </div>
             
             <div class="row">
             <div id="owl-example" class="owl-carousel"> 
                <div class="text-center item">
                    <div class="blog-post blog-large wow fadeInLeft" data-wow-duration="300ms" data-wow-delay="0ms">
                        <article>
                            
                                <div class="entry-thumbnail">
                                  
                        <?php 
                        if(isset($_POST['student']))
                        {
                            $class=$_POST['class'];
                            $roll=$_POST['roll'];
                            $section=$_POST['section'];
                            $mobile_no=$_POST['mobile_no'];

                            $update="UPDATE `student_info` SET `mobile_no`='$mobile_no' WHERE `class`='$class' AND `section`='$section' AND `roll`='$roll'";
                            $res1=mysqli_query($db,$update);

                            if($res1)
                            {
                                $msg1="Mobile no updated";
                            }
                            else $msg1="Can not updated";

                        }
                        ?>
                        <h4><?php if(isset($msg1)) echo $msg1; ?></h4>
                        <form action="index.php" method="POST">
                        
                         <select name="class" required="1" style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px;">
                          <?php  
                                $clss="SELECT `class` FROM `class`";
                                $cc=mysqli_query($db,$clss);
                                if($cc)
                                {
                                    while($ccc=mysqli_fetch_array($cc)){
                                        $class1=$ccc['class'];
                                        
                                        echo '<option value="'.$class1.'">'.$class1.'</option>';
                                        
                                    }
                                }
                           ?>
                          </select>
                       
                          <input type="text" name="section" placeholder="Sections" id="section" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
                       
                         <input type="text" name="roll" placeholder="Roll" id="class" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
                        
                          <input type="text" name="mobile_no" placeholder="Mobile no" id="section" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
                       
                           <input type="submit" name="student" value="Update" id="button" class="btn btn-primary" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
                        
                        </form>
                           
                       

                            </div>
                            
                        </article>
                    </div>
                </div>
                <div class="text-center item">
                    <div class="blog-post blog-large wow fadeInLeft" data-wow-duration="300ms" data-wow-delay="0ms">
                        <article>
                            
                                <div class="entry-thumbnail">
                                  
                        <?php 



                        if(isset($_POST['roll_update']))
                        {
                            $pclass=$_POST['p_class'];
                            $proll=$_POST['p_roll'];
                            $psection=$_POST['p_section'];
                            $nclass=$_POST['n_class'];
                            $nroll=$_POST['n_roll'];
                            $nsection=$_POST['n_section'];
                            

                            $update="UPDATE `student_info` SET `class`='$nclass',`section`='$nsection',`roll`='$nroll' WHERE `class`='$pclass' AND `section`='$psection' AND `roll`='$proll'";
                            $res1=mysqli_query($db,$update);

                            $update01="UPDATE `january` SET `class`='$nclass',`section`='$nsection',`roll`='$nroll' WHERE `class`='$pclass' AND `section`='$psection' AND `roll`='$proll'";
                            $res1=mysqli_query($db,$update01);

                            $update02="UPDATE `february` SET `class`='$nclass',`section`='$nsection',`roll`='$nroll' WHERE `class`='$pclass' AND `section`='$psection' AND `roll`='$proll'";
                            $res1=mysqli_query($db,$update02);

                            $update03="UPDATE `march` SET `class`='$nclass',`section`='$nsection',`roll`='$nroll' WHERE `class`='$pclass' AND `section`='$psection' AND `roll`='$proll'";
                            $res1=mysqli_query($db,$update03);

                            $update04="UPDATE `april` SET `class`='$nclass',`section`='$nsection',`roll`='$nroll' WHERE `class`='$pclass' AND `section`='$psection' AND `roll`='$proll'";
                            $res1=mysqli_query($db,$update04);


                            $update05="UPDATE `may` SET `class`='$nclass',`section`='$nsection',`roll`='$nroll' WHERE `class`='$pclass' AND `section`='$psection' AND `roll`='$proll'";
                            $res1=mysqli_query($db,$update05);

                            $update06="UPDATE `june` SET `class`='$nclass',`section`='$nsection',`roll`='$nroll' WHERE `class`='$pclass' AND `section`='$psection' AND `roll`='$proll'";
                            $res1=mysqli_query($db,$update06);

                            $update07="UPDATE `july` SET `class`='$nclass',`section`='$nsection',`roll`='$nroll' WHERE `class`='$pclass' AND `section`='$psection' AND `roll`='$proll'";
                            $res1=mysqli_query($db,$update07);

                            $update08="UPDATE `august` SET `class`='$nclass',`section`='$nsection',`roll`='$nroll' WHERE `class`='$pclass' AND `section`='$psection' AND `roll`='$proll'";
                            $res1=mysqli_query($db,$update08);


                            $update09="UPDATE `september` SET `class`='$nclass',`section`='$nsection',`roll`='$nroll' WHERE `class`='$pclass' AND `section`='$psection' AND `roll`='$proll'";
                            $res1=mysqli_query($db,$update09);

                            $update10="UPDATE `october` SET `class`='$nclass',`section`='$nsection',`roll`='$nroll' WHERE `class`='$pclass' AND `section`='$psection' AND `roll`='$proll'";
                            $res1=mysqli_query($db,$update10);

                            $update11="UPDATE `november` SET `class`='$nclass',`section`='$nsection',`roll`='$nroll' WHERE `class`='$pclass' AND `section`='$psection' AND `roll`='$proll'";
                            $res1=mysqli_query($db,$update11);

                            $update12="UPDATE `december` SET `class`='$nclass',`section`='$nsection',`roll`='$nroll' WHERE `class`='$pclass' AND `section`='$psection' AND `roll`='$proll'";
                            $res1=mysqli_query($db,$update12);

                            if($res1)
                            {
                                $msg1="Information updated";
                            }
                            else $msg1="Can not updated";

                        }
                        ?>
                        <h4><?php if(isset($msg1)) echo $msg1; ?></h4>
                        <form action="index.php" method="POST">
                        
                        <select name="p_class" required="1" style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px;">
                          <?php  
                                $clss="SELECT `class` FROM `class`";
                                $cc=mysqli_query($db,$clss);
                                if($cc)
                                {
                                    while($ccc=mysqli_fetch_array($cc)){
                                        $class1=$ccc['class'];
                                        
                                        echo '<option value="'.$class1.'">'.$class1.'</option>';
                                        
                                    }
                                }
                           ?>
                          </select>
                       
                          <input type="text" name="p_section" placeholder="Previous Sections" id="section" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
                       
                         <input type="text" name="p_roll" placeholder="Prevoius Roll" id="class" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
                        
                         <select name="n_class" required="1" style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px;">
                          <?php  
                                $clss="SELECT `class` FROM `class`";
                                $cc=mysqli_query($db,$clss);
                                if($cc)
                                {
                                    while($ccc=mysqli_fetch_array($cc)){
                                        $class1=$ccc['class'];
                                        
                                        echo '<option value="'.$class1.'">'.$class1.'</option>';
                                        
                                    }
                                }
                           ?>
                          </select>
                       
                          <input type="text" name="n_section" placeholder="New Sections" id="section" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
                       
                         <input type="text" name="n_roll" placeholder="New Roll" id="class" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
                       
                           <input type="submit" name="roll_update" value="Update" id="button" class="btn btn-primary" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
                        
                        </form>

    
                       

                            </div>
                            
                        </article>
                    </div>
                </div>
                
                <div class="text-center item">
                    <div class="blog-post blog-large wow fadeInLeft" data-wow-duration="300ms" data-wow-delay="0ms">
                        <article>
                            <header class="entry-header">
                                <div class="entry-thumbnail">
                          <?php   


                          if(isset($_POST['student_tc'])){
                            $class=$_POST['class'];
                            $roll=$_POST['roll'];
                            $section=$_POST['section'];

                            $delete1="DELETE FROM `student_info` WHERE `class`='$class' AND `section`='$section' AND `roll`='$roll'";

                            $delete2="DELETE FROM `january` WHERE `class`='$class' AND `section`='$section' AND `roll`='$roll'";
                            $delete3="DELETE FROM `february` WHERE `class`='$class' AND `section`='$section' AND `roll`='$roll'";
                            $delete4="DELETE FROM `march` WHERE `class`='$class' AND `section`='$section' AND `roll`='$roll'";
                            $delete5="DELETE FROM `april` WHERE `class`='$class' AND `section`='$section' AND `roll`='$roll'";         
                            $delete6="DELETE FROM `may` WHERE `class`='$class' AND `section`='$section' AND `roll`='$roll'";         
                            $delete7="DELETE FROM `june` WHERE `class`='$class' AND `section`='$section' AND `roll`='$roll'";
                            $delete8="DELETE FROM `july` WHERE `class`='$class' AND `section`='$section' AND `roll`='$roll'";         
                            $delete9="DELETE FROM `august` WHERE `class`='$class' AND `section`='$section' AND `roll`='$roll'";         
                            $delete10="DELETE FROM `september` WHERE `class`='$class' AND `section`='$section' AND `roll`='$roll'";     
                            $delete11="DELETE FROM `october` WHERE `class`='$class' AND `section`='$section' AND `roll`='$roll'";        
                            $delete12="DELETE FROM `november` WHERE `class`='$class' AND `section`='$section' AND `roll`='$roll'";        
                            $delete13="DELETE FROM `december` WHERE `class`='$class' AND `section`='$section' AND `roll`='$roll'";                            


                            $r=mysqli_query($db,$delete1);
                            mysqli_query($db,$delete2);
                            mysqli_query($db,$delete3);
                            mysqli_query($db,$delete4);
                            mysqli_query($db,$delete5);
                            mysqli_query($db,$delete6);
                            mysqli_query($db,$delete7);
                            mysqli_query($db,$delete8);
                            mysqli_query($db,$delete9);
                            mysqli_query($db,$delete10);
                            mysqli_query($db,$delete11);
                            mysqli_query($db,$delete12);
                            mysqli_query($db,$delete13);

                            if($r)
                                echo "Done";

                          }

                          ?>
                                                    
                        <form action="index.php" method="POST">
                        
                         <select name="class" required="1" style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px;">
                          <?php  
                                $clss="SELECT `class` FROM `class`";
                                $cc=mysqli_query($db,$clss);
                                if($cc)
                                {
                                    while($ccc=mysqli_fetch_array($cc)){
                                        $class1=$ccc['class'];
                                        
                                        echo '<option value="'.$class1.'">'.$class1.'</option>';
                                        
                                    }
                                }
                           ?>
                          </select>
                       
                          <input type="text" name="section" placeholder="Sections" id="section" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
                        
                         <input type="text" name="roll" placeholder="Roll" id="class" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
                       
                           <input type="submit" name="student_tc" value="T.C." id="button" class="btn btn-primary" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
                       
                        </form>
                           
                       
                               <?php

                          if(isset($_POST['teacher']))
                          {
                            $email=$_POST['email'];
                            $school_id=$_POST['school_id'];

                            $db1=mysqli_connect("localhost","root","","super_admin");

                            $remove="DELETE FROM `user` WHERE `user_email`='$email' AND `school_id`='$school_id' ";

                            if(mysqli_query($db1,$remove))
                            {
                                $msg1="Removed";
                            }
                            else {
                                $msg1="Failed";
                            }

                          }

                          ?>
                         <h4><?php if(isset($msg1)) echo $msg1; ?></h4>                           
                        <form action="index.php" method="POST">
                       
                         <input type="email" name="email" placeholder="Email" id="email" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
                       
                          <input type="text" name="school_id" placeholder="School_id" id="school_id" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
                       
                        
                           <input type="submit" name="teacher" value="Remove" id="button" class="btn btn-primary" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
                        
                        </form>
                            
                               </div>    
                            
                        </article>
                    </div>
                </div>
               
                
            </div>
            </div>          

        </div>
    </section> 
    
    
    
   
    
    
    
    
    
    <!--/#blog-->
    
    <section id="testimonial">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Approval</h2>
                

                <table style="padding-left:'100px';">
                <?php 
                        $sql="SELECT * FROM approve";

                        $result = mysqli_query($db,$sql);


                        while($row = mysqli_fetch_array($result)){
                            

                        echo '<tr>
                            <td>Name: '.$row['name'].' teacher id: '.$row['teacher_id'].' send a request for approve
                            </td>

                        </tr>
                            
                        <tr>
                            <td><a href="approve.php?id='.$row['teacher_id'].'&&db='.$database.'"><button>Approve</button</a>
                            </td>

                        </tr>'  ;

                        }

                ?>

                </table>

            </div>

          
        </div>
    </section> <!--/#testimonial-->
    
    

    



    <footer id="footer">
        <div class="container text-center">
          All rights reserved © 2018 | Md.Mominul Islam
        </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/mousescroll.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/jquery.inview.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/scrolling-nav.js"></script>
<script>

    $(document).ready(function($) {
      $("#owl-example").owlCarousel();
    });

    $("body").data("page", "frontpage");

$("#owl-example").owlCarousel({ 
        items:3,   
/*        itemsDesktop : [1199,3],
        itemsDesktopSmall : [980,9],
        itemsTablet: [768,5],
        itemsTabletSmall: false,
        itemsMobile : [479,4]*/
})

    </script>
</body>
</html>