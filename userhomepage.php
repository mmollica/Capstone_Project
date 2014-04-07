<?php
ini_set('display_startup_errors', TRUE);
ini_set('display_errors',1); 
error_reporting(E_ALL);
require_once 'core/init.php';


    $con = mysqli_connect("localhost","host","test", "capstone_db");

    if (!$con)
        {
             die('Could not connect: ' . mysqli_error($con));
        }

     
    $result1 = mysqli_query($con, "SELECT * FROM link");
    $result2 = mysqli_query($con, "SELECT * FROM staffmessage");

    if(!$result1 || !$result2)
        {
        die(mysqli_error($con));
        }
?>

  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
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
    <link href="file:///C|/Users/Adiyiah/Desktop/New Html Style/bootstrap-2.3.2/docs/assets/css/bootstrap-responsive.css" rel="stylesheet">

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
              <li class="nav-header">Sidebar</li>
              <li class="active"><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li class="nav-header">Sidebar</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li class="nav-header">Sidebar</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9" >
          <div class="scrollbox" >
            <?php
            echo "<table>";
            while($row = mysqli_fetch_assoc($result2))
                {
                  echo "<th>" . $row['title'] . " - " . $row['date'] . "</th>";
                  echo "<tr>";
                  echo "<td>" . $row['msg'] . "</td>";
                  echo "</tr>";

                }
            echo "</table>"; 

            ?>
            
          </div>
          <div class="row-fluid">
            <div class="span4" style="margin-left:35px;">
              <h2 style="margin-top:-60px;">Class List</h2>
              <ul type="square" style="padding:10px;">
        		<li type="square"><a href="">Pre-Algebra</a></li>
                <li><a href="">English II</a></li>
                <li><a href="">Biology</a></li>
                <li><a href="">US History</a></li>
        </ul>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="span4" style="margin-left:50px;">
              <h2 style="margin-top:-60px; margin-left:-15px">Notification</h2>
              <ul type="square">
          			
                            <li> <a href="">Pre-Algebra Grade posted.</a></li>
                            <li> <a href="">Engish II Grade Posted</a></li>
                            <li> <a href="">Biology's Assignment posted.</a></li>
                    </ul>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            </div>
            
            <div class="row-fluid">
            <div class="span4" style="margin-left:35px; margin-top:50px">
              <h2 style="margin-top:-60px;">My Club List</h2>
              <ul type="square">
          			<li> <a href="">Junior Beta Club</a></li>
                    <li> <a href="">Future City</a></li>
                    <li> <a href="">4H</a></li>
          </ul>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="span4" style="margin-left:50px; margin-top:50px">
              <h2 style="margin-top:-60px;">Upcoming Events</h2>
              <ul type="square">
        		<li type="square">Homecoming Pep Rally</li>
                <ul>
                	<li>March 14 2:00pm</li>
                </ul>
                <li>Spring Break</li>
                <ul>
                	<li>March 24-28</li>
                
                </ul>
        </ul>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            </div>
            
            <div class="row-fluid">
            <div class="span9" style="margin-top:50px;">
              <h2 align="center" style="margin-top:-60px;">Helpful Links</h2>
                
                <?php
                while($row = mysqli_fetch_assoc($result1))
                    {
                     echo "<ul>";
                     echo "<li>" . "<a href =" . $row['url'] .">" . $row['linkname'] . "</li>" ;
                     echo "</ul>";
                    }
                echo "</table>";        
                ?>
                
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
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
    <script src="file:///C|/Users/Adiyiah/Desktop/New Html Style/bootstrap-2.3.2/docs/assets/js/jquery.js"></script>
    <script src="file:///C|/Users/Adiyiah/Desktop/New Html Style/bootstrap-2.3.2/docs/assets/js/bootstrap-transition.js"></script>
    <script src="file:///C|/Users/Adiyiah/Desktop/New Html Style/bootstrap-2.3.2/docs/assets/js/bootstrap-alert.js"></script>
    <script src="file:///C|/Users/Adiyiah/Desktop/New Html Style/bootstrap-2.3.2/docs/assets/js/bootstrap-modal.js"></script>
    <script src="file:///C|/Users/Adiyiah/Desktop/New Html Style/bootstrap-2.3.2/docs/assets/js/bootstrap-dropdown.js"></script>
    <script src="file:///C|/Users/Adiyiah/Desktop/New Html Style/bootstrap-2.3.2/docs/assets/js/bootstrap-scrollspy.js"></script>
    <script src="file:///C|/Users/Adiyiah/Desktop/New Html Style/bootstrap-2.3.2/docs/assets/js/bootstrap-tab.js"></script>
    <script src="file:///C|/Users/Adiyiah/Desktop/New Html Style/bootstrap-2.3.2/docs/assets/js/bootstrap-tooltip.js"></script>
    <script src="file:///C|/Users/Adiyiah/Desktop/New Html Style/bootstrap-2.3.2/docs/assets/js/bootstrap-popover.js"></script>
    <script src="file:///C|/Users/Adiyiah/Desktop/New Html Style/bootstrap-2.3.2/docs/assets/js/bootstrap-button.js"></script>
    <script src="file:///C|/Users/Adiyiah/Desktop/New Html Style/bootstrap-2.3.2/docs/assets/js/bootstrap-collapse.js"></script>
    <script src="file:///C|/Users/Adiyiah/Desktop/New Html Style/bootstrap-2.3.2/docs/assets/js/bootstrap-carousel.js"></script>
    <script src="file:///C|/Users/Adiyiah/Desktop/New Html Style/bootstrap-2.3.2/docs/assets/js/bootstrap-typeahead.js"></script>

  </body>
