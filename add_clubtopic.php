<?php
ini_set('display_startup_errors', TRUE);
ini_set('display_errors',1); 
error_reporting(E_ALL);
require_once 'core/init.php';


    $con = mysqli_connect("localhost","mmollica","Thepw164","capstone_db");

    if (!$con)
        {
             die('Could not connect: ' . mysqli_error($con));
        }

$tbl_name="clubforum_question"; // Table name 

// get data that sent from form 
$topic1=$_POST["topic"];
$detail1=$_POST["detail"];
$clubid1=$_POST["clubid"];
date_default_timezone_set('America/New_York');
$datetime=date("Y-m-d H:i:s"); //create date time

$sql="INSERT INTO clubforum_question (topic, detail, clubid, datetime) VALUES('{$topic1}', ' {$detail1}', ' {$clubid1}', ' {$datetime}')";



$result=mysqli_query($con,$sql);


if($result)
{
echo '<form id="addtopic" name="form1" method="get" action="teacherclubhomepage.php">';
 echo '<input name="clubid" type="hidden" value=' . $clubid1 .'>';
 
 echo '</form>'; 

}

else {
echo "ERROR" . mysqli_error($con);
}
mysqli_close($con);
?>

<script type="text/javascript">
document.getElementById("addtopic").submit();
</script>
