<?php
ini_set('display_startup_errors', TRUE);
ini_set('display_errors',1); 
error_reporting(E_ALL);

$con = mysqli_connect("localhost","mmollica","Thepw164","capstone_db");

if (!$con)
    {
         die('Could not connect: ' . mysqli_error($con));
    }

$classid=$_GET['classid'];
 

$query2 = mysqli_query($con,"SELECT * FROM class WHERE id= $classid ");
?>
  <head>
    <meta charset="utf-8">
    <title>View Class</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="bootstrap.css" rel="stylesheet">    <style type="text/css">
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
  <script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
  <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
  <link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
  <link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css">
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
              Logged in as <a href="#" class="navbar-link">Username</a>
            </p>
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">Email</a></li>
              <li><a href="#about">Calendar</a></li>
              <li><a href="#contact">Log Out</a></li>
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
              <li ><a href="createusers.html">Create</a></li>
              <li ><a href="editusers.html">Edit</a></li>
              <li><a href="viewusers.html">View</a></li>
              
              <li class="nav-header">Classes</li>
              <li><a href="createclasses.html">Create</a></li>
              <li><a href="editclasses.html">Edit</a></li>
              <li class="active"><a href="viewclass.html">View</a></li>
              
              <li class="nav-header">Clubs</li>
              <li><a href="createclub.html">Create</a></li>
              <li><a href="editclub.html">Edit</a></li>
              <li><a href="viewclub.html">View</a></li>
              
              <li class="nav-header">Links</li>
              <li ><a href="createlink.html">Create</a></li>
              <li><a href="editlink.html">Edit</a></li>
              <li><a href="viewlink.html">View</a></li>
              
              <li class="nav-header"> School Messages</li>
              <li><a href="createmessage.html">Create</a></li>
              <li><a href="editmessage.html">Edit</a></li> 
              <li><a href="#">View</a></li>
                         
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9" style="height:1000px">
          <div class="viewbox2" >

<table id="rounded-corner" summary="2007 Major IT Companies' Profit" style="margin-left:100px;">
  <thead> <h3 style="margin-left:250px;">Class Info</h3>
    	<tr>
        	<th scope="col" class="rounded-company">Class. ID</th>
        	<th scope="col" class="rounded-q1">Class Name</th>
            <th scope="col" class="rounded-q2">Class Subject</th>
            
            <th scope="col" class="rounded-q4">Assigned Teacher</th>
            
            
        </tr>
    </thead>
        
    <tbody>
    	<?php
      while($row = mysqli_fetch_assoc($query2))
      {
        echo "<tr>";
        echo "<td scope='col' class='rounded-company'>". $row['id'] . "</td>";
        echo "<td scope='col' class='rounded-q2'>". $row['classname'] . "</td>";
        echo "<td scope='col' class='rounded-q1'>". $row['subject'] . "</td>";
        $DB = mysqli_connect("localhost","mmollica","Thepw164", "capstone_db");
        $teacherid = $row['teacherid'];
        $result = mysqli_query($DB, "SELECT * FROM users WHERE id=$teacherid");
        while($row2 = mysqli_fetch_assoc($result))
        {
            $id = $row2['id'];
            echo '<td scope="col" class="rounded-q1"><a href="viewuserdetails.php?userid= ' . $id . ' "> ' . $row2['fname'] . $row2['lname'] . '</a></td>';
        }
        echo "</tr>";
        mysqli_close($DB);
      }
      ?>
        
    </tbody>
</table>

 <table id="rounded-corner" summary="2007 Major IT Companies' Profit" style="margin-left:100px;">
  <thead> <h3 style="margin-left:250px;">Students Info</h3>
    	<tr>
        	<th scope="col" class="rounded-company">User. ID</th>
        	<th scope="col" class="rounded-q1">Name</th>
           
          
        </tr>
    </thead>
        
    <tbody>
    	<?php
           
            $query1 = mysqli_query($con,"SELECT * FROM classassign WHERE classid= $classid ");
           
            while($row3 = mysqli_fetch_assoc($query1))
                {
                $id = $row3['studentid'];
                $DB = mysqli_connect("localhost","mmollica","Thepw164", "capstone_db");
                $result2 = mysqli_query($DB, "SELECT * FROM users WHERE id=$id");
                while($row4=mysqli_fetch_assoc($result2))
                {
                  echo "<tr>";
                  echo "<td scope='col' class='rounded-company'>". $row4['id'] . "</td>";
                  echo '<td scope="col" class="rounded-q2"><a href="viewuserdetails.php?userid= ' . $id . ' "> ' . $row4['fname'] . $row4['lname'] . '</a></td>';
                  mysqli_close($DB);
                }
            }
?> 
        
    </tbody>
</table>


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

  </script>
  </body>