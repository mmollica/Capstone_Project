<?php
require_once 'core/init.php';
ini_set('display_errors',1); 
error_reporting(E_ALL);


if(Input::exists())
{
/*   if(Token::check(Input::get('token')))
   {*/
       $validate = new Validate();
       $validation = $validate->check($_POST, array(
           'username' => array('required' => true),
           'password' => array('required' => true)
           ));

       if($validation->passed())
       {
           $user = new User();

           $remember = (Input::get('remember') === 'on') ? true : false;
           $login = $user->login(Input::get('username'), Input::get('password'), $remember);

           if($login)
           {
               $level = $user->data()->groups;

               switch($level)
               {
               	case '1':
               		Redirect::to('staffhomepage.html');
               	break;
               	case '2':
               		Redirect::to('userhomepage.php');
               	break;
                case '3':
               		Redirect::to('userhomepage.php');
               	break;
               	case '4':
               		Redirect::to('userhomepage.php');
               	break;
               		//DISPLAY POP UP ERROR
               	break;
               }
           }
           else
           {
               echo '<script type="text/javascript">alert("Login has failed. Please check your credentials");</script>'; 
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
?><head>
		<meta charset="utf-8">
		<title>Log in page</title>
		<link rel="stylesheet" type="text/css" href="bootstrap.css">
    <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
    <script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
    <script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
    <script src="SpryAssets/SpryValidationCheckbox.js" type="text/javascript"></script>
    <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
	<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css">
	<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
	<link href="SpryAssets/SpryValidationCheckbox.css" rel="stylesheet" type="text/css">
	</head>
    


	<style>
	body{
		background-color:#000000;
		
	}
	h1{
	
	margin:auto;
	text-align:center;	
	}
	form {
		
	margin-left:200px;	
		
	}
	
	</style>
	<body>
		
		<!-- The Main wrapper div starts -->
		<div class="container">
			<!-- header content -->
			<h1><a href="#"><span class="center2" style="color:#5bb75b"\>Hive Management System</span></a></h1>
			<!-- Navigation -->
			<div class="navbar">
	          <div class="navbar-inner">
	            <div class="container">
	              <ul class="nav">
	                
	              </ul>
	            </div>
	          </div>
	        </div>
                      <!-- Marketing area -->
	        <div class="hero-unit">
	        	<h3><blockquote>Welcome To The Hive</blockquote></h3>
        	  <form name="form1" method="post" action="index.php" style="margin:auto;":>
	        	  <span id="sprytextfield1" style="margin-left:345px" >
	        	    <label for="Username">Username:</label>
	        	    <input type="text" name="username" id="Username">
	        	    <span class="textfieldRequiredMsg">A value is required.</span></span>
        	  
              <span id="sprypassword1" style="margin-left:345px">
              <label for="Password">Password:</label>
              <input type="password" name="password" id="Password">
              <span class="passwordRequiredMsg">A value is required.</span></span>
              
              <!-- <span id="spryselect1">
              <label for="Login as">Login as:</label>
              <select name="Login as" id="Login as">
              <option value="Admin">Admin</option>
          	  <option value="Accountant">Accountant</option>
              <option value="Manager">Manager</option>
              </select>
              <span class="selectRequiredMsg">Please select an user type.</span></span>
              <br/> -->
              
     
              <br/>   
              <input name="Sign-In" type="submit" value="Sign-In" class="btn btn-large btn-success">
              </form> 
              </div>
	        <!-- Footer Section -->
	        <hr>
	        <div class="row">
				<div class="span4" style="margin-left:50x">
			    </div>
			</div>

			<!-- Copyright Area -->
			<hr>
			<div class="footer">
				<p>&copy; 2013</p>
			</div>
		</div>

		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script scr="js/bootstrap.js">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var sprycheckbox1 = new Spry.Widget.ValidationCheckbox("sprycheckbox1");
        </script>
	</body>
