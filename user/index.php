   
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
if($_SESSION['login']!="user")
    header("Location:/school_attandence/login.php");


$database=$_SESSION['database'];
//echo $database;
$db=mysqli_connect("localhost","root","",$database);

date_default_timezone_set('Asia/Dhaka');
    
    $timestamp=time()+(60*60*5.5);
    //if($timestamp==)
    
$day=gmstrftime("%d",$timestamp);

$month=gmstrftime("%m",$timestamp);

$year=gmstrftime("%y",$timestamp);

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
$_SESSION['month_name']=$month_name;


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
                    <a class="navbar-brand" href="index.html"><img style="width:400px;" src="images/logo.png" alt="logo"></a>
                </div>
                
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        
                        <li class="scroll active"><a href="#services"> Attandence</a></li>
                        <li class="scroll"><a href="#blog">Change attandence</a></li>
                        <li class="scroll"><a href="#portfolio">Check Attandence</a></li>
                        <li class="scroll"><a href="#pricing">Individual Check</a></li>
                        <li class=""><a href="/school_attandence/logout.php">Logout</a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->

    <section id="services" >
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Attandence</h2>
                
            </div>




            <div class="row">
                <div class="features">
                
                        <div class="media service-box">
                        
                        <form action="index.php" method="POST">
                        <ul style="list-style-type: none; ">
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
                           <input type="submit" class="btn btn-primary" name="button" value="Done" id="button" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
                           </li>
                           </ul>
                        </form>
                        
                        </div>
                    
<?php 

if(isset($_POST['button']))
{

    $class=$_POST['class'];
    $section=$_POST['section'];
$_SESSION['class']=$class;
$_SESSION['section']=$section;

}

?>    
  <div class="media service-box">
  <div style="padding-left:150px;">
  <table border="1" style="">
<?php

if(!empty($_SESSION['class'])&&!empty($_SESSION['section'])){

$class=$_SESSION['class'];
$section=$_SESSION['section'];


echo "date:".$day."th".$month_name." ".$year;


$sql="SELECT * FROM $month_name WHERE `section`='$section' AND `class`='$class' ORDER BY `roll`";

$result=mysqli_query($db,$sql);

$i=0;

while($row = mysqli_fetch_array($result))
{
    $i=$i+1;
    if($row[$day]=='A')
        $color="red";
    else $color="green";
    $roll=$row['roll'];
    if(isset($_POST['roll_button'])){
        $query2="UPDATE `$month_name` SET `$day`='A' WHERE `class`='$class' AND `section`='$section' AND `roll`=$roll ";
            mysqli_query($db,$query2);
    }

    if($i%10==1){
        echo '<tr>';
    }

    echo '<td style="background-color:'.$color.'; height:60px; width:70px;" >
                    <a href="update.php?roll='.$roll.'">'.$roll.'</a>
                    </td>';

    if($i%10==0){
        echo '</tr>';
    }

}
?>
</table>
</div>
</div>
<div style="padding-left:200px;">
<form action="index.php" method="POST">

<input type="submit" name="button2" class="btn btn-primary" value="Done" id="button" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>

</form>
</div>
<?php
if(isset($_POST['button2'])){

$query22="SELECT * FROM `$month_name` WHERE `class`='$class' AND `section`='$section' AND `$day`='P'";
$rr=mysqli_query($db,$query22);

if(mysqli_num_rows($rr)==0){

$query1="SELECT * FROM `$month_name` WHERE `class`='$class' AND `section`='$section'";

$result=mysqli_query($db,$query1);

while($row=mysqli_fetch_array($result)){

	$total=$row['total']+1;
	
//if($day=='')

$query1="UPDATE `$month_name` SET `$day`='P',`total`=$total WHERE `$day`!='A' AND `class`='$class' AND `section`='$section'";

mysqli_query($db,$query1);
}
}
}
}
?>



                 

                        
                    </div><!--/.col-md-4-->
                </div>

           </div>
    </section><!--/#services-->


    <section id="blog">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">CHANGE ATTANDENCE</h2>
                <p class="text-center wow fadeInDown">Hello. This is an online attandence system. <br>In this portion you can change any attandence which is marked as present /absent today for unawareness.</p>
            </div>
             
             <div class="row">
             <div id="owl-example" class="owl-carousel"> 
           
                        <?php
                        //if(isset($_SESSION['class'])&&isset($_SESSION['section']))

                        if(isset($_POST['button5'])){

                            $roll2=$_POST['roll'];
                            $att=$_POST['attandence'];
                            $class=$_SESSION['class'];
                            $section=$_SESSION['section'];

                            $s1="SELECT `$day` from `$month_name` WHERE `class`='$class' AND `section`='$section' AND `roll`='$roll2' ";
                            $res11=mysqli_query($db,$s1);
                            $row11=mysqli_fetch_array($res11);
                            $aa=$row11[$day];

                            if($aa=$att){
                                $massage="Invalid action";
                            }
                            else {
                            if($att=='present'){
                        				$s="SELECT `total` from `$month_name` WHERE `class`='$class' AND `section`='$section' AND `roll`='$roll2' ";
                        				$res=mysqli_query($db,$s);
                        				$row=mysqli_fetch_array($res);
                        				$total=$row['total']+1;
            				//echo $class;//echo $section;
                                        $quer="UPDATE `$month_name` SET `$day`='P',`total`=$total WHERE `class`='$class' AND `section`='$section' AND `roll`='$roll2'";

                                        $ab=mysqli_query($db,$quer);
                                        if($ab)
                                            $massage="Change";
                                        else $massage="Not find";
                                }
                        else {
                                        $s="SELECT `total` from `$month_name` WHERE `class`='$class' AND `section`='$section' AND `roll`='$roll2' ";
                                        $res=mysqli_query($db,$s);
                                        $row=mysqli_fetch_array($res);
                                        $total=$row['total']-1;
                            //echo $class;//echo $section;
                                        $quer="UPDATE `$month_name` SET `$day`='A',`total`=$total WHERE `class`='$class' AND `section`='$section' AND `roll`='$roll2'";
                                        $ab=mysqli_query($db,$quer);
                                        if($ab)
                                            $massage="Change";
                                        else $massage="Not find";
                                 }
                        }

                    }
                            ?>
                            <div style="padding-left:300px;">
                            <h4><?php if(isset($massage)) echo $massage;  ?></h4>
                        <form action="index.php" method="POST">
                       <ul style="list-style-type: none; ">
                           <li>
                         <select name="attandence" required="1" style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px;">
                         <option value="present">Present</option>
                         <option value="absent">Absent</option>
                         </select>
                        </li>
                           <li>
                          <input type="text" name="roll" placeholder="Roll" id="section" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
                        </li>
                        <li>
                           <input type="submit" name="button5" value="change" id="button" class="btn btn-primary" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
                        </li>
                       </ul> 
                        </form>
                        </div>

                </div>
                
                
                
                
            </div>
            </div>          

        
    </section> 
        
    
        <section id="portfolio">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Check Attandence</h2>
                <p class="text-center wow fadeInDown">Hello. This is an online attandence system. <br>In tjis portion you can check attandence of a group.</p>
            </div>


            <div class="row">
                
                    <div class="wow zoomIn" data-wow-duration="400ms" data-wow-delay="0ms">
                        <ul style="list-style-type: none; ">
                              <div style="padding-left:300px;">
                            
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
                           </div>
                        </ul>
                    </div>
<?php                    


if(isset($_POST['button1']))
{

$class=$_POST['class'];
$section=$_POST['section'];


$query="SELECT * FROM  `$month_name` WHERE `class`='$class' AND `section`='$section' ORDER BY `roll` ";

    $result=mysqli_query($db,$query);   


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
        
    </section><!--/#portfolio-->

    

    <section id="pricing">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Check Individual Attandence</h2>
                <p class="text-center wow fadeInDown">Hello. This is an online attandence system. <br>You can check a specific student attandence.</p>
            </div>
      
             <div class="row">
                
                    <div class="wow zoomIn" data-wow-duration="400ms" data-wow-delay="0ms">
                     
                           <ul class="pricing">
                        <li>

                            <?php                    


                                if(isset($_POST['button10']))
                                {

                                $class1=$_POST['class'];
                                $section1=$_POST['section'];
                                $roll1=$_POST['roll'];

                                $query="SELECT * FROM  `$month_name` WHERE `class`='$class1' AND `section`='$section1' AND `roll`='$roll1'";

                                    $result=mysqli_query($db,$query);
                                    if($result){   
                                    $row=mysqli_fetch_array($result);

                                    ?>
                                    <label>Total attandence : </label>
                                    <input  type="text" value="<?php echo $row['total']; ?>"/>

                                    <?php

                                    }
                                    else $msg="not found";
                                ?>      
                        <?php if(!empty($msg)){ ?>
                            <h3><?php echo $msg; ?></h3>
                          <?php }  
                      }
                          ?>

                         </li>

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
                          <input type="text" name="roll" placeholder="Roll" id="section" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
                        </li>
                        <li>
                           <input type="submit" name="button10" value="Done" id="button" class="btn btn-primary" required="1"  style="padding:10px;height:40px;font-size:15px; font:Arial; margin:10px; width:300px;"/>
                        </li>
                        </form>
                           
                        </ul>

                    </div>
        

</div>


        </div>
    </section><!--/#pricing-->
    
    
    
    
    
    
    <!--/#blog-->
    
   
    



    <footer id="footer">
        <div class="container text-center">
          All rights reserved © 2018 | Md. Mominul Islam
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