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

$userid=$user->data()->id;

 
$query1 = mysqli_query($con,"SELECT * FROM parent_student_match WHERE parentid= $userid ");

$linkquery = mysqli_query($con,"SELECT * FROM link ");

?>
  <head>
    <meta charset="utf-8">
    <title>View Users</title>
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
              <li><a href="parentgrade.php">Home</a></li>
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
              echo "<li><a href='parentgrade.php'> Student's Grades</a></li>";
              
                ?>
              
                         
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
    
       
					
					
  <?php

while($row2 = mysqli_fetch_assoc($query1))
                {
                  $userid = $row2['studentid'];
                  echo '<div class="span9" style="height:1000px">';
                     echo ' <div class="widget stacked widget-table action-table">';
            
              echo '<div class="widget-header">';
                echo '<i class="icon-th-list"></i>';
                echo "<h2 style='margin-top:-15px;margin-left:300px;'>Students's Information</h2>";
              echo '</div>'; 
              
              echo '<div class="widget-content">';
                

                echo "<table class='table table-striped table-bordered'>";
                echo '<thead>';
                 echo 	'<tr>';
                  echo       '<th>User. ID</th>';
                  echo      '<th>Name</th>';
                  echo       '<th>Username</th>';
                  
                          
                 echo     '</tr>';
                 echo '</thead>';
                 echo '<tbody>';
                
   
              
              $studentquery = mysqli_query($con, "SELECT * FROM user WHERE id = $userid");
              /*while($studentrow = mysqli_fetch_assoc($studentquery))
              {
                echo "<td>" . $studentrow['id'] . "</td>";
                echo "<td>" . $studentrow['fname'] . " " . $studentrow['lname'] . "</td>";
                echo "<td>" . $studentrow['username'] . "</td>";

              }*/
              $query2 = mysqli_query($con, "SELECT * FROM grades WHERE studentid = $userid");
              $points = 0;
             
                $total = 0;
               /* while($row3 = mysqli_fetch_assoc($query2))
                {
                  $points = $points + $row3['points'];
                  $assignmentid = $row3['assignmentid'];
                
                  $query3 = mysqli_query($con, "SELECT * FROM assignment WHERE classid = $classid AND assignmentid= $assignmentid");
                  while($row4 = mysqli_fetch_assoc($query3))
                  {
                    $total = $total + $row4['total'];
                  }
                }*/
              
              
            if($total!=0)
              {
                $grade = number_format(($points/$total)*100);
              }
              else
              {
                $grade=0;
              }
             
            $result = mysqli_query($con, "SELECT * FROM users WHERE id= $userid");

            if(!$result)
            {
                die(mysqli_error($con));
            }

            while($row = mysqli_fetch_assoc($result))
            {
                $userid = $row['id'];
                $fname = $row['fname'];
                  echo "<tr>";
                  echo "<td>". $row['id'] . "</td>";
                  echo '<td>' . $row['fname'] . $row['lname'] . '</a></td>';
                  echo "<td>". $row['username'] . "</td>";
                  
                  echo "</tr>";
               
            }

    
    	   
    echo '</tbody>';
echo '</table>';

echo '</div>';
echo '</div>';

$getclasses = mysqli_query($con, "SELECT * FROM classassign WHERE studentid = $userid");
         
              echo '<br>';
      
      echo ' <div class="widget stacked widget-table action-table">';
            
        echo '<div class="widget-header">';
          echo '<i class="icon-th-list"></i>';
          echo "<h2 style='margin-top:-15px;margin-left:300px;'>" . $fname . "'s Classes</h2>";
        echo '</div>'; 
        
        echo '<div class="widget-content">';
        echo "<table class='table  table-bordered'>";
           while($classstuff = mysqli_fetch_assoc($getclasses))
          {
              $classid = $classstuff['classid'];

          
          echo "<thead>";
          echo "<tr>";
          echo "<th>Classname</th>";
          echo "<th>Subject</th>";
          echo "<th>Teacher</th>";
          echo "</tr>";
          echo "</thead>";
          echo "<tbody>";
          $query5 = mysqli_query($con, "SELECT * FROM class WHERE id = $classid");
          while($row7 = mysqli_fetch_assoc($query5))
          {
            echo "<tr style='background-color: #f5f5f5'>";
            echo "<td>". $row7['classname'] . "</td>";
            echo "<td>". $row7['subject'] . "</td>";

            $teacherid = $row7['teacherid'];
            $query6 = mysqli_query($con, "SELECT * FROM users WHERE id=$teacherid");
            while($row8 = mysqli_fetch_assoc($query6))
                {
                    
                    echo '<td>'. $row8['fname'] . " " . $row8['lname'] . '</a></td>';
                }
            echo "</tr>";
       
            }

          
          
          echo "<tr>";
          echo "<th colspan='3'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assignment Breakdown</th>";
          echo "</tr>";
          echo "<tr>";
          echo "<th>Assignment</th>";
          echo "<th>Grade</th>";
          echo "<th>Total Points</th>";
          echo "</tr>";
          
          

              $query4 = mysqli_query($con, "SELECT * FROM assignment WHERE classid = $classid AND type = 1");
              while($row5 = mysqli_fetch_assoc($query4))
              {
                echo "<tr style='background-color: #f5f5f5'>";
                echo "<td>". $row5['assignmentname'] . "</td>";
                $assignmentid = $row5['assignmentid'];
                $query5 = mysqli_query($con, "SELECT * FROM grades WHERE assignmentid = $assignmentid AND studentid = $userid");
                $check = mysqli_query($con, "SELECT * FROM grades WHERE assignmentid = $assignmentid AND studentid = $userid");
                $row6 = mysqli_fetch_assoc($query5);
                $grade =0;
                  if($row6['gradeid']==true)
                  {
                    echo "<td>" . $row6['points'] . "</td>";
                  }
                  else
                  {
                    echo '<td>Not yet submitted.</td>';
                  }
                
                echo "<td>". $row5['total'] . "</td>";
                echo "</tr>";
                 
                $query7 = mysqli_query($con, "SELECT * FROM grades WHERE studentid = $userid AND classid = $classid");
                $points = 0;
             
                $total = 0;
                while($row9 = mysqli_fetch_assoc($query7))
                {
                  $points = $points + $row9['points'];
                  $assignmentid = $row9['assignmentid'];
                
                  $query8 = mysqli_query($con, "SELECT * FROM assignment WHERE classid = $classid AND assignmentid= $assignmentid");
                  while($row10 = mysqli_fetch_assoc($query8))
                  {
                    $total = $total + $row10['total'];
                  }
                }
                 if($total!=0)
                  {
                    $grade = number_format(($points/$total)*100);
                  }
                  else
                  {
                    $grade=0;
                  }
                }
                echo "<tr style='background-color: #f5f5f5'>";
                echo "<td>Total</td>";
                echo "<td>". $grade . "%</td>";
                echo "<td>". $total . "</td>";
                echo "</tr>";
              

        echo '</tbody>';
      }
    echo '</table>';


echo '</div>';
echo '</div>';

echo '</div>';
echo '<div class="container-fluid">';
echo      '<div class="row-fluid">';
 echo       '<div class="span3">';
      
echo      '</div><!--/span-->';
}

echo '</div>';

echo '</div>';

?> 
 




			
      
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
