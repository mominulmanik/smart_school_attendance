 
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
                        
                        <li class="scroll"><a href="index.php">Home </a></li>
                        <li class="scroll active"><a href="#portfolio">Class</a></li> 
                        <?php if($database=='bca01'){?>                     
                        <li class="scroll"><a href="#pricing">Payment</a></li>
                        <?php  }
                        ?>
                        <li class=""><a href="/school_attandence/logout.php">Logout</a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->
<?php

if (isset($_POST['button'])){

    $class=$_POST['class'];

    $sql="INSERT INTO class (`class`) VALUES ('$class')";

    if(mysqli_query($db,$sql)){
        $mssg="Inserted";
    }
    else {
        $mssg="Not Inserted";
    }

}

?>
    
        <section id="portfolio">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Add Class</h2>
                <p class="text-center wow fadeInDown">Hello. This is an online attandence system. <br>You can add class here.</p>
            </div>
                        
                        
            <div class="text-center">
            <?php if(isset($mssg)) echo $mssg; ?>
            <form action ="more.php" method="POST" >
                <ul class="portfolio-filter">
                    
                    <li><input type="text" name="class" placeholder="Class" id="class" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/></li>
                    <li><input type="submit" name="button" value="Add Class" id="button" class="btn btn-primary" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/></li>
                   
                </ul><!--/#portfolio-filter-->
		</form>
            </div>
<!--/.portfolio-item-->
            </div>
        
    </section><!--/#portfolio-->
    
    <?php if($database=='bca01'){

        ?>
    <section id="pricing">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Payment</h2>
                <p class="text-center wow fadeInDown">Hello. This is an online attandence system. <br></p>
            </div>

            <?php 

            if(isset($_POST['payment'])){
                $class=$_POST['class'];
                $section=$_POST['section'];
                $roll=$_POST['roll'];
                $monthname=$_POST['month'];

                $sql="UPDATE `student_info` SET `$monthname`='Paid' WHERE `class`='$class' AND `section`='$section' AND `roll`='$roll'";

                if(mysqli_query($db,$sql)){
                    $mmsg="Payment is completed for the month of ".$month_name;
                }
                else {
                    $mmsg="Try again";
                }
            }


            ?>

            <div class="row">
                
                    <div class="wow zoomIn" data-wow-duration="400ms" data-wow-delay="0ms">
                        <ul class="pricing">
                                      <?php if(isset($mmsg)) echo $mmsg; ?>              
                        <form action="more.php" method="POST">
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
                          <select name="month" required="1" style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px;">
                          <option value="january">january</option>
                          <option value="february">february</option>
                          <option value="march">march</option>
                          <option value="april">april</option>
                          <option value="may">may</option>
                          <option value="june">june</option>
                          <option value="july">july</option>
                          <option value="august">august</option>
                          <option value="september">september</option>
                          <option value="october">october</option>
                          <option value="november">november</option>
                          <option value="december">december</option>
                          </select>
                          <input type="text" name="roll" placeholder="Roll" id="class" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
                          <input type="submit" name="payment" value="Payment" id="button2" class="btn btn-primary" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>

                        </form>
                           
                        </ul>

                        <?php  
                        if(isset($_POST['sendsms']))
                        {
                            $userPassword="323232";
                            $class=$_POST['class'];
                            $i=0;
                            $mobile=array();
                         $sql="SELECT `mobile_no` FROM student_info WHERE `$month_name`!='Paid' AND `class`='$class'";
                          $re=mysqli_query($db,$sql);
                          while($row=mysqli_fetch_array($re)){
                             $i=$i+1;
                                $number=$row['mobile_no'];
                                array_push($mobile, $number);
                            }
                                echo "Number of massege : ".$i." .";
                        try{

                                    $soapClient = new SoapClient("http://api.onnorokomsms.com/sendsms.asmx?wsdl");
                                     $paramArray = array(
                                     'userName' => "01611383232",
                                     'userPassword' => $userPassword,
                                     'messageText' => "From Biddalo Coaching Academy (Milon). Your son/daughter do not pay tution fee of this month. Plz pay within first 15 day of a month. Thank you",
                                     'numberList' => join(',',$mobile),
                                     'smsType' => "TEXT",
                                     'maskName' => '',
                                     'campaignName' => '',
                                     );
                                     $value = $soapClient->__call("OneToMany", array($paramArray));
                                     echo "SMS feedback :";
                                     echo $value->OneToManyResult;
                                } catch (Exception $e) {
                                echo $e->getMessage();
                                 echo "Not send";
                            }
                            echo "Your account balance :";
                             try{
                                     $soapClient = new SoapClient("http://api.onnorokomsms.com/sendsms.asmx?wsdl");
                                     $paramArray = array(
                                     'userName' => "01611383232",
                                     'userPassword' => $userPassword,
                                     );
                                     $value = $soapClient->__call("GetBalance", array($paramArray));
                                     echo $value->GetBalanceResult;
                                } catch (Exception $e) {
                                     echo $e->getMessage();
                                }


                        
                          }
                      
                          //echo "SMS send";

                        ?>


                        <ul>
                            <form action ="more.php" method="POST">
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
                            <input type="submit" name="sendsms" value="Send SMS" id="button2" class="btn btn-primary" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
                            </form>

                        </ul>
                    </div>

               </div> 
        </div>
    </section><!--/#pricing-->
    
<?php
}
    ?>

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