<?php
ini_set('display_startup_errors', TRUE);
ini_set('display_errors',1); 
error_reporting(E_ALL);
require_once 'core/init.php';

$user = new User();
$name = $user->data()->username;


$con = mysqli_connect("localhost","mmollica","Thepw164","capstone_db");
$linkquery = mysqli_query($con,"SELECT * FROM link ");
?>

  <head>
    <meta charset="utf-8">
    <title>Edit Class</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="bootstrap.css" rel="stylesheet">    
    <link href="faith.css" rel="stylesheet">
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
  <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
  <script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
  <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
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
              Logged in as <?php echo $name;?>
            </p>
            <ul class="nav">
              <li><a href="staffhomepage.php">Home</a></li>
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
             <li class="nav-header">Users</li>
              <li ><a href="createusers.php">Create</a></li>
              <li ><a href="editusers.php">Edit</a></li>
              <li><a href="viewusers.php">View</a></li>
              <li><a href="assignparent.php">Assign a Parent to a Student</a></li>
              
              <li class="nav-header">Classes</li>
              <li><a href="createclasses.php">Create</a></li>
              <li class="active"><a href="editclasses.php">Edit</a></li>
              <li><a href="viewclass.php">View</a></li>
              <li><a href="assignstudent.php">Assign a Student to a Class</a></li>
              
              <li class="nav-header">Clubs</li>
              <li><a href="createclub.php">Create</a></li>
              <li><a href="editclub.php">Edit</a></li>
              <li><a href="viewclub.php">View</a></li>
              <li><a href="assignclub.php">Assign a Student to a Club</a></li>
              
              <li class="nav-header">Links</li>
              <li ><a href="createlink.php">Create</a></li>
              <li><a href="editlink.php">Edit</a></li>
          
              
              <li class="nav-header"> School Messages</li>
              <li><a href="createmessage.php">Create</a></li>
              <li><a href="editmessage.php">Edit</a></li> 
            
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9" style="height:850px">
          <div class="login2" >
            <h1 style="margin-top:-60px; margin-left:215px;">Edit Classes</h1>
            
            <form id="updateclass" action="processclasses.php" method="post" style="margin-left:215px;">
            <label for="Class ID">Class ID:</label>
            <select name="classid" id="Class ID">
             <?php $con = mysqli_connect("localhost","mmollica","Thepw164", "capstone_db"); ?> 
					<?php $result = mysqli_query($con,'SELECT * FROM class ORDER BY classname ASC'); ?> 
					<?php while($row = mysqli_fetch_assoc($result)) { ?> 
					<option value="<?php echo $row['id'];?>"> 
					<?php echo htmlspecialchars($row['id']) . " - " . htmlspecialchars($row['classname']); ?>  
					</option> 
					<?php } ?>
					<?php mysqli_close($con);?> 
            </select>
    
            
 
            <label for="Class Name">Class Name:</label>
            <input type="text" name="classname" id="Class Name">

          <br/>
         
          <label for="Assigned Teacher">Assigned Teacher:</label>
          <select name="assignedteacher" id="Assigned Teacher">
           <?php $con = mysqli_connect("localhost","mmollica","Thepw164", "capstone_db"); ?> 
					<?php $result = mysqli_query($con,'SELECT * FROM users WHERE groups= 2 ORDER BY lname ASC'); ?> 
					<?php while($row = mysqli_fetch_assoc($result)) { ?> 
					<option value="<?php echo $row['id'];?>"> 
					<?php echo htmlspecialchars($row['fname']) . " " . htmlspecialchars($row['lname']); ?> 
					</option> 
					<?php } ?>
					<?php mysqli_close($con);?> 
          </select>
          <br/>
         
      <label for="Class Subject">Class Subject:</label>
     <select name="subject" id="Class Subject">
        <option value="english">English</option>
        <option value="history">History</option>
        <option value="math">Math</option>
        <option value="science">Science</option>
      </select>


      <br>
      <br>
          <input name="process" type="submit" value="Update" class="btn btn-med btn-success">
          <br>
          <input name="process" type="submit" value="Delete" class="btn btn-med btn-success"  style="margin-left:150px; margin-top:-62px">
          <br>
          <a href="staffhomepage.php"><input name="Cancel" type="button" value="Cancel" class="btn btn-med btn-success" style="margin-left:300px; margin-top:-60px" ></a>
          
          </form>
          </div>
          </div><!--/row-->

      <hr>
      
 <div id="footer">
      <div class="container">
                
           <p align="right"  style="color:#CCCCCC; text-align:right; margin-top:25px;">&copy; 2014 GitHub Inc. All rights reserved.</p>
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

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
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
  
  	document.getElementById("cancel").onclick = function ()
		 {
        location.href = "staffhomepage.php";
		 }
		 
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3");
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4");
  </script>
  </body>
