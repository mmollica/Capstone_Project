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
    
$userid= $user->data()->id;

$classid=$_GET['classid'];

$forumid=$_GET['forumid'];

$username=$user->data()->username;

// get value of id that sent from address bar 


$result = mysqli_query($con,"SELECT * FROM forum_question WHERE id= $forumid");
	
	if(!$result)
      {
        die(mysqli_error($con));
      }
	  
$result2 = mysqli_query($con,"SELECT * FROM forum_answer WHERE question_id= $forumid");

	
?>

  <head>
    <meta charset="utf-8">
    <title>View Topic</title>
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
		<?php

while($row= mysqli_fetch_assoc($result))
{

echo '<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">';
echo '<tr>';
echo '<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bordercolor="1" bgcolor="#FFFFFF">';
echo '<tr>';
echo '<td bgcolor="#F8F7F1">' . '<strong>' . $row['topic'] . '</strong>' . '</td>';
echo '</tr>';

echo '<tr>';
echo '<td bgcolor="#F8F7F1">' .$row['detail'] . '</td>';
echo '</tr>';



echo '<tr>';
echo '<td bgcolor="#F8F7F1">' . '<strong>Date/time : </strong>' . $row['datetime'] . '</td>';
echo '</tr>';
echo '</table></td>';
echo '</tr>';
echo '</table>';

}
?>
<br>

<?php

if($result2)
{
	
while($rows=mysqli_fetch_assoc($result2))
{



echo '<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">';
echo ' <tr>';
echo '<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">';

echo '<tr>';
echo '<td width="18%" bgcolor="#F8F7F1"><strong>Name</strong></td>';
echo '<td width="5%" bgcolor="#F8F7F1">:</td>';
echo '<td width="77%" bgcolor="#F8F7F1">' . $rows['a_name'] . '</td>';
echo '</tr>';

echo '<tr>';
echo '<td bgcolor="#F8F7F1"><strong>Answer</strong></td>';
echo '<td bgcolor="#F8F7F1">:</td>';
echo '<td bgcolor="#F8F7F1">' . $rows['a_answer'] . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td bgcolor="#F8F7F1">' . '<strong>Date/Time</strong>' . '</td>';
echo '<td bgcolor="#F8F7F1">:</td>';
echo '<td bgcolor="#F8F7F1">' . $rows['a_datetime'] . '</td>';
echo '</tr>';
echo '</table></td>';
echo '</tr>';
echo '</table><br>';
}

}

?>
 
<?php

$sql3="SELECT view FROM forum_question WHERE id='$forumid'";
$result3=mysqli_query($con,$sql3);
$rows=mysqli_fetch_array($result3);
$view=$rows['view'];
// if have no counter value set counter = 1
if($view==0)
{
	$view++;
	$sql54="update forum_question set view = '$view' WHERE id= $forumid";
	$result4=mysqli_query($con,$sql54);
}
// count more value
$view++;
$sql100="update forum_question set view = '$view' WHERE id= $forumid";
$result100=mysqli_query($con,$sql100);



mysqli_close($con);
?>

<BR>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="add_answer.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td width="18%"><strong>Name</strong></td>
<td width="3%">:</td>
<td width="79%"><input name="a_name" type="text" id="a_name" size="45"></td>
</tr>

<tr>
<td valign="top"><strong>Answer</strong></td>
<td valign="top">:</td>
<td><textarea name="a_answer" cols="45" rows="3" id="a_answer"></textarea></td>
</tr>
<tr>
<td>&nbsp;</td>
<?php
echo '<td><input name="forumid" type="hidden" value=' . $forumid . '></td>';
echo '<td><input name="classid" type="hidden" value=' . $classid . '></td>';
echo '<td><input type="submit" name="Submit" value="Submit"> <input type="reset" name="Submit2" value="Clear" style="margin-left:90px"></td>';
echo '</tr>';
echo '</table>';
echo '</td>';
echo '</form>';
?>
</tr>
</table>
          
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