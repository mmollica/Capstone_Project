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
$group=0;

$user= new User();	
    
$id= $user->data()->id;
$username=$user->data()->username;
$fname=$user->data()->fname;
$lname=$user->data()->lname;

date_default_timezone_set('America/New_York');

	
$result = mysqli_query($con," SELECT * FROM staffmessage ORDER BY date "); 
	
$result2 = mysqli_query($con,"SELECT * FROM link ");

	
$result3 = mysqli_query($con,"SELECT classid FROM classassign WHERE studentid= $id OR teacherid=$id ");
	
$result4 = mysqli_query($con,"SELECT clubid FROM clubassign WHERE studentid= $id OR teacherid=$id ");

$result5 = mysqli_query($con,"SELECT studentid FROM parent_student_match WHERE parentid= $id");

$type = mysqli_query($con," SELECT groups FROM users WHERE id= $id ");
				
$result41 = mysqli_query($con,"SELECT clubid FROM clubassign WHERE studentid= $id OR teacherid=$id ");

$result51 = mysqli_query($con,"SELECT studentid FROM parent_student_match WHERE parentid= $id");				


  /*  if(!$result)
        {
        die(mysqli_error($con));
        }
		
	if(!$result2)
        {
        die(mysqli_error($con));
        }
		
	if(!$result3)
      {
        die(mysqli_error($con));
      }
		
	if(!$result4)
        {
        die(mysqli_error($con));
        }
		
	if(!$result5)
        {
        die(mysqli_error($con));
        }*/
		
		
		
		
	if(!$type)
        {
        die(mysqli_error($con));
        }
		 
		 
		 while ($row = mysqli_fetch_assoc($type))
				{
					$group= $row['groups'];
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
              Logged in as <a href="#" class="navbar-link"><?php echo $username; ?></a>
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
				$time = date("l F jS Y h:i A");
				echo '<li>' . '<h5 style=" margin:auto;margin-top:0px;">' .'Welcome To The Hive- '. $fname . ' ' . $lname .  '</h5>' . '</li>';
				echo '<br>';
				echo '<li>' . $time . '</li>';
				?>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
        
     
        
           <div id="myCarousel" class= "carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <img src="file:///C|/Users/Adiyiah/Desktop/52212c70ea4f2.preview-620.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
            <?php
			while ($count < 1 && $row = mysqli_fetch_assoc($result))
			
			{
				
              echo '<h1 style="color: rgb(255,255,255);">' . $row['title'] . '</h1>';
              echo '<p>'. $row['msg'] . '</p>';
			  $count++;
			
			}
			
			
              echo '<p> <a class="btn btn-med btn-success" href="#" role="button">Sign up today</a> </p>';
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
              <h2 style="margin-top:-60px;">Class List</h2>
              <ul type="square" style="padding:10px;">
              <?php
			  
			  if ($group==4)
			  {
				  
				   while ($row = mysqli_fetch_assoc($result5))
				{
					$sid= $row['studentid'];
				  
				  $class = mysqli_query($con,"SELECT classid FROM classassign WHERE studentid= $sid ");
				  
				  	 while ($row2 = mysqli_fetch_assoc($class))
					{
						$cid= $row2['classid'];
						$names = mysqli_query($con," SELECT classname FROM class WHERE id= $cid ");
						
						while ($row3 = mysqli_fetch_assoc($names))
						{
					
						 echo '<form id="class" action="classhomepage.php" method="post">';
					 	 echo '<input name="classid" type="hidden" value=' . $row2['classid'] .'>';
					 	 echo "<li>" . '<input name="Create" type="submit" value=' . $row3['classname'] .' class="btn btn-small btn-success" >' . "</li>" ;
                		 echo '</form>';
				 
						}
			
					}
					
					
					
					
				}
				  
				  
				  
				  
			  }
		
			  
			  
			  
			  
		else
		{	  
			  while ($row2 = mysqli_fetch_assoc($result3))
			{
				$cn= $row2['classid'];
				$names = mysqli_query($con," SELECT classname FROM class WHERE id= $cn ");
			
				
				if( $group==3)
				{
				  	while ($row = mysqli_fetch_assoc($names))
					{
					
					 echo '<form id="class" action="classhomepage.php" method="post">';
					 echo '<input name="classid" type="hidden" value=' . $row2['classid'] .'>';
					 echo "<li>" . '<input name="Create" type="submit" value=' . $row['classname'] .' class="btn btn-small btn-success">' . "</li>" ;
                	 echo '</form>';
				 
					}
					
				}
				
				
				
				else if( $group==2)
				{
					
					while ($row = mysqli_fetch_assoc($names))
					{
					
					 echo '<form id="class" action="teacherclasshomepage.php" method="post">';
					 echo '<input name="classid" type="hidden" value=' . $row2['classid'] .'>';
					 echo "<li>" . '<input name="Create" type="submit" value=' . $row['classname'] .' class="btn btn-small btn-success">' . "</li>" ;
                	 echo '</form>';
				 
					}
					
				}
			
			}
			
		}
			  ?>
             
        </ul>
             
            </div><!--/span-->
            <div class="span4" style="margin-left:250px;">
              <h2 style="margin-top:-60px; margin-left:-15px">Notification</h2>
              <ul type="square">
          			
                            <li> <a href="">Pre-Algebra Grade posted.</a></li>
                            <li> <a href="">Engish II Grade Posted</a></li>
                            <li> <a href="">Biology's Assignment posted.</a></li>
                    </ul>
              
            </div><!--/span-->
            </div>
            
            <div class="row-fluid">
            <div class="span4" style="margin-left:35px; margin-top:50px">
              <h2 style="margin-top:-60px;">My Club List</h2>
              <ul type="square">
          	<?php
			
			 if ($group==4)
			  {
				  
				   while ($row = mysqli_fetch_assoc($result51))
				{
					$sid= $row['studentid'];
					
						while ($row2 = mysqli_fetch_assoc($result41))
					{
						$cid= $row2['clubid'];
						$names = mysqli_query($con," SELECT clubname FROM club WHERE clubid= $cid "); 
				
				  			while ($row3 = mysqli_fetch_assoc($names))
						{
        					 echo "<li>" . "<a>" . $row3['clubname'] . "</li>" ;
				  			 echo '<form id="createclub" action="" method="post">';
				   			 echo '<input name="club" type="hidden" value=' . $cn .'>';
        
         		   			 echo '</form>';
				 
						}
			
					}
					
				}
				
			  }
					
				
				
				
		else
		{			
			  while ($row = mysqli_fetch_assoc($result4))
			{
				$cn= $row['clubid'];
				$names = mysqli_query($con," SELECT clubname FROM club WHERE clubid= $cn "); 
				
				  while ($row = mysqli_fetch_assoc($names))
				{
        		 echo "<li>" . "<a>" . $row['clubname'] . "</li>" ;
				   echo '<form id="createclub" action="" method="post">';
				   	echo '<input name="club" type="hidden" value=' . $cn .'>';
        
         		   echo '</form>';
				 
				}
			
			}
		}
			  ?>
          </ul>
              
            </div><!--/span-->
            <div class="span4" style="margin-left:250px; margin-top:50px">
              <h2 style="margin-top:-60px;">Upcoming Events</h2>
              <ul type="square">
        		<li type="square">Homecoming Pep Rally</li>
                <ul>
                	<li>March 14 2:00pm</li>
                </ul>
                <li>Spring Break</li>
                <ul>
                	<li>March 24-28</li>
                
                </ul>
        </ul>
            
            </div><!--/span-->
            </div>
            
            <div class="row-fluid">
            <div class="spanstaff" style="margin-top:50px;">
              <h2 align="center" style="margin-top:-60px; margin-left:-30px;">Helpful Links</h2>
               <ul style="margin-left:370px;">
             <span class="websitefont">
             </span>
             <?php
             while ($row = mysqli_fetch_assoc($result2))
			 {
			
			  echo "<li>" . "<span class=" .'websitefont' .">" . "<a href =" . $row['url'] .">" . $row['linkname'] . "</a>". "</span>" . "</li>" ;
          	 //<li><span class="websitefont"><a href="http://www.howtostudy.org/">How-to- study</a></span></li>
		   
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