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

   
 
$user= new User();	
    
$id= $user->data()->id;

$username= $user->data()->username;

$classid=$_GET['classid'];


$result = mysqli_query($con,"SELECT * FROM assignment WHERE classid= $classid AND type=2 ");

 if(!$result)
        {
        die(mysqli_error($con));
        }
    
?>

  <head>
    <meta charset="utf-8">
    <title>Content</title>
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
  <script language="JavaScript">
            function download (id)
            {
                window.open ("download.php?fileId="+id, "hiddenFrame");
            }
</script>
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
              echo '<li><a href="teachercontentpage.php?classid= ' . $classid . ' "> Content</a></li>';
              
              	?>
              
              <?php 
              echo '<li><a href="teacherassignmentpage.php?classid= ' . $classid . ' "> Assignment</a></li>';
              
              	?>
              
                   <?php 
              echo '<li><a href="create_topic.php?classid= ' . $classid . ' "> Create Topic </a></li>';
              
                ?>

              <?php 
              echo '<li><a href="main_forum.php?classid= ' . $classid . ' ">Discussions</a></li>';
              
                ?>
                
                <?php 
              echo '<li><a href="teachermessage.php?classid= ' . $classid . ' ">Create Message</a></li>';
              
                ?>
              <li><a href="#">Grades</a></li>
	
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
         <div class="span9" style="height:850px">

          <div class="viewbox" >
            <h1 style="margin-top:-30px; margin-left:250px">Content</h1>
            <?php 
              echo '<form id="edit" method="get" action="addcontentpage.php" >';
              echo '<input name="classid" type="hidden" value=' .$classid .'>';
			  echo '<input name="add" type="submit" value="Add Content" style="margin-left:600px" class="btn btn-large btn-success">';
              echo '</form>';
              ?>
            <br>
    
              
             <ol type="square" style="padding:10px;">
           	<?php
        	while ($row = mysqli_fetch_assoc($result))
			{	
  			if($row['file_name']==true)
        {
          $assignmentid= $row['assignmentid'];
    			echo '<form id="content" method="get" action="editcontentpage.php" >';
          echo "<li style='margin-left:-40px'><a href='javascript:download(".$row['assignmentid'].")'> ".$row['assignmentname']."</a></li>";
          echo '<li>' . 'Description:' . '<br />' . $row['description'] . '</li>';
    			echo '<input name="Edit" type="submit" value="Edit" class="btn btn-med btn-success" style=" margin-left:250px;margin-top:-30px;">';
    			echo '<input name="contentid" type="hidden" value=' .$assignmentid .'>';
    			echo '<input name="classid" type="hidden" value=' .$classid .'>';
    			echo '</form>';
    			echo"<br>";
        }
        else
        {
          $assignmentid= $row['assignmentid'];
          echo '<form id="content" method="get" action="editcontentpage.php" >';
          echo "<li style='margin-left:-40px'>".$row['assignmentname']."</a></li>";
          echo '<li>' . 'Description:' . '<br />' . $row['description'] . '</li>';
          echo '<input name="Edit" type="submit" value="Edit" class="btn btn-med btn-success" style=" margin-left:250px;margin-top:-30px;">';
          echo '<input name="contentid" type="hidden" value=' .$assignmentid .'>';
          echo '<input name="classid" type="hidden" value=' .$classid .'>';
          echo '</form>';
          echo"<br>";
        }
			}
               
			?>
      		 </ol>
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