
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// List of cities for India


?>


<?php

// List of cities for USA
if ($_GET['class']) 
{
	$cid=$_GET['class'];
	
   ?>
<select name="studentid" id="Assigned Student">
<option value="#">-Select-</option>

           <?php $con = mysqli_connect("localhost","mmollica","Thepw164", "capstone_db"); ?> 
					<?php $result = mysqli_query($con,' Select * FROM users WHERE groups = 3 AND id NOT IN ( SELECT studentid FROM classassign WHERE classid = ' .$cid . ')'); ?> 
					<?php while($row = mysqli_fetch_assoc($result)) { ?> 
					<option value="<?php echo $row['id'];?>"> 
					<?php echo htmlspecialchars($row['id']) . "-" . htmlspecialchars($row['fname']) . " " . htmlspecialchars($row['lname']); ?> 
					</option> 
					<?php } ?>
					<?php mysqli_close($con);?> 
          </select>
<?php
}
?>
