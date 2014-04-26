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
$fname=$user->data()->fname;
$lname=$user->data()->lname;

$userid=$_GET['userid'];
 
$query1 = mysqli_query($con,"SELECT * FROM users WHERE id= $userid ");

?>
  <head>
    <meta charset="utf-8">
    <title>View Users</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="bootstrap.css" rel="stylesheet">    	<style type="text/css">
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
              Logged in as <?php echo $username; ?>
            </p>
            <ul class="nav">
            <li><a href="staffhomepage.html">Home</a></li>
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
              <li class="active"><a href="viewusers.php">View</a></li>
              <li><a href="assignparent.php">Assign a Parent to a Student</a></li>
              
              <li class="nav-header">Classes</li>
              <li><a href="createclasses.php">Create</a></li>
              <li><a href="editclasses.php">Edit</a></li>
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
    <div class="span9" style="height:1000px">
          <div class="widget stacked widget-table action-table">
    				
				<div class="widget-header">
					<i class="icon-th-list"></i>
					<h2 style="margin-top:-15px;margin-left:300px;">User's Information</h2>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<table class="table table-striped table-bordered">
  <thead>
    	<tr>
          <th>User. ID</th>
          <th>Name</th>
          <th>Username</th>
          <th>Address</th>
          <th>Account Type</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
            
            $con = mysqli_connect("localhost","mmollica","Thepw164", "capstone_db");

            if (!$con)
            {
                 die('Could not connect: ' . mysqli_error($con));
            }

             
            $result = mysqli_query($con, "SELECT * FROM users WHERE id= $userid");

            if(!$result)
            {
                die(mysqli_error($con));
            }

            while($row = mysqli_fetch_assoc($result))
                {
                $userid = $row['id'];
                echo "<tr>";
                echo "<td>". $row['id'] . "</td>";
                echo '<td><a href="viewuserdetails.php?userid=' . $userid . '"> ' . $row['fname'] . $row['lname'] . '</a></td>';
                echo "<td>". $row['username'] . "</td>";
                echo "<td>". $row['address'] . " " . $row['city'] . " " . $row['state'] . " " . $row['zip'] .  "</td>";
                $groups = $row['groups'];
                switch ($groups) {
                  case '1':
                    echo "<td>Staff</td>";
                    break;
                  case '2':
                    echo "<td>Teacher</td>";
                    break;
                  case '3':
                    echo "<td>Student</td>";
                    break;
                  case '4':
                    echo "<td>Parent</td>";
                    break;
                  default:
                    echo "error";
                    break;
                }
                echo "</tr>";
               
            }

    
    	   
    echo '</tbody>';
echo '</table>';

echo '</div>';
echo '</div>';
          //Display Classes
          $requery1 = mysqli_query($con,"SELECT * FROM users WHERE id= $userid ");
          $groups = 0;
          while($row2 = mysqli_fetch_assoc($requery1))
            {
              $groups = $row2['groups'];

            }
          
          switch ($groups) 
          {
            case '3':
			echo '<br>';
			
			echo ' <div class="widget stacked widget-table action-table">';
    				
				echo '<div class="widget-header">';
					echo '<i class="icon-th-list"></i>';
					echo "<h2 style='margin-top:-15px;margin-left:300px;'>User's Classes</h2>";
				echo '</div>'; 
				
				echo '<div class="widget-content">';
					

          echo "<table class='table table-striped table-bordered'>";
          echo "<thead>";
          echo "<tr>";
          echo "<th>Class. ID</th>";
          echo "<th>Class Name</th>";
          echo "<th>Class Subject</th>";
          echo "<th>Assigned Teacher</th>";
          echo "</tr>";
          echo "</thead>";

          echo "<tbody>";

          while($studentidget = mysqli_fetch_assoc($query1))
          {
            $userid = $studentidget['id'];
          }
          $query2 = mysqli_query($con,"SELECT * FROM classassign WHERE studentid = $userid ");
          while($row3 = mysqli_fetch_assoc($query2))
          {
            $classid = $row3['classid'];
            $query3 = mysqli_query($con,"SELECT * FROM class WHERE id= $classid ");

            while($row4 = mysqli_fetch_assoc($query3))
                {
                $classid = $row4['id'];
                echo "<tr>";
                echo "<td>". $row4['id'] . "</td>";
                echo '<td><a href="viewclassdetails.php?classid= ' . $classid . ' "> ' . $row4['classname'] . '</a></td>';
                echo "<td>". $row4['subject'] . "</td>";
                $DB = mysqli_connect("localhost","mmollica","Thepw164", "capstone_db");
                $teacherid = $row4['teacherid'];
                $query4 = mysqli_query($DB, "SELECT * FROM users WHERE id=$teacherid");
                while($row5 = mysqli_fetch_assoc($query4))
                {
                    $id = $row5['id'];
                    echo '<td><a href="viewuserdetails.php?userid= ' . $id . ' "> ' . $row5['fname'] . $row5['lname'] . '</a></td>';
                }
                echo "</tr>";
                mysqli_close($DB);
                
            }

          }
            echo   '</tbody>';
            echo  '</table>';
			echo '</div>';
			echo '</div>';
			
			echo '<br>';
			
			echo ' <div class="widget stacked widget-table action-table">';
    				
				echo '<div class="widget-header">';
					echo '<i class="icon-th-list"></i>';
					echo "<h2 style='margin-top:-15px;margin-left:300px;'>User's Clubs</h2>";
				echo '</div>'; 
				
				echo '<div class="widget-content">';
				
            echo '<table class="table table-striped table-bordered">';
            echo "<thead>";
            echo '<tr>';
            echo '<th>Club. ID</th>';
            echo '<th>Class Name</th>';
            echo '<th>Assigned Teacher</th>';
                          
                          
            echo    '</tr>';
            echo    '</thead>';
                      
            echo    '<tbody>';
            $clubid = 0;
            $clublist = mysqli_query($con, "SELECT * FROM clubassign WHERE studentid=$userid");
            while($clubthing = mysqli_fetch_assoc($clublist))
            {
              $clubid = $clubthing['clubid'];
              
            }
            $query17 = mysqli_query($con, "SELECT * FROM club WHERE id = $clubid");

            if(!$query17)
            {
                die(mysqli_error($con));
            }

            while($row19 = mysqli_fetch_assoc($query17))
                {
                $classid = $row19['id'];
                echo "<tr>";
                echo "<td>". $row19['id'] . "</td>";
                echo '<td><a href="viewclubdetails.php?clubid= ' . $classid . '"> ' . $row19['clubname'] . '</a></td>';
                $DB = mysqli_connect("localhost","mmollica","Thepw164", "capstone_db");
                $teacherid = $row19['teacherid'];
                $query18 = mysqli_query($DB, "SELECT * FROM users WHERE id=$teacherid");
                while($row20 = mysqli_fetch_assoc($query18))
                {
                    $id = $row20['id'];
                    echo '<td><a href="viewuserdetails.php?userid= ' . $id . ' "> '. $row20['fname'] . $row20['lname'] . '</a></td>';
                }
            
				
                mysqli_close($DB);
            }
			    echo "</tr>";
				echo "</tbody>";
				echo "</table>";
				echo '</div>';
				echo '</div>';
          break;
          case '4':
          $parentid = 0;
            $parentquery = mysqli_query($con,"SELECT * FROM users WHERE id= $userid ");
            while($row6 = mysqli_fetch_assoc($parentquery))
            {
              $parentid = $row6['id'];
            }
            $query5 = mysqli_query($con, "SELECT * FROM parent_student_match WHERE parentid = $parentid");
            while($row7 = mysqli_fetch_assoc($query5))
            {
                $studentid = $row7['studentid'];
                $query6 = mysqli_query($con, "SELECT * FROM users WHERE id = $studentid");
                while($row8 = mysqli_fetch_assoc($query6))
                {
					
				  	echo '<br>';
			
			echo ' <div class="widget stacked widget-table action-table">';
    				
				echo '<div class="widget-header">';
					echo '<i class="icon-th-list"></i>';
					echo "<h2 style='margin-top:-15px;margin-left:300px;'>Parent's Student</h2>";
				echo '</div>'; 
				
				echo '<div class="widget-content">';
				
                  echo "<table class='table table-striped table-bordered'>";
                  echo "  <thead>";
                  echo "<tr>";
                  echo "<th>ID</th>";
                  echo "<th>Name</th>";
                  echo "<th>Username</th>";
                  echo "<th>Address</th>";
                  
                 
                  echo "</tr>";
                  echo "</thead>";

                  echo "<tbody>";
                  echo "<tr>";
                  echo "<td>". $row8['id'] . "</td>";
                  echo "<td>". $row8['fname'] . $row8['lname'] . "</td>";
                  echo '<td><a href="viewuserdetails.php?userid= ' . $studentid . ' "> '. $row8['username'] . '</a></td>';
                  echo "<td>". $row8['address'] . " " . $row8['city'] . " " . $row8['state'] . " " . $row8['zip'] .  "</td>";
                  
				echo "</tr>";
				echo "</tbody>";
				echo "</table>";
				echo '</div>';
				echo '</div>';
				
				echo '<br>';
			
				echo ' <div class="widget stacked widget-table action-table">';
    				
				echo '<div class="widget-header">';
				echo '<i class="icon-th-list"></i>';
				echo "<h2 style='margin-top:-15px;margin-left:300px;'>Student's Classes</h2>";
				echo '</div>'; 
				
				echo '<div class="widget-content">';
				  
                  echo "<table class='table table-striped table-bordered'>";
                  echo "  <thead>";
                  echo "<tr>";
                  echo "<th>Class. ID</th>";
                  echo "<th>Class Name</th>";
                  echo "<th>Class Subject</th>";
                  echo "<th>Assigned Teacher</th>";
                  echo "</tr>";
                  echo "</thead>";

                  echo "<tbody>";
      
                      $query7 = mysqli_query($con,"SELECT * FROM classassign WHERE studentid = $studentid ");
                      while($row9 = mysqli_fetch_assoc($query7))
                      {
                        $classid = $row9['classid'];
                        $query8 = mysqli_query($con,"SELECT * FROM class WHERE id= $classid ");
                      

                        while($row10 = mysqli_fetch_assoc($query8))
                            {
                            $classid = $row10['id'];
                            echo "<tr>";
                            echo "<td>". $row10['id'] . "</td>";
                            echo '<td><a href="viewclassdetails.php?classid=' . $classid . ' "> '. $row10['classname'] . '</a></td>';
                            echo "<td>". $row10['subject'] . "</td>";
                            $DB = mysqli_connect("localhost","mmollica","Thepw164", "capstone_db");
                            $teacherid = $row10['teacherid'];
                            $query9 = mysqli_query($DB, "SELECT * FROM users WHERE id=$teacherid");
                            while($row11 = mysqli_fetch_assoc($query9))
                            {
                                $id = $row11['id'];
                                echo '<td><a href="viewuserdetails.php?userid=' . $id . ' "> '. $row11['fname'] . $row11['lname'] . '</a></td>';
                            }
                            echo "</tr>";
                            mysqli_close($DB);
                            
                        }

                      }
                    }
                  }

            echo   '</tbody>';
            echo  '</table>';
			echo '</div>';
			echo '</div>';
			
			
			echo '<br>';
			
			echo ' <div class="widget stacked widget-table action-table">';
    				
			echo '<div class="widget-header">';
			echo '<i class="icon-th-list"></i>';
			echo "<h2 style='margin-top:-15px;margin-left:300px;'>Student's Clubs</h2>";
			echo '</div>'; 
				
			echo '<div class="widget-content">';
				  
            echo '<table class="table table-striped table-bordered">';
            echo "<thead>";
            echo '<tr>';
            echo '<th>Club. ID</th>';
            echo '<th>Class Name</th>';
            echo '<th>Assigned Teacher</th>';
                          
                          
            echo    '</tr>';
            echo    '</thead>';
                      
            echo    '<tbody>';
            $query15 = mysqli_query($con, "SELECT * FROM club");

            if(!$query15)
            {
                die(mysqli_error($con));
            }

            while($row17 = mysqli_fetch_assoc($query15))
                {
                $classid = $row17['id'];
                echo "<tr>";
                echo "<td>". $row17['id'] . "</td>";
                echo '<td><a href="viewclubdetails.php?clubid= ' . $classid . '"> ' . $row17['clubname'] . '</a></td>';
                $DB = mysqli_connect("localhost","mmollica","Thepw164", "capstone_db");
                $teacherid = $row17['teacherid'];
                $query16 = mysqli_query($DB, "SELECT * FROM users WHERE id=$teacherid");
                while($row18 = mysqli_fetch_assoc($query16))
                {
                    $id = $row18['id'];
                    echo '<td><a href="viewuserdetails.php?userid= ' . $id . ' "> '. $row18['fname'] . $row18['lname'] . '</a></td>';
                }
                echo "</tr>";
                mysqli_close($DB);
            }
			    echo   '</tbody>';
            echo  '</table>';
			echo '</div>';
			echo '</div>';
            break;

            case '2':
				
			echo '<br>';
			
			echo ' <div class="widget stacked widget-table action-table">';
    				
			echo '<div class="widget-header">';
			echo '<i class="icon-th-list"></i>';
			echo "<h2 style='margin-top:-15px;margin-left:300px;'>User's Classes</h2>";
			echo '</div>'; 
				
			echo '<div class="widget-content">';
			
            echo "<table class='table table-striped table-bordered'>";
            echo "  <thead>";
            echo "<tr>";
            echo "<th>Class. ID</th>";
            echo "<th>Class Name</th>";
            echo "<th>Class Subject</th>";
            echo "</tr>";
            echo "</thead>";

            echo "<tbody>";
            $teacherid = 0;
            $teacherquery = mysqli_query($con,"SELECT * FROM users WHERE id= $userid ");
            while($row12 = mysqli_fetch_assoc($teacherquery))
            {
              $teacherid = $row12['id'];
            }
            
            $query10 = mysqli_query($con,"SELECT * FROM classassign WHERE teacherid = $teacherid ");
            while($row13 = mysqli_fetch_assoc($query10))
            {
              $classid = $row13['classid'];
            
              $query11 = mysqli_query($con,"SELECT * FROM class WHERE id= $classid ");
              
              while($row14 = mysqli_fetch_assoc($query11))
                  {
                  $classid = $row14['id'];
                  echo "<tr>";
                  echo "<td >". $row14['id'] . "</td>";
                  echo '<td ><a href="viewclassdetails.php?classid=' . $classid . ' "> ' . $row14['classname'] . '</a></td>';
                  echo "<td>". $row14['subject'] . "</td>";
              
                  }
            }
            
            

 		    echo   '</tbody>';
            echo  '</table>';
			echo '</div>';
			echo '</div>';
	
			echo '<br>';
			
			echo ' <div class="widget stacked widget-table action-table">';
    				
			echo '<div class="widget-header">';
			echo '<i class="icon-th-list"></i>';
			echo "<h2 style='margin-top:-15px;margin-left:300px;'>User's Clubs</h2>";
			echo '</div>'; 
				
			echo '<div class="widget-content">';
			
    echo '<table class="table table-striped table-bordered">';
    echo "<thead>";
    echo '<tr>';
    echo '<th>Club. ID</th>';
    echo '<th>Class Name</th>';
    echo '<th>Assigned Teacher</th>';
                  
                  
    echo    '</tr>';
    echo    '</thead>';
              
    echo    '<tbody>';
            $teacherid = 0;
            $teacherquery = mysqli_query($con,"SELECT * FROM users WHERE id= $userid ");
            while($row12 = mysqli_fetch_assoc($teacherquery))
            {
              $teacherid = $row12['id'];
            }
            

              $query12 = mysqli_query($con, "SELECT * FROM club WHERE teacherid=$teacherid");
              while($row15 = mysqli_fetch_assoc($query12))
              {
                  $clubid = $row15['id'];
                  echo "<tr>";
                  echo "<td>". $row15['id'] . "</td>";
                  echo '<td><a href="viewclubdetails.php?clubid= ' . $clubid . '"> ' . $row15['clubname'] . '</a></td>';
                  $DB = mysqli_connect("localhost","mmollica","Thepw164", "capstone_db");
                  $teacherid = $row15['teacherid'];
                  $query14 = mysqli_query($DB, "SELECT * FROM users WHERE id=$teacherid");
                  while($row16 = mysqli_fetch_assoc($query14))
                  {
                      $id = $row16['id'];
                      echo '<td> '. $row16['fname'] . $row16['lname'] . '</td>';
                  }
                  echo "</tr>";
                  mysqli_close($DB);
              }
            
		    echo   '</tbody>';
            echo  '</table>';
			echo '</div>';
			echo '</div>';
			
          break;
      }
?> 
 




			</div>

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
