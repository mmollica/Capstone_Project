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

$linkid=$_POST['linkid'];
$url=$_POST['url'];
$linkname=$_POST['name'];




switch ($_POST['process']) {
      
      case 'Update':
	  
        $sql3="UPDATE link SET linkname='$linkname', url='$url' WHERE id= $linkid";
		$result3=mysqli_query($con,$sql3);  
		
		echo '<form id="processlink" name="form1" method="get" action="staffhomepage.php">';
		echo '</form>';   
            break;

      case 'Delete':
	  
	  $sql= "DELETE FROM link WHERE id = $linkid";
	  $result2=mysqli_query($con,$sql);
	  
	  echo '<form id="processlink" name="form1" method="get" action="staffhomepage.php">';
	  echo '</form>';
           
            break;

}

?>

<script type="text/javascript">
document.getElementById("processlink").submit();
</script>