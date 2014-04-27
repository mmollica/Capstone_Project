<?php
ini_set('display_startup_errors', TRUE);
ini_set('display_errors',1); 
error_reporting(E_ALL);
require_once 'core/init.php';


   $con = mysqli_connect("localhost","mmollica","Thepw164","capstone_db");

    if (!$con)
        {
             die('Could not connect: ' . mysqli_error($con));
        }

   
$count=0;
$user= new User();  
$username=$user->data()->username;
$id= $user->data()->id;

$name= $user->data()->username;

$classid=$_POST['classid'];
 
$a = mysqli_query($con,"SELECT teacherid FROM class WHERE id= $classid ");
$b = mysqli_query($con,"SELECT teacherid FROM class WHERE id= $classid ");	

$c = mysqli_query($con,"SELECT teacherid FROM class WHERE id= $classid ");	

$d = mysqli_query($con,"SELECT classname FROM class WHERE id= $classid ");	
	
	
$result3 = mysqli_query($con,"SELECT studentid FROM classassign WHERE classid= $classid ");

$result2 = mysqli_query($con,"SELECT * FROM link ");
    
?>

  <head>
    <meta charset="utf-8">
    <title>Homepage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
       <link href="bootstrap.css" rel="stylesheet">
    <link href="faith.css" rel="stylesheet">
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
              Logged in as <?php echo $username; ?>
            </p>
            </p>
            <ul class="nav">
            
              <li class="active"><a href="userhomepage.php">Home</a></li>
              <li><a href="#about">Email</a></li>
              <li><a href="#about">Calendar</a></li>
              <li><a href="logout.php">Log Out</a></li>
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
             	<?php 
              echo '<li><a href="studentcontentpage.php?classid= ' . $classid . ' "> Content</a></li>';
              
              	?>
              
              <?php 
              echo '<li><a href="studentassignmentpage.php?classid= ' . $classid . ' "> Assignment</a></li>';
              
              	?>
              
              
              <?php 
              echo '<li><a href="studentuploadpage.php?classid= ' . $classid . ' "> Upload Assignment</a></li>';
              
              	?>
              
              <?php 
              echo '<li><a href="main_forumstudent.php?classid= ' . $classid . ' ">Discussion</a></li>';
              
              	?>
              <?php 
              echo '<li><a href="studentgrades.php?classid= ' . $classid . ' ">View Grades</a></li>';
              
                ?>

            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
        <?php
       echo ' <h2 style="margin-left:410px">';
        while ($row = mysqli_fetch_assoc($d))
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
				$result = mysqli_query($con," SELECT * FROM teachermessage WHERE classid=$classid ORDER BY date ");
				
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


     <hr>  
			 <div id="footer">
      <div class="container">
                
           <p align="right"  style="color:#CCCCCC; text-align:right; margin-top:25px;">&copy; 2014 The Hive MS Inc. All rights reserved.</p>
            <h4 align="left" style="margin-top:-50px; text-align:left; color:#CCCCCC;">Helpful Links</h4>
               <ul>
             <span class="websitefont">
             </span>
             
			 <?php
             while ($row = mysqli_fetch_assoc($result2))
			 {
				 echo '<div class="span2" style="width:50px;">';
			
			  echo "<li  style='text-align:left'>" . "<span class=" .'websitefont' .">" . "<a href =" . $row['url'] .">" . $row['linkname'] . "</a>". "</span>" . "</li>" ;
			  echo '</div>';
          	 //<li><span class="websitefont"><a href="http://www.howtostudy.org/">How-to- study</a></span></li>
		   
			 }
         
         	?>
         </ul>
      </div>
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

function classFunction()
{
	document.getElementById("content").submit();	
}

function workFunction()
{
	document.getElementById("assignment").submit();	
}

function quizFunction()
{
	document.getElementById("quiz").submit();	
}

function discussionFunction()
{
	document.getElementById("discuss").submit();	
}

function gradesFunction()
{
	document.getElementById("grade").submit();	
}

function uploadFunction()
{
	document.getElementById("aUpload").submit();	
}
 
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