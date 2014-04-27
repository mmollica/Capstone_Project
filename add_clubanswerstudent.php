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

// Get value of id that sent from hidden field 
$id=$_POST['forumid'];
$clubid=$_POST['clubid'];
// Find highest answer number.
 
$sql="SELECT MAX(a_id) AS Maxa_id FROM clubforum_answer WHERE question_id= $id";

$result=mysqli_query($con,$sql);

$rows=mysqli_fetch_array($result);

// add + 1 to highest answer number and keep it in variable name "$Max_id". if there no answer yet set it = 1 
if ($rows) 
{
$Max_id = $rows['Maxa_id']+1;
}

$Max_id = 1;


// get values that sent from form 
$a_name=$_POST['a_name'];
$a_title=$_POST['a_title'];
$a_answer=$_POST['a_answer']; 

$datetime=date("d/m/y h:i:s"); // create date and time

// Insert answer 
$sql2="INSERT INTO clubforum_answer (question_id, a_id, a_name, a_title, a_answer, a_datetime) VALUES('{$id}', '{$Max_id}', '{$a_name}', '{$a_title}', '{$a_answer}', '{$datetime}')";

$result2=mysqli_query($con,$sql2);

if($result2)
{
	
$sql3="UPDATE clubforum_question SET reply='$Max_id' WHERE id= $id";
$result3=mysqli_query($con,$sql3);

echo '<form id="viewtopic" name="form1" method="get" action="view_clubtopicstudent.php">';
 echo '<input name="forumid" type="hidden" value=' . $id .'>';
 echo '<input name="clubid" type="hidden" value=' . $clubid .'>';
 echo '</form>'; 
}
else {
echo "ERROR";
}

// Close connection
mysqli_close($con);
?>

<script type="text/javascript">
document.getElementById("viewtopic").submit();
</script>