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

if ($clubid=$_POST['clubid']==false)

{

  $clubid=$_GET['clubid'];
}

else
{
  $clubid=$_POST['clubid'];
}
 
$a = mysqli_query($con,"SELECT teacherid FROM club WHERE id= $clubid ");
$b = mysqli_query($con,"SELECT teacherid FROM club WHERE id= $clubid ");	

$c = mysqli_query($con,"SELECT teacherid FROM club WHERE id= $clubid ");	

$d = mysqli_query($con,"SELECT clubname FROM club WHERE id= $clubid ");	
	

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
              echo '<li><a href="clubhomepage.php?clubid= ' . $clubid . ' ">Discussion</a></li>';
              
                ?>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9" style="height:850px">

          
<?php

$result = mysqli_query($con,"SELECT * FROM clubforum_question WHERE clubid= $clubid ORDER BY id DESC");
// OREDER BY id DESC is order result by descending
  if(!$result)
        {
        die(mysqli_error($con));
        }
		
$clubname=mysqli_query($con,"SELECT * FROM club WHERE id= $clubid");

if(!$clubname)
        {
        die(mysqli_error($con));
        }
?>

<?php
echo ' <div class="widget stacked widget-table action-table">';
    				
				echo '<div class="widget-header">';
					echo '<i class="icon-th-list"></i>';
while($row=mysqli_fetch_assoc($clubname))
{
	echo'<h2 style="margin-top:-15px;margin-left:300px;"> ' . $row['clubname'] . ' Discussion Forum' . '</h2>'; 
	echo '</div>';
}
?>
<div class="widget-content">
<table class="table table-striped table-bordered">

<thead>
<tr>
<th><strong>#</strong></th>
<th><strong>Topic</strong></th>
<th><strong>Views</strong></th>
<th><strong>Replies</strong></th>
<th><strong>Date/Time</strong></th>
</tr>
</thead>

<?php
 
// Start looping table row
while ($rows = mysqli_fetch_assoc($result))
{

echo '<tr>';
echo '<td>' . $rows['id'] . '</td>';
echo '<td>' . '<a href="view_clubtopicstudent.php?clubid= ' . $clubid . '&forumid=' .$rows['id'] . ' ">' . $rows['topic'] . '</a>' . '<br>' . '</td>';
echo '<td align="center">' . $rows['view'] . '</td>';
echo '<td align="center">' . $rows['reply'] . '</td>';
echo '<td align="center">' . $rows['datetime'] . '</td>';
echo '</tr>';
}
echo '</table>';
echo  '</div>';
echo '</div>';
mysqli_close($con);

?>

          </div><!--/row-->

      <hr>



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