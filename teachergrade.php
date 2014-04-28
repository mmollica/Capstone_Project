<?php
ini_set('display_startup_errors', TRUE);
ini_set('display_errors',1); 
error_reporting(E_ALL);
require_once 'core/init.php';


  $con = mysqli_connect("localhost","mmollica","Thepw164", "capstone_db"); 

    if (!$con)
        {
             die('Could not connect: ' . mysqli_error($con));
        }

   
 
$user= new User();	
    
$id= $user->data()->id;
$name= $user->data()->username;
$idlink=$_GET['classid'];


$result = mysqli_query($con,"SELECT * FROM assignment WHERE classid= $idlink AND type=1");

 if(!$result)
        {
        die(mysqli_error($con));
        }
if(Input::exists())
{

  $total = Input::get('points');
  
  $count = count($total);

  for($y = 0; $y < $count; $y++)
        {
            
            $total = Input::get('points');
            $assignmentid = Input::get('assignmentid');
            $studentid = Input::get('studentid');
            $islate = Input::get('islate');
            $classid = Input::get('classid');
            $points = Input::get('newpoints');
            $gradeid = Input::get('gradeid');
            if(isset($total[$y]))
            {
              $total = $total[$y];
            }
            if(isset($assignmentid[$y]))
            {
              $assignmentid = $assignmentid[$y];
            }
            if(isset($studentid[$y]))
            {
              $studentid = $studentid[$y];
            }
            if(isset($islate[$y]))
            {
              $islate = $islate[$y];
            }
            if(isset($classid[$y]))
            {
              $classid = $classid[$y];
            }

            $grade = new Grades();
            date_default_timezone_set('America/New_York');
            $time = date("Y-m-d H:i:s");
           

            if(isset($gradeid[$y]))
            {
              $gradeid = $gradeid[$y];
              $update = mysqli_query($con, "UPDATE grades SET points='$total' WHERE gradeid= $gradeid AND studentid= $studentid");  
            }
            else
            {
              try
                {
                  
                  $grade->create(array(
                  'classid'=>$classid,
                  'assignmentid'=>$assignmentid,
                  'studentid'=>$studentid,
                  'points'=>$total,
                  'date'=>$time,
                  'islate'=>$islate
                  
                  ));
               }
               catch(Exception $e)
               {
                  
               }
            }
        }
}
?>

  <head>
    <meta charset="utf-8">
    <title>Grades</title>
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
	  
	  .table-bordered {
border: 1px solid #dddddd;
border-collapse: separate;
border-left: 0;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;
}

.table {
width: 100%;
margin-bottom: 20px;
background-color: transparent;
border-collapse: collapse;
border-spacing: 0;
display: table;
}

.widget.widget-table .table {
margin-bottom: 0;
border: none;
}

.widget.widget-table .widget-content {
padding: 0;
}

.widget .widget-header + .widget-content {
border-top: none;
-webkit-border-top-left-radius: 0;
-webkit-border-top-right-radius: 0;
-moz-border-radius-topleft: 0;
-moz-border-radius-topright: 0;
border-top-left-radius: 0;
border-top-right-radius: 0;
}

.widget .widget-content {
padding: 20px 15px 15px;
background: #FFF;
border: 1px solid #D5D5D5;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
border-radius: 5px;
}

.widget .widget-header {
position: relative;
height: 40px;
line-height: 40px;
background: #E9E9E9;
background: -moz-linear-gradient(top, #fafafa 0%, #e9e9e9 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fafafa), color-stop(100%, #e9e9e9));
background: -webkit-linear-gradient(top, #fafafa 0%, #e9e9e9 100%);
background: -o-linear-gradient(top, #fafafa 0%, #e9e9e9 100%);
background: -ms-linear-gradient(top, #fafafa 0%, #e9e9e9 100%);
background: linear-gradient(top, #fafafa 0%, #e9e9e9 100%);
text-shadow: 0 1px 0 #fff;
border-radius: 5px 5px 0 0;
box-shadow: 0 2px 5px rgba(0,0,0,0.1),inset 0 1px 0 white,inset 0 -1px 0 rgba(255,255,255,0.7);
border-bottom: 1px solid #bababa;
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#FAFAFA', endColorstr='#E9E9E9');
-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr='#FAFAFA', endColorstr='#E9E9E9')";
border: 1px solid #D5D5D5;
-webkit-border-top-left-radius: 4px;
-webkit-border-top-right-radius: 4px;
-moz-border-radius-topleft: 4px;
-moz-border-radius-topright: 4px;
border-top-left-radius: 4px;
border-top-right-radius: 4px;
-webkit-background-clip: padding-box;
}

thead {
display: table-header-group;
vertical-align: middle;
border-color: inherit;
}

.widget .widget-header h3 {
top: 2px;
position: relative;
left: 10px;
display: inline-block;
margin-right: 3em;
font-size: 14px;
font-weight: 600;
color: #555;
line-height: 18px;
text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.5);
}

.widget .widget-header [class^="icon-"], .widget .widget-header [class*=" icon-"] {
display: inline-block;
margin-left: 13px;
margin-right: -2px;
font-size: 16px;
color: #555;
vertical-align: middle;
}
    </style>
    <link href="bootstrap-responsive.css" rel="stylesheet">
    <script src="ajax_req.js" type="text/javascript"></script>

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
                window.open ("downloadstudent.php?fileId="+id, "hiddenFrame");
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
              Logged in as <?php echo $name;?>
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
              echo '<li><a href="teachercontentpage.php?classid= ' . $idlink . ' "> Content</a></li>';
              
                ?>
              
              <?php 
              echo '<li><a href="teacherassignmentpage.php?classid= ' . $idlink . ' "> Assignment</a></li>';
              
                ?>
                   <?php 
              echo '<li><a href="create_topic.php?classid= ' . $idlink . ' "> Create Topic </a></li>';
              
                ?>

              <?php 
              echo '<li><a href="main_forum.php?classid= ' . $idlink . ' ">Discussions</a></li>';
              
                ?>
                 
                <?php 
              echo '<li><a href="teachermessage.php?classid= ' . $idlink . ' ">Create Message</a></li>';
              
                ?>
                <?php
                echo'<li><a href="teachergrade.php?classid= '  . $idlink . ' ">Grades</a></li>';
        
              ?>
              <?php
                echo'<li><a href="viewroster.php?classid= '  . $idlink . ' ">View Roster</a></li>';
        
              ?>

	
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
         <div class="span9" style="height:850px">

         
            <h1 style="text-align:center; margin-left: -200px;">Grades</h1>
            <br>
 			
 					<form name='grades' action='' method='post'>
					
 					<label >Select an Assignment:</label>
				<select name="assignmentid" onChange="htmlData('removegrade.php', 'grade='+this.value)" />
  				<option value="#">-Select-</option>
  				<?php 
  					//$con = mysqli_connect("localhost","host","test", "capstone_db");
					//$result = mysqli_query($con,"SELECT * FROM assignment WHERE classid = $classid");
					while($row = mysqli_fetch_assoc($result)) 
                              {  
                                echo '<option value="' . $row['assignmentid'] . '">' . $row['assignmentname'] . '</option>';
                              } 
					mysqli_close($con);
				?> 
				</select>

				<div id="txtResult"></div>


   </form>
          </div><!--/row-->

      <hr>
	      

			<!-- Copyright Area -->
			<hr>
			<div class="footer">
				
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