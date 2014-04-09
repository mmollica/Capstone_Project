<?php
ini_set('display_startup_errors', TRUE);
ini_set('display_errors',1); 
error_reporting(E_ALL);
require_once 'core/init.php';


    $con = mysqli_connect("localhost","host","test","capstone_db");

    if (!$con)
        {
             die('Could not connect: ' . mysqli_error($con));
        }

   
$count=0;
$user= new User();	
    
$id= $user->data()->id;

$classid=$_POST["classid"];
 
$a = mysqli_query($con,"SELECT teacherid FROM class WHERE classid= $classid ");
$b = mysqli_query($con,"SELECT teacherid FROM class WHERE classid= $classid ");	

$c = mysqli_query($con,"SELECT classname FROM class WHERE classid= $classid ");	
	
$result3 = mysqli_query($con,"SELECT studentid FROM classassign WHERE classid= $classid ");
	



    if(!$a)
        {
        die(mysqli_error($con));
        }
		
	if(!$b)
        {
        die(mysqli_error($con));
        }
		
	if(!$c)
        {
        die(mysqli_error($con));
        }
		
	if(!$result3)
      {
        die(mysqli_error($con));
      }
    
?>

  <head>
    <meta charset="utf-8">
    <title>Homepage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="bootstrap.css" rel="stylesheet">
    <link href="carousel.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>
    <link href="bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="favicon.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">The Hive</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link">Username</a>
            </p>
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">Email</a></li>
              <li><a href="#about">Calendar</a></li>
              <li><a href="#contact">Log Out</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">

        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              
              <li><a href="#">Content</a></li>
              <li><a href="#">Assignments</a></li>
              <li><a href="#">Quizzes</a></li>
              <li><a href="#">Discussions</a></li>
              <li><a href="#">Grades</a></li>

            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
        <?php
       echo ' <h2 style="margin-left:410px">';
        while ($row = mysqli_fetch_assoc($c))
			{
            	echo $row['classname'];
            }
        echo '</h2>';
        ?>
           <div id="myCarousel" class= "carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <img src="52212c70ea4f2.preview-620.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
            <?php
			while ($row2 = mysqli_fetch_assoc($a))
			{
				$tid= $row2['teacherid'];
				$result = mysqli_query($con," SELECT * FROM teachermessage WHERE teacherid=$tid AND classid= $classid ORDER BY date ");
				
				if(!$result)
      				{
       					 die(mysqli_error($con));
      				} 
				
			while ($count < 1 && $row = mysqli_fetch_assoc($result))
			
			{
				
              echo '<h1 style="color: rgb(255,255,255);">' . $row['title'] . '</h1>';
              echo '<p>'. $row['msg'] . '</p>';
			  $count++;
			
			}
			
			
              
            echo '</div>';
          echo '</div>';
        echo '</div>';
        echo '<div class="item">';
          echo '<img src="file:///C|/Users/Adiyiah/Desktop/Pep_Rally_for_Obama_Poster_by_mattalaio.jpg" alt="Second slide">';
          echo '<div class="container">';
            echo '<div class="carousel-caption">';
			while ($count < 2 && $row = mysqli_fetch_assoc($result))
			{
              echo '<h1 style="color: rgb(255,255,255);">' . $row['title'] . '</h1>';
              echo '<p>'. $row['msg'] . '</p>';
			  $count++;
			}
              
            echo '</div>';
          echo '</div>';
        echo '</div>';
        echo '<div class="item">';
         echo ' <img src="file:///C|/Users/Adiyiah/Desktop/test_taking.jpg" alt="Third slide">';
          echo '<div class="container">';
            echo '<div class="carousel-caption">';
			while ($count < 3 && $row = mysqli_fetch_assoc($result))
			{
              echo '<h1 style="color: rgb(255,255,255);">' . $row['title'] . '</h1>';
              echo '<p>'. $row['msg'] . '</p>';
			  $count++;
			}
             
			  
		}
           echo '</div>';
          echo '</div>';
        echo '</div>';
      echo '</div>';
	  ?>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
	  
    </div><!-- /.carousel -->



    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

                
          <div class="row-fluid">
            <div class="span4" style="margin-left:35px;">
              <h2 style="margin-top:-60px;">Roster List</h2>
              <ol type="square" style="padding:10px;">
              <?php
			  while ($row = mysqli_fetch_assoc($result3))
			{
				$sid= $row['studentid'];
				$names = mysqli_query($con," SELECT lname, fname FROM users WHERE id= $sid ORDER By lname ASC "); 
				
				if(!$names)
      				{
       					 die(mysqli_error($con));
      				}
				
				  while ($row = mysqli_fetch_assoc($names))
				{
        		 echo "<li>"  . $row['lname'] . ',' .  $row['fname'] .  "</li>" ;
				 
				}
			
			}
			  ?>
        </ol>
            </div><!--/span-->
            <div class="span4" style="margin-left:250px;">
              <h2 style="margin-top:-60px; margin-left:-15px">Notification</h2>
              <ul type="square">
          			
                        
                    </ul>
           
            </div><!--/span-->
            </div>
            
            <div class="row-fluid">
            
            
            </div>
            
            <div class="row-fluid">
            <div class="spanstaff" style="margin-top:50px;">
              <h2 align="center" style="margin-top:-60px; margin-left:-30px;">Helpful Links</h2>
               <ul style="margin-left:370px;">
             <span class="websitefont">
             </span>
             <?php
             while ($row2 = mysqli_fetch_assoc($b))
			 {
				 $tid= $row2['teacherid'];
				 $result2 = mysqli_query($con,"SELECT * FROM teacherlink WHERE teacherid=$tid ");
				 
				while ($row = mysqli_fetch_assoc($result2))
			 { 
			
			  echo "<li>" . "<span class=" .'websitefont' .">" . "<a href =" . $row['url'] .">" . $row['name'] . "</a>". "</span>" . "</li>" ;
          	 //<li><span class="websitefont"><a href="http://www.howtostudy.org/">How-to- study</a></span></li>
		   
		   
			 }
			}
         
         	?>
         </ul>
            </div><!--/span-->
            </div>
            
      
      </div><!--/row-->

      <hr>
	      

			<!-- Copyright Area -->
			<hr>
			<div class="footer">
				<p>&copy; 2013</p>
			</div>
		</div>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script>
 
  jQuery( document ).ready(function($) {
    
	
	 $('#myCarousel').carousel({
                interval: 10000
        });
 
        $('#carousel-text').html($('#slide-content-0').html());
 
        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click( function(){
                var id_selector = $(this).attr("id");
                var id = id_selector.substr(id_selector.length -1);
                var id = parseInt(id);
                $('#myCarousel').carousel(id);
        });
 
 
        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid', function (e) {
                var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
	
});

 
  </script>
    <script src="jquery.js"></script>
    <script src="bootstrap-transition.js"></script>
    <script src="bootstrap-alert.js"></script>
    <script src="bootstrap-modal.js"></script>
    <script src="bootstrap-dropdown.js"></script>
    <script src="bootstrap-scrollspy.js"></script>
    <script src="bootstrap-tab.js"></script>
    <script src="bootstrap-tooltip.js"></script>
    <script src="bootstrap-popover.js"></script>
    <script src="bootstrap-button.js"></script>
    <script src="bootstrap-collapse.js"></script>
    <script src="bootstrap-carousel.js"></script>
    <script src="bootstrap-typeahead.js"></script>

  </body>