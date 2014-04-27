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
$clubid=$_POST['clubid'];
$clubname=$_POST['clubname'];
$assign=$_POST['assignedteacher'];





// branch on the basis of 'calculate' value 
switch ($_POST['process']) {
      
      case 'Update':
	  
        $sql3="UPDATE club SET clubname='$clubname', teacherid='$assign' WHERE id= $clubid";
		$result3=mysqli_query($con,$sql3);  
		
		echo '<form id="processclub" name="form1" method="get" action="staffhomepage.php">';
		echo '</form>';   
            break;

      case 'Delete':
	  
	  $sql= "DELETE FROM club WHERE id = $clubid";
	  $result2=mysqli_query($con,$sql);
	  
	  echo '<form id="processclub" name="form1" method="get" action="staffhomepage.php">';
	  echo '</form>';
           
            break;

}

?>

<script type="text/javascript">
document.getElementById("processclub").submit();
</script>