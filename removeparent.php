
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// List of cities for India


?>


<?php

// List of cities for USA
if ($_GET['parent']) 
{
	$cid=$_GET['parent'];
	
   ?>
<select name="parentid" id="Assigned Parent">
<option value="#">-Select-</option>

           <?php $con = mysqli_connect("localhost","mmollica","Thepw164", "capstone_db"); ?> 
					<?php $result = mysqli_query($con,' Select * FROM users WHERE groups = 4'); ?> 
					<?php while($row = mysqli_fetch_assoc($result)) { ?> 
					<option value="<?php echo $row['id'];?>"> 
					<?php echo htmlspecialchars($row['username']) . "-" . htmlspecialchars($row['fname']) . " " . htmlspecialchars($row['lname']); ?> 
					</option> 
					<?php } ?>
					<?php mysqli_close($con);?> 
          </select>
<?php
}
?>
