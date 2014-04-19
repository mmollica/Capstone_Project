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

   
 
$user= new User();	
    
$id= $user->data()->id;

$classid=$_GET['classid'];

$username=$user->data()->username;


?>

  <head>
    <meta charset="utf-8">
    <title>Main Forum</title>
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
ini_set('display_startup_errors', TRUE);
ini_set('display_errors',1); 
error_reporting(E_ALL);
require_once 'core/init.php';


    $con = mysqli_connect("localhost","host","test","capstone_db");

    if (!$con)
        {
             die('Could not connect: ' . mysqli_error($con));
        }

$result = mysqli_query($con,"SELECT * FROM forum_question WHERE classid= $classid ORDER BY id DESC");
// OREDER BY id DESC is order result by descending
  if(!$result)
        {
        die(mysqli_error($con));
        }
		
$classname=mysqli_query($con,"SELECT * FROM class WHERE id= $classid");

if(!$classname)
        {
        die(mysqli_error($con));
        }
?>
<?php
while($row=mysqli_fetch_assoc($classname))
{
	echo'<h3 style="margin-left:300px"> ' . $row['classname'] . ' Discussion Forum' . '</h3>'; 
}
?>

<table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td width="6%" align="center" bgcolor="#5bb75b"><strong>#</strong></td>
<td width="53%" align="center" bgcolor="#5bb75b"><strong>Topic</strong></td>
<td width="15%" align="center" bgcolor="#5bb75b"><strong>Views</strong></td>
<td width="13%" align="center" bgcolor="#5bb75b"><strong>Replies</strong></td>
<td width="13%" align="center" bgcolor="#5bb75b"><strong>Date/Time</strong></td>
</tr>

<?php
 
// Start looping table row
while ($rows = mysqli_fetch_assoc($result))
{

echo '<tr>';
echo '<td bgcolor="#FFFFFF">' . $rows['id'] . '</td>';
echo '<td bgcolor="#FFFFFF">' . '<a href="view_topic.php?classid= ' . $classid . '&forumid=' .$rows['id'] . ' ">' . $rows['topic'] . '</a>' . '<br>' . '</td>';
echo '<td align="center" bgcolor="#FFFFFF">' . $rows['view'] . '</td>';
echo '<td align="center" bgcolor="#FFFFFF">' . $rows['reply'] . '</td>';
echo '<td align="center" bgcolor="#FFFFFF">' . $rows['datetime'] . '</td>';
echo '</tr>';
}

mysqli_close($con);

?>

<tr>
<td colspan="5" align="right" bgcolor="#5bb75b"></td>
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