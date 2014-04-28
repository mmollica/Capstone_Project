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
$name=$user->data()->username;
$id= $user->data()->id;

$classid=$_GET['classid'];
$result = mysqli_query($con,"SELECT * FROM assignment WHERE classid= $classid AND type=1"); 

$linkquery = mysqli_query($con,"SELECT * FROM link ");

if(Input::exists())
{
      $assignmentid = $_POST['assignmentid'];  
      date_default_timezone_set('America/New_York');
      $time = date("Y-m-d H:i:s");
      $query15 = mysqli_query($con, "SELECT * FROM assignment WHERE assignmentid=$assignmentid ");
      $duedate = 0;
      while($row=mysqli_fetch_assoc($query15))
      {
        $duedate = $row['duedate'];
      }

      if($time > $duedate)
      {
        $islate = 1;
      
      }
      else
      {
        $islate = 0;
   
      }
      
      if($_FILES['studentUpload']['name']==true)
      {
        $upload = new Upload();
        date_default_timezone_set('America/New_York');
        $time = date("Y-m-d H:i:s");
     
        $tmpName = $_FILES['studentUpload']["tmp_name"];
        $fileName = $_FILES['studentUpload']["name"];
        $fileSize = $_FILES['studentUpload']['size'];            
        $fileType = $_FILES['studentUpload']["type"];
        $fileData = file_get_contents($_FILES['studentUpload']['tmp_name']);
      
        if(!get_magic_quotes_gpc()) 
        {
            $fileName = addslashes($fileName);
        }
        /*move_uploaded_file($tmpName, "/temp/$fileName");
        $tmpName = "/temp/$fileName";

        $fp = fopen($tmpName, 'r');
        $content = fread($fp, filesize($tmpName));
        fclose($fp);*/

        $allowedExts = array("gif", "jpeg", "jpg", "png", "pdf", "txt", "doc", "docx");
        $temp = explode(".", $_FILES['studentUpload']["name"]);
        //$ext = end($temp);
        $temp2 = end($temp);
        $ext = (string) $temp2;
       
        if ((($_FILES['studentUpload']["type"] == "image/gif")
        || ($_FILES['studentUpload']["type"] == "image/jpeg")
        || ($_FILES['studentUpload']["type"] == "image/jpg")
        || ($_FILES['studentUpload']["type"] == "image/pjpeg")
        || ($_FILES["studentUpload"]["type"] == "text/plain")
        || ($_FILES["studentUpload"]["type"] == "application/msword")
        || ($_FILES["studentUpload"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
        || ($_FILES['studentUpload']["type"] == "image/x-png")
        || ($_FILES['studentUpload']["type"] == "application/pdf")
        || ($_FILES['studentUpload']["type"] == "image/png"))
        && ($_FILES['studentUpload']["size"] < 2097152)
        && in_array($ext, $allowedExts))
        {

            try
              {
                 
                  $upload->createstudent(array(
                    'studentid' => $id,
                    'classid' =>  $classid,
                    'date_added' => date("Y-m-d H:i:s"),
                    'comment'=> Input::get('comment'),
                    'assignmentid'=> Input::get('assignmentid'),
                    'file_name'=>$fileName,
                    'file_type'=>$fileType,
                    'file_size'=>$fileSize,
                    'file_data'=>$fileData,
                    'islate'=>$islate
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
      else
      {
        $upload = new Upload();
        date_default_timezone_set('America/New_York');
        $time = date("Y-m-d H:i:s");
        try
              {
                 
                  $upload->createstudent(array(
                    'studentid' => $id,
                    'classid' =>  $classid,
                    'date_added' => $time,
                    'comment'=> Input::get('comment'),
                    'assignmentid'=> Input::get('assignmentid'),
                    'islate'=>$islate
                              ));
              }
              catch(Exception $e)
              {
                die($e->getMessage());
              }
      }
}

?>

  <head>
    <meta charset="utf-8">
    <title>Upload Assignments</title>
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
  <script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
  <link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
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
              Logged in as <?php echo $name; ?>
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
         <div class="span9" style="height:850px">

          <div class="upload" >
            <h1 style="margin-top:-30px; margin-left:175px">Upload Assignments</h1>
            <br>
            <br>
          <form action="" method="post" name="assignupload" enctype="multipart/form-data">
     	    <span id="spryselect1">
     	    <span id="spryselect1">
                          <label for="assignment">Select Assignment:</label>
                         
                            <?php 
                        
                              echo "<select name='assignmentid'>";
                              
                              while($row = mysqli_fetch_assoc($result)) 
                              {  
                                echo '<option value="' . $row['assignmentid'] . '">' . $row['assignmentname'] . '</option>';
                              } 
                              echo "</select>";
                            ?> 
                         
                          <!--error message-->
                        <span class="selectRequiredMsg">Please select a teacher.</span></span>  
        
            <br>
            <br>
            <label for="comment"><b>Comment:</b></label>
            <textarea name='comment' cols="5" rows="3"></textarea>
            <br>
            <br>
            <input name="studentUpload" type="file" >
            <br>
            <br>
       <input name="submit" type="submit" value="Upload" class="btn btn-large btn-success" onClick="myFunction()">
            
             <?php 
              echo '<input name="classid" type="hidden" value=' .$classid .'>';
              ?>
          </form>
          <br>
          <p id="demo"></p>
          </div>
          </div><!--/row-->

      <hr>
	      

			<!-- Copyright Area -->
			<hr>  
			 <div id="footer">
      <div class="container">
                
           <p align="right"  style="color:#CCCCCC; text-align:right; margin-top:25px;">&copy; 2014 The Hive MS Inc. All rights reserved.</p>
            <h4 align="left" style="margin-top:-50px; text-align:left; color:#CCCCCC;">Helpful Links</h4>
               <ul>
             <span class="websitefont">
             </span>
             
			 <?php
             while ($row = mysqli_fetch_assoc($linkquery))
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

function uploadFunction()
{
	document.getElementById("aUpload").submit();	
}

function discussionFunction()
{
	document.getElementById("discuss").submit();	
}

function gradesFunction()
{
	document.getElementById("grade").submit();	
}

function myFunction()
{
var x;
var r=confirm("Are you sure this is the current assignement that you want to turn in?");
if (r==true)
  {
  x="Your Assignment has succeesfully been saved.";
  }

document.getElementById("demo").innerHTML=alert(x);
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
  <script type="text/javascript">
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
    </script>
  </body>