<?php
require_once 'core/init.php';
ini_set('display_errors',1); 
error_reporting(E_ALL);

    $con = mysqli_connect("localhost","host","test","capstone_db");

    if (!$con)
        {
             die('Could not connect: ' . mysqli_error($con));
        }

$result2 = mysqli_query($con,"SELECT * FROM link ");

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
               		Redirect::to('staffhomepage.php');
               	break;
               	case '2':
               		Redirect::to('userhomepage.php');
               	break;
                case '3':
               		Redirect::to('userhomepage.php');
               	break;
               	case '4':
               		Redirect::to('parentgrade.php');
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
?>

<head>
    <meta charset="utf-8">
    <title>Log in</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
     <link href="faith.css" rel="stylesheet">
    <style type="text/css">
		body{
		
		
	}
        </style>
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
     <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
    <script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
    <script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
    <script src="SpryAssets/SpryValidationCheckbox.js" type="text/javascript"></script>
    <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
	<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css">
	<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
	<link href="SpryAssets/SpryValidationCheckbox.css" rel="stylesheet" type="text/css">
    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height()); 
          window.parent.postMessage( iframe_height, 'http://bootsnipp.com');
        });
    </script>
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
          <a class="brand" href="index.php">The Hive</a>
          <div class="nav-collapse collapse">
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
	<div class="container">
    <div class="row">
     <img src="hive.png" alt="Second slide" style="margin-top:50px">
	 <h2 style="margin-left:500px; margin-top:-200px;">Welcome to the Hive Management System</h2>
    <p style="margin-left:500px; margin-top:0px;">This is a scholastic management system for students, parents, teachers and staff. HMS is used to consolidate information such as events, meetings and assignments between all users in an effective and efficient manner. </p>
  <div style="margin-left:500px; margin-top:0px;">Please enter your username and password to log in and access <em>your</em> specialized home page.</div>


		<div class="span12">

			<a style="margin-left:750px; margin-top:25px;"   data-toggle="modal" class="btn btn-large btn-success" href="#loginModal">Log in</a>
			 
			<div class="modal hide" id="loginModal">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">✕</button>
			        <h3>Login to The Hive</h3>
			    </div>
			        <div class="modal-body" style="text-align:center;">
			        <div class="row-fluid">
			            <div class="span10 offset1">
			                <div id="modalTab">
			                    <div class="tab-content">
			                        <div class="tab-pane active" id="login">
			                            <form name="form1" method="post" action="index.php" style="margin:auto;":>
			                                <p><span id="sprytextfield1" style="margin-left:345px" >
	        	   							 <label for="Username">Username:</label>
	        	    						 <input type="text" name="username" id="Username" placeholder="Username">
	        	    						 <span class="textfieldRequiredMsg">A value is required.</span></span></p>
			                                <p><span id="sprypassword1" style="margin-left:345px">
              								<label for="Password">Password:</label>
              								<input type="password" name="password" id="Password" placeholder="Password">
              								<span class="passwordRequiredMsg">A value is required.</span></span></p>
                                            
			                                <p><button type="submit" class="btn btn-success">Sign in</button>
			                                
			                                </p>
			                            </form>
			                        </div>
			                        
			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
		</div>
	</div>
    
    <div id="footer">
      <div class="container">
                
           <p align="right"  style="color:#CCCCCC; text-align:right; margin-top:25px; margin-right:-75px;">&copy; 2014 The Hive MS Inc. All rights reserved.</p>
            <h4 align="left" style="margin-top:-50px; text-align:left; margin-left:-25px; color:#CCCCCC;">Helpful Links</h4>
               <ul type="none">
             <span class="websitefont">
             </span>
             
			 <?php
             while ($row = mysqli_fetch_assoc($result2))
			 {
				 echo '<div class="span2" style="width:50px;">';
			
			  echo "<li  style='text-align:left; margin-left:-75px;'>" . "<span class=" .'websitefont' .">" . "<a href =" . $row['url'] .">" . $row['linkname'] . "</a>". "</span>" . "</li>" ;
			  echo '</div>';
          	 //<li><span class="websitefont"><a href="http://www.howtostudy.org/">How-to- study</a></span></li>
		   
			 }
         
         	?>
         </ul>
      </div>
    </div>

</div>
	<script type="text/javascript">
		</script>
        	<script scr="js/bootstrap.js">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var sprycheckbox1 = new Spry.Widget.ValidationCheckbox("sprycheckbox1");
        </script>
</body>