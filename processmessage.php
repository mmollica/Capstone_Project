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

$messageid=$_POST['messageid'];
$title=$_POST['title'];
$date=$_POST['date'];
$content=$_POST['content'];




switch ($_POST['process']) {
      
      case 'Update':
	  
        $sql3="UPDATE staffmessage SET title='$title', date='$date', msg='$content' WHERE smsgid= $messageid";
		$result3=mysqli_query($con,$sql3);  
		
		echo '<form id="processmsg" name="form1" method="get" action="staffhomepage.html">';
		echo '</form>';   
            break;

      case 'Delete':
	  
	  $sql= "DELETE FROM staffmessage WHERE smsgid = $messageid";
	  $result2=mysqli_query($con,$sql);
	  
	  echo '<form id="processmsg" name="form1" method="get" action="staffhomepage.html">';
	  echo '</form>';
           
            break;

}

?>

<script type="text/javascript">
document.getElementById("processmsg").submit();
</script>