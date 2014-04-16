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
  if(Token::check(Input::get('token')))
  {
    $validate = new Validate();
  
    $validation = $validate->check($_POST, array(
      'username' => array('required' => true, 'min' => 2, 'max' => 20 , 'unique' => 'users'),
      'password' => array('required' => true, 'min' => 6, 'max' => 20),
      'password_again' => array('required' => true, 'matches' => 'password'),
      'groups' => array('required' => true),
      'state' => array('max' => 2),
      'zip' => array('max' => 5),
      'groups' => array('required' => true)
    ));

    if($validation->passed())
    {
      $user = new User();
      $id = $user->get_number(Input::get('groups'));
      //$u = $user->data()->username;
      date_default_timezone_set('America/New_York');
      $time = date("Y-m-d H:i:s");

      $salt = Hash::salt(32);
      
      
      try
      {
        $user->create(array(
          'id' => $id,
          'username' => Input::get('username'),
          'password' => Hash::make(Input::get('password')),
          'salt' => $salt,
          'fname' => Input::get('fname'),
          'lname' => Input::get('lname'),
          'address' => Input::get('address'),
          'city' => Input::get('city'),
          'state' => Input::get('state'),
          'zip' => Input::get('zip'),
          'groups' => Input::get('groups'),
          'date_added' => $time
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
}

?>

  <head>
    <meta charset="utf-8">
    <title>User Creation</title>
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
              Logged in as <?php echo $name ?>
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
              <li class="active" ><a href="createusers.php">Create</a></li>
              <li><a href="editusers.html">Edit</a></li>
              <li><a href="viewusers.html">View</a></li>
              
              <li class="nav-header">Classes</li>
              <li><a href="createclasses.php">Create</a></li>
              <li><a href="editclasses.html">Edit</a></li>
              <li><a href="viewclass.html">View</a></li>
              <li><a href="assignstudent.php">Assign a Student to a Class</a></li>
              
              <li class="nav-header">Clubs</li>
              <li><a href="createclub.php">Create</a></li>
              <li><a href="editclub.html">Edit</a></li>
              <li><a href="viewclub.html">View</a></li>
              
              <li class="nav-header">Links</li>
              <li ><a href="createlink.php">Create</a></li>
              <li><a href="editlink.html">Edit</a></li>
              <li><a href="viewlink.html">View</a></li>
              
              <li class="nav-header"> School Messages</li>
              <li><a href="createmessage.php">Create</a></li>
              <li><a href="editmessage.html">Edit</a></li> 
              
                         
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9" style="height:850px">
          <div class="login" >
            <h1 style="margin-top:-60px; margin-left:215px;">Create Users</h1>
            <span id="sprytextfield1">
            <form id="log in" action="" method="post" style="margin-left:215px;">
            <label for="username">Usename:</label>
            <input type="text" name="username" id="username">
          <span class="textfieldRequiredMsg">A value is required.</span></span>
          <br/>
          <span id="sprytextfield2">
          <label for="password">Password:</label>
          <input type="password" name="password" id="password">
          <span class="textfieldRequiredMsg">A value is required.</span></span>
          <br/>
          <span id="sprytextfield3">
          <label for="password_again">Confirm Password:</label>
          <input type="password" name="password_again" id="password_again">
          <span class="textfieldRequiredMsg">A value is required.</span></span>
          <br/>
          <span id="sprytextfield4">
          <label for="fname">First Name:</label>
          <input type="text" name="fname" id="fname">
          <span class="textfieldRequiredMsg">A value is required.</span></span>
          <br/>
          <span id="sprytextfield5">
          <label for="lname">Last Name:</label>
          <input type="text" name="lname" id="lname">
          <span class="textfieldRequiredMsg">A value is required.</span></span>
          <br/>
          <span id="sprytextfield6">
          <label for="address">Address:</label>
          <input type="text" name="address" id="address">
          <span class="textfieldRequiredMsg">A value is required.</span></span>
          <br/>
          <span id="sprytextfield7">
          <label for="city">City:</label>
          <input type="text" name="city" id="city">
          <span class="textfieldRequiredMsg">A value is required.</span></span>
          <br/>
          <span id="sprytextfield8">
          <label for="state">State:</label>
          <input type="text" name="state" id="state" size="2">
          <span class="textfieldRequiredMsg">A value is required.</span></span>
          <br/>
          <span id="sprytextfield9">
          <label for="zip">Zip Code:</label>
          <input type="text" name="zip" id="zip" size="5">
          <span class="textfieldRequiredMsg">A value is required.</span></span>
          <br/>
        <span id="spryselect1">
          <label for="type">Account Type:</label>
          <select name="groups" id="groups">
              <option value="1">Staff</option>
              <option value="2">Teacher</option>
              <option value="3">Student</option>
              <option value="4">Parent</option>
          </select>
          <span class="selectRequiredMsg">Please select an item.</span></span>
          <br/>
          <br>
          <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
          <input type="submit" value="Add User"class="btn btn-large btn-success">
          <a href="staffhomepage.html"><input name="Cancel" type="button" value="Cancel" class="btn btn-large btn-success"></a>
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
  </script>
  </body>
