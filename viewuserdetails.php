<?php
ini_set('display_startup_errors', TRUE);
ini_set('display_errors',1); 
error_reporting(E_ALL);

$con = mysqli_connect("localhost","mmollica","Thepw164","capstone_db");

if (!$con)
    {
         die('Could not connect: ' . mysqli_error($con));
    }

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
          <div class="viewbox" >
  <table id="rounded-corner" summary="2007 Major IT Companies Profit" style="margin-left:100px;">
  <thead> <h3 style="margin-left:250px;">User Info</h3>
    	<tr>
        	<th scope="col" class="rounded-company">User. ID</th>
        	<th scope="col" class="rounded-q1">Name</th>
            <th scope="col" class="rounded-q3">Username</th>
            <th scope="col" class="rounded-q5">Address</th>
            <th scope="col" class="rounded-q4">Account Type</th>
            
        </tr>
    </thead>
        
    <tbody>
        <?php

            if(!$query1)
            {
                die(mysqli_error($con));
            }

            while($row = mysqli_fetch_assoc($query1))
                {
                $userid = $row['id'];
                echo "<tr>";
                echo "<td scope='col' class='rounded-company'>". $row['id'] . "</td>";
                echo "<td scope='col' class='rounded-q2'>". $row['fname'] . $row['lname'] . "</td>";
                echo "<td scope='col' class='rounded-q1'>". $row['username'] . "</td>";
                echo "<td scope='col' class='rounded-q1'>". $row['address'] . " " . $row['city'] . " " . $row['state'] . " " . $row['zip'] .  "</td>";
                $groups = $row['groups'];
                switch ($groups) {
                  case '1':
                    echo "<td scope='col' class='rounded-q1'>Staff</td>";
                    break;
                  case '2':
                    echo "<td scope='col' class='rounded-q1'>Teacher</td>";
                    break;
                  case '3':
                    echo "<td scope='col' class='rounded-q1'>Student</td>";
                    break;
                  case '4':
                    echo "<td scope='col' class='rounded-q1'>Parent</td>";
                    break;
                  default:
                    echo "error";
                    break;
                }
                echo "</tr>";
                
            }
          
          echo  "</tbody>";
          echo "</table>";
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

          echo "<table id='rounded-corner' style='margin-left:100px;' >";
          echo "  <thead> <h3 style='margin-left:250px;'>User's Classes</h3>";
          echo "<tr>";
          echo "<th scope='col' class='rounded-company'>Class. ID</th>";
          echo "<th scope='col' class='rounded-q1'>Class Name</th>";
          echo "<th scope='col' class='rounded-q2'>Class Subject</th>";
          echo "<th scope='col' class='rounded-q4'>Assigned Teacher</th>";
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
                echo "<td scope='col' class='rounded-company'>". $row4['id'] . "</td>";
                echo '<td scope="col" class="rounded-q2"><a href="viewclassdetails.php?classid= ' . $classid . ' "> ' . $row4['classname'] . '</a></td>';
                echo "<td scope='col' class='rounded-q1'>". $row4['subject'] . "</td>";
                $DB = mysqli_connect("localhost","mmollica","Thepw164", "capstone_db");
                $teacherid = $row4['teacherid'];
                $query4 = mysqli_query($DB, "SELECT * FROM users WHERE id=$teacherid");
                while($row5 = mysqli_fetch_assoc($query4))
                {
                    $id = $row5['id'];
                    echo '<td scope="col" class="rounded-q1"><a href="viewuserdetails.php?userid= ' . $id . ' "> ' . $row5['fname'] . $row5['lname'] . '</a></td>';
                }
                echo "</tr>";
                mysqli_close($DB);
                
            }

          }
            echo   '</tbody>';
            echo  '</table>';

            echo '<table id="rounded-corner"  style="margin-left:100px;">';
            echo "<thead> <h3 style='margin-left:250px;'>User's Clubs</h3>";
            echo '<tr>';
            echo '<th scope="col" class="rounded-company">Club. ID</th>';
            echo '<th scope="col" class="rounded-q1">Class Name</th>';
            echo '<th scope="col" class="rounded-q4">Assigned Teacher</th>';
                          
                          
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
                echo "<td scope='col' class='rounded-company'>". $row19['id'] . "</td>";
                echo '<td scope="col" class="rounded-q2"><a href="viewclubdetails.php?clubid= ' . $classid . '"> ' . $row19['clubname'] . '</a></td>';
                $DB = mysqli_connect("localhost","mmollica","Thepw164", "capstone_db");
                $teacherid = $row19['teacherid'];
                $query18 = mysqli_query($DB, "SELECT * FROM users WHERE id=$teacherid");
                while($row20 = mysqli_fetch_assoc($query18))
                {
                    $id = $row20['id'];
                    echo '<td scope="col" class="rounded-q1"><a href="viewuserdetails.php?userid= ' . $id . ' "> '. $row20['fname'] . $row20['lname'] . '</a></td>';
                }
                echo "</tr>";
                mysqli_close($DB);
            }
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
                  echo "<table id='rounded-corner' style='margin-left:100px;' >";
                  echo "  <thead> <h3 style='margin-left:250px;'>Parent's Student</h3>";
                  echo "<tr>";
                  echo "<th scope='col' class='rounded-company'>ID</th>";
                  echo "<th scope='col' class='rounded-q1'>Name</th>";
                  echo "<th scope='col' class='rounded-q1'>Username</th>";
                  echo "<th scope='col' class='rounded-q2'>Address</th>";
                  
                 
                  echo "</tr>";
                  echo "</thead>";

                  echo "<tbody>";
                  echo "<tr>";
                  echo "<td scope='col' class='rounded-company'>". $row8['id'] . "</td>";
                  echo "<td scope='col' class='rounded-q2'>". $row8['fname'] . $row8['lname'] . "</td>";
                  echo '<td scope="col" class="rounded-q1"><a href="viewuserdetails.php?userid= ' . $studentid . ' "> '. $row8['username'] . '</a></td>';
                  echo "<td scope='col' class='rounded-q1'>". $row8['address'] . " " . $row8['city'] . " " . $row8['state'] . " " . $row8['zip'] .  "</td>";
                     
                  echo "<table id='rounded-corner' style='margin-left:100px;' >";
                  echo "  <thead> <h3 style='margin-left:250px;'>Student's Classes</h3>";
                  echo "<tr>";
                  echo "<th scope='col' class='rounded-company'>Class. ID</th>";
                  echo "<th scope='col' class='rounded-q1'>Class Name</th>";
                  echo "<th scope='col' class='rounded-q2'>Class Subject</th>";
                  echo "<th scope='col' class='rounded-q4'>Assigned Teacher</th>";
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
                            echo "<td scope='col' class='rounded-company'>". $row10['id'] . "</td>";
                            echo '<td scope="col" class="rounded-q2"><a href="viewclassdetails.php?classid=' . $classid . ' "> '. $row10['classname'] . '</a></td>';
                            echo "<td scope='col' class='rounded-q1'>". $row10['subject'] . "</td>";
                            $DB = mysqli_connect("localhost","mmollica","Thepw164", "capstone_db");
                            $teacherid = $row10['teacherid'];
                            $query9 = mysqli_query($DB, "SELECT * FROM users WHERE id=$teacherid");
                            while($row11 = mysqli_fetch_assoc($query9))
                            {
                                $id = $row11['id'];
                                echo '<td scope="col" class="rounded-q1"><a href="viewuserdetails.php?userid=' . $id . ' "> '. $row11['fname'] . $row11['lname'] . '</a></td>';
                            }
                            echo "</tr>";
                            mysqli_close($DB);
                            
                        }

                      }
                    }
                  }

            echo   '</tbody>';
            echo  '</table>';

            echo '<table id="rounded-corner"  style="margin-left:100px;">';
            echo "<thead> <h3 style='margin-left:250px;'>Student's Clubs</h3>";
            echo '<tr>';
            echo '<th scope="col" class="rounded-company">Club. ID</th>';
            echo '<th scope="col" class="rounded-q1">Class Name</th>';
            echo '<th scope="col" class="rounded-q4">Assigned Teacher</th>';
                          
                          
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
                echo "<td scope='col' class='rounded-company'>". $row17['id'] . "</td>";
                echo '<td scope="col" class="rounded-q2"><a href="viewclubdetails.php?clubid= ' . $classid . '"> ' . $row17['clubname'] . '</a></td>';
                $DB = mysqli_connect("localhost","mmollica","Thepw164", "capstone_db");
                $teacherid = $row17['teacherid'];
                $query16 = mysqli_query($DB, "SELECT * FROM users WHERE id=$teacherid");
                while($row18 = mysqli_fetch_assoc($query16))
                {
                    $id = $row18['id'];
                    echo '<td scope="col" class="rounded-q1"><a href="viewuserdetails.php?userid= ' . $id . ' "> '. $row18['fname'] . $row18['lname'] . '</a></td>';
                }
                echo "</tr>";
                mysqli_close($DB);
            }
            break;

            case '2':
            echo "<table id='rounded-corner' style='margin-left:100px;' >";
            echo "  <thead> <h3 style='margin-left:250px;'>User's Classes</h3>";
            echo "<tr>";
            echo "<th scope='col' class='rounded-company'>Class. ID</th>";
            echo "<th scope='col' class='rounded-q1'>Class Name</th>";
            echo "<th scope='col' class='rounded-q2'>Class Subject</th>";
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
                  echo "<td scope='col' class='rounded-company'>". $row14['id'] . "</td>";
                  echo '<td scope="col" class="rounded-q2"><a href="viewclassdetails.php?classid=' . $classid . ' "> ' . $row14['classname'] . '</a></td>';
                  echo "<td scope='col' class='rounded-q1'>". $row14['subject'] . "</td>";
              
                  }
            }
            
            


    echo   '</tbody>';
    echo  '</table>';

    echo '<table id="rounded-corner"  style="margin-left:100px;">';
    echo "<thead> <h3 style='margin-left:250px;'>User's Clubs</h3>";
    echo '<tr>';
    echo '<th scope="col" class="rounded-company">Club. ID</th>';
    echo '<th scope="col" class="rounded-q1">Class Name</th>';
    echo '<th scope="col" class="rounded-q4">Assigned Teacher</th>';
                  
                  
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
                  echo "<td scope='col' class='rounded-company'>". $row15['id'] . "</td>";
                  echo '<td scope="col" class="rounded-q2"><a href="viewclubdetails.php?clubid= ' . $clubid . '"> ' . $row15['clubname'] . '</a></td>';
                  $DB = mysqli_connect("localhost","mmollica","Thepw164", "capstone_db");
                  $teacherid = $row15['teacherid'];
                  $query14 = mysqli_query($DB, "SELECT * FROM users WHERE id=$teacherid");
                  while($row16 = mysqli_fetch_assoc($query14))
                  {
                      $id = $row16['id'];
                      echo '<td scope="col" class="rounded-q1"> '. $row16['fname'] . $row16['lname'] . '</td>';
                  }
                  echo "</tr>";
                  mysqli_close($DB);
              }
            

          break;
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
