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
$username=$user->data()->username;
$userid= $user->data()->id;

$clubid=$_GET['clubid'];

$forumid=$_GET['forumid'];



$sname=$user->data()->fname;

$slname=$user->data()->lname;

// get value of id that sent from address bar 


$result = mysqli_query($con,"SELECT * FROM clubforum_question WHERE id= $forumid");
	
	if(!$result)
      {
        die(mysqli_error($con));
      }
	  
$result2 = mysqli_query($con,"SELECT * FROM clubforum_answer WHERE question_id= $forumid");

$linkquery = mysqli_query($con,"SELECT * FROM link ");	
?>

  <head>
    <meta charset="utf-8">
    <title>View Topic</title>
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

.wrapword{
white-space: -moz-pre-wrap !important;  /* Mozilla, since 1999 */
white-space: -pre-wrap;      /* Opera 4-6 */
white-space: -o-pre-wrap;    /* Opera 7 */
white-space: pre-wrap;       /* css-3 */
word-wrap: break-word;       /* Internet Explorer 5.5+ */
word-break: break-all;
white-space: normal;
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
              echo '<li><a href="clubhomepage.php?clubid= ' . $clubid . ' ">Discussion</a></li>';
              
                ?>
             
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
          <div class="span9" style="height:850px">
		<?php

while($row= mysqli_fetch_assoc($result))
{
echo ' <div class="widget stacked widget-table action-table">';
 
 
   				
				echo '<div class="widget-header">';
					echo '<i class="icon-th-list"></i>';
					echo '<h2 align="center" style="margin-top:-15px;"> Topic:' . $row['topic'] . '</h2>';
				echo '</div>'; 
				
				echo '<div class="widget-content">';
					

echo "<table class='table table-striped table-bordered'>";
echo '<thead>';
echo '<th colspan="5" align="right" style="text-align:right">' . $row['datetime'] . '</th>';
echo '</thead>';
echo '<tbody>';


echo '<tr>';
echo '<td align="left" style="text-align:left; overflow:auto;" height="100px" class="wrapword" >' .$row['detail'] . '</td>';
echo '</tr>';
echo '</tbody>';
echo '</table>';
echo '</div>';
echo '</div>';
}
?>
<br>

<?php

if($result2)
{
	
while($rows=mysqli_fetch_assoc($result2))
{

echo ' <div class="widget stacked widget-table action-table">';
 
 
   				
				echo '<div class="widget-header">';
					echo '<i class="icon-th-list"></i>';
					echo '<h2 align="center" style="margin-top:-15px;">' . $rows['a_title'] . '</h2>';
				echo '</div>'; 
				
				echo '<div class="widget-content">';
					

echo "<table class='table table-striped table-bordered'>";
echo '<thead>';
echo '<th colspan="5" align="right" style="text-align:right">' . $rows['a_name'] . '-' . $rows['a_datetime'] . '</th>';
echo'</thead>';
echo '<tbody>';
echo '<tr>';
echo '<td align="left" style="text-align:left" height="100px" class="wrapword" >' . $rows['a_answer'] . '</td>';
echo '</tr>';
echo '</tbody>';
echo '</table>';
echo '</div>';
echo '</div>';
echo '<br>';
}

}

?>
 
<?php

$sql3="SELECT view FROM clubforum_question WHERE id='$forumid'";
$result3=mysqli_query($con,$sql3);
$rows=mysqli_fetch_array($result3);
$view=$rows['view'];
// if have no counter value set counter = 1
if($view==0)
{
	$view++;
	$sql54="update clubforum_question set view = '$view' WHERE id= $forumid";
	$result4=mysqli_query($con,$sql54);
}
// count more value
$view++;
$sql100="update clubforum_question set view = '$view' WHERE id= $forumid";
$result100=mysqli_query($con,$sql100);



mysqli_close($con);
?>

<BR>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="add_clubanswerstudent.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td width="18%"><strong>Title:</strong></td>

<td width="79%"><input name="a_title" type="text" id="a_title" size="45"></td>
</tr>
<tr>


<?php echo '<td width="79%">' . '<input name="a_name" type="hidden" id="a_name" value=" ' . $sname . ' ' . $slname . ' " size="45">' . '</td>'; ?>
</tr>
<tr>
<td valign="top"><strong>Answer:</strong></td>

<td><textarea name="a_answer" rows="6"  cols="75" id="a_answer"></textarea></td>
</tr>
<tr>
<td>&nbsp;</td>
<?php
echo '<td><input name="forumid" type="hidden" value=' . $forumid . '></td>';
echo '<td><input name="clubid" type="hidden" value=' . $clubid . '></td>';
echo '<td><input type="submit" name="Submit" value="Submit" style="margin-left:-238px" class="btn btn-small btn-success" > <input type="reset" name="Submit2" value="Reset" style="margin-left:25px" class="btn btn-small btn-success"></td>';
echo '</tr>';
echo '</table>';
echo '</td>';
echo '</form>';
?>
</tr>
</table>
          
          </div><!--/row-->

      <hr>
	      
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