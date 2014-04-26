<?php
ini_set('display_startup_errors', TRUE);
ini_set('display_errors',1); 
error_reporting(E_ALL);
require_once 'core/init.php';

/*if(Input::exists())
{
  echo 'submitted';
}
*/
$user = new User();
$name = $user->data()->username;

if(Input::exists())
{
	$con = mysqli_connect("localhost","mmollica","Thepw164", "capstone_db");
	$class=$_POST['classid'];
  $result2 = mysqli_query($con,"SELECT * FROM class WHERE id = $class");
  
  $teacherid=0;
  
  while($row = mysqli_fetch_assoc($result2))
            {
			
				$teacherid=$row['teacherid'];
			
			}


   
      $assign = new Classassign();

      try
      {
        $assign->create(array(
          'classid' => Input::get('classid'),
          'studentid' => Input::get('studentid') ,
		  'teacherid'=>$teacherid    
          ));

        
        Redirect::to('staffhomepage.html');
      }
      catch(Exception $e)
      {
        die($e->getMessage());
      }
    
  
}

?>

  <head>
    <meta charset="utf-8">
    <title>Assign Student to Class</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="bootstrap.css" rel="stylesheet">
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
  <script src="ajax_req.js" type="text/javascript"></script>
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
              Logged in as <?php echo $name; ?>
            </p>
            <ul class="nav">
              <li class="active"><a href="staffhomepage.html">Home</a></li>
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
              <li><a href="editclasses.php">Edit</a></li>
              <li><a href="viewclass.php">View</a></li>
              <li class="active"><a href="assignstudent.php">Assign a Student to a Class</a></li>
              
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
          <div class="login" >
            <h1 style="margin-top:-40px;  margin-left:200px;">Assign Student</h1>
            
            <form id="createclass" action="" method="post" style=" margin-left:215px;">
        
				<label >Select a class:</label>
				<select name="classid" onChange="htmlData('remove.php', 'class='+this.value)" />
  				<option value="#">-Select-</option>
  				<?php $con = mysqli_connect("localhost","mmollica","Thepw164", "capstone_db"); ?> 
					<?php $result = mysqli_query($con,'SELECT * FROM class ORDER BY classname ASC'); ?> 
					<?php while($row = mysqli_fetch_assoc($result)) { ?> 
					<option value="<?php echo $row['id'];?>"> 
					<?php echo htmlspecialchars($row['id']) . " - " . htmlspecialchars($row['classname']); ?>  
					</option> 
					<?php } ?>
					<?php mysqli_close($con);?> 
				</select>
                <label >Select a Student:</label>
				<div id="txtResult"> <select name="assignstudent"><option></option></select> </div>
           
			<!--error message-->
			 

      <br>
          <input name="Create" type="submit" value="Assign" class="btn btn-large btn-success" >
          <input name="Cancel" type="button" value="Cancel" class="btn btn-large btn-success" >
          </form>
          </div>
          </div><!--/row-->

      <hr>
      
<footer>
    <p>&copy; Company 2013</p>
      </footer>

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
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3");
  </script>
  </body>
