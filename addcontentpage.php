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

$classid=$_GET['classid'];

$username=$user->data()->username;
if(Input::exists())
{
      
      $upload = new Upload();
      date_default_timezone_set('America/New_York');
      $time = date("Y-m-d H:i:s");
      
      $tmpName = $_FILES['content']["tmp_name"];
      $fileName = $_FILES['content']["name"];
      $fileSize = $_FILES['content']['size'];            
      $fileType = $_FILES['content']["type"];
      $fileData = file_get_contents($_FILES['content']['tmp_name']);

      if(!get_magic_quotes_gpc()) 
      {
          $fileName = addslashes($fileName);
      }
      /*move_uploaded_file($tmpName, "/temp/$fileName");
      $tmpName = "/temp/$fileName";

      $fp = fopen($tmpName, 'r');
      $content = fread($fp, filesize($tmpName));
      fclose($fp);*/
  

   
      $allowedExts = array("gif", "jpeg", "jpg", "png", "pdf", "txt", "doc", "xdoc");
      $temp = explode(".", $_FILES['content']["name"]);
      //$ext = end($temp);
      $temp2 = end($temp);
      $ext = (string) $temp2;

      if ((($_FILES['content']["type"] == "image/gif")
      || ($_FILES['content']["type"] == "image/jpeg")
      || ($_FILES['content']["type"] == "image/jpg")
      || ($_FILES['content']["type"] == "image/pjpeg")
      || ($_FILES["content"]["type"] == "text/plain")
      || ($_FILES["content"]["type"] == "application/msword")
      || ($_FILES["content"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
      || ($_FILES['content']["type"] == "image/x-png")
      || ($_FILES['content']["type"] == "application/pdf")
      || ($_FILES['content']["type"] == "image/png"))
      && ($_FILES['content']["size"] < 1024000)
      && in_array($ext, $allowedExts))
      {
          try
            {
                $upload->createassignment(array(
                  'classid' =>  $classid,
                  'date_added' => $time,
                  'description'=> Input::get('description'),
                  'assignmentname'=> Input::get('assignmentname'),
                  'type'=> 2,
                  'file_name'=>$fileName,
                  'file_type'=>$fileType,
                  'file_size'=>$fileSize,
                  'file_data'=>$fileData
                            ));
            }
            catch(Exception $e)
            {
        die($e->getMessage());
            }
        }
      else
        echo "Not acceptable file.";
    
}

?>

  <head>
    <meta charset="utf-8">
    <title>Add Content</title>
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
              <li><a href="userhomepage.php">Home</a></li>
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
              
              <li><a href="#">Grades</a></li>
	
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
         <div class="span9" style="height:850px">

          <div class="viewbox" >
            <h1 style="margin-top:-30px; margin-left:250px">Add Content</h1>
            <br>
    
              
             <ol type="square" style="padding:10px;">
           	<?php	
      			 echo '<form id="content" method="post" action="teachercontentpage.php" >';
      			 echo '<label><b>Title:</b></label>';
      			 echo '<input name="assignmentname" type="text" maxlength="50" size="30">';
      			 echo '<br>';
      			 echo '<br>';
      			 echo '<label><b>Description:</b></label>';
      			 echo '<textarea name="description" cols="5" rows="3"></textarea>';
      			 echo '<br>';
      			 echo '<br>';
      			 echo '<label><b>File Upload</b></label>';
      			 echo '<input name="content" type="file">';
      			 echo '<br>';
      			 echo '<br>';
      			 echo '<input name="classid" type="hidden" value=' .$classid .'>';
      			 echo '<input name="add" type="submit" value="Add" class="btn btn-large btn-success">';
      			 echo '</form>';
      			 echo"<br>";   
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