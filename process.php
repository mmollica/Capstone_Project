<?php
ini_set('display_startup_errors', TRUE);
ini_set('display_errors',1); 
error_reporting(E_ALL);
require_once 'core/init.php';

$con = mysqli_connect("localhost","mmollica","Thepw164", "capstone_db");

    if (!$con)
        {
             die('Could not connect: ' . mysqli_error($con));
        }

// Get value of id that sent from hidden field 
$userid=$_POST['userid'];
$firstname=$_POST['fname'];
$lastname=$_POST['lname'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$zip=$_POST['zip'];
$group=$_POST['groups'];




// branch on the basis of 'calculate' value 
switch ($_POST['process']) {
      
      case 'Update':
	  
        $sql3="UPDATE users SET fname='$firstname', lname='$lastname', address='$address', city='$city', state='$state', zip='$zip', groups='$group' WHERE id= $userid";
		$result3=mysqli_query($con,$sql3);  
		
		echo '<form id="processuser" name="form1" method="get" action="staffhomepage.php">';
		echo '</form>';   
            break;

      case 'Delete':
	  
	  $sql= "DELETE FROM users WHERE id = $userid";
	  $result2=mysqli_query($con,$sql);
	  
	  echo '<form id="processuser" name="form1" method="get" action="staffhomepage.php">';
	  echo '</form>';
           
            break;

}

?>

<script type="text/javascript">
document.getElementById("processuser").submit();
</script>