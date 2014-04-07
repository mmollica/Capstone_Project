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

if(Input::exists())
{
  
  

    $validate = new Validate();

    $validation = $validate->check($_POST, array(
      'title' => array('required' => true),
      'msg' => array('required' => true),
      'date' => array('required' => true)    
    ));
  
    if($validation->passed())
    {
      
      $msg = new Message();

      try
      {
        $msg->create1(array(
          'title' => Input::get('title'),
          'msg' => Input::get('msg'),
          'date' => Input::get('date')    
          ));

        Session::flash('home', 'You have registered a user');
        Redirect::to('staffhomepage.html');
      }
      catch(Exception $e)
      {
        die($e->getMessage());
      }
    }
    else
    {
      foreach($validation->errors() as $error)
      {
        echo $error, '<br>';
      }
    }
  
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
  <script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
  <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
  <link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
  
  <link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css">
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
              <li ><a href="#">Create</a></li>
              <li><a href="#">Edit</a></li>
              <li><a href="#">View</a></li>
              
              <li class="nav-header">Classes</li>
              <li><a href="#">Create</a></li>
              <li><a href="#">Edit</a></li>
              <li><a href="#">View</a></li>
              
              <li class="nav-header">Clubs</li>
              <li><a href="#">Create</a></li>
              <li><a href="#">Edit</a></li>
              <li><a href="#">View</a></li>
              
              <li class="nav-header">Links</li>
              <li><a href="#">Create</a></li>
              <li><a href="#">Edit</a></li>
              <li><a href="#">View</a></li>
              
              <li class="nav-header"> School Messages</li>
              <li class="active"><a href="#">Create</a></li>
              <li><a href="#">Edit</a></li> 
              <li><a href="#">View</a></li>
                         
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9" style="height:850px">
          <div class="viewbox" >
            <h1 style="margin-top:-60px;">Create Message</h1>
            <br>
            <br>
            <form id="createmessage" action="" method="post">
            <span id="sprytextfield1">
            <label for="Link Name">Message Title:</label>
            <input type="text" name="title" id="Message Title">
          <span class="textfieldRequiredMsg">A value is required.</span></span>
          <br/>
         
          <span id="sprytextfield3">
          <label for="Message Date">Date:</label>
          <input type="date" name="date" id="Date">
          <span class="textfieldRequiredMsg">A value is required.</span></span><br/>
          <br>
          <span id="sprytextarea1">
          <label for="Message">Message:</label>
          <textarea name="msg" id="Message" cols="45" rows="10" style="width:500px"></textarea>
          <span class="textareaRequiredMsg">A value is required.</span></span><br>
      <br>
          <input name="Create" type="submit" value="Create" class="btn btn-large btn-success">
          
          
          <input name="Cancel" type="button" value="Cancel" class="btn btn-large btn-success">
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
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
  </script>
  </body>