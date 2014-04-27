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

$tbl_name="forum_question"; // Table name 

// get data that sent from form 
$topic1=$_POST["topic"];
$detail1=$_POST["detail"];
$classid1=$_POST["classid"];

$datetime=date("d/m/y h:i:s"); //create date time

$sql="INSERT INTO forum_question (topic, detail, classid) VALUES('{$topic1}', ' {$detail1}', ' {$classid1}')";



$result=mysqli_query($con,$sql);


if($result)
{
echo '<form id="addtopic" name="form1" method="get" action="main_forum.php">';
 echo '<input name="classid" type="hidden" value=' . $classid1 .'>';
 
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
