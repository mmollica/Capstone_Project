
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// List of cities for India

$con = mysqli_connect("localhost","mmollica","Thepw164", "capstone_db");
?>


<?php

// List of cities for USA
if ($_GET['grade']) 
{
	$asset=$_GET['grade'];
	
	$result = mysqli_query($con,"SELECT * FROM assignment WHERE assignmentid= $asset");
	$class=0;
	while($row = mysqli_fetch_assoc($result)) 
	{
		
		$class=$row['classid'];
		$name=$row['assignmentname'];
		$scale=$row['total'];
		$due=$row['duedate'];
		$total=$row['total'];
	}
	
   $result2 = mysqli_query($con,"SELECT studentid FROM classassign WHERE classid = $class");  
   
   echo '<br>';
			
			echo ' <div class="widget stacked widget-table action-table">';
    				
				echo '<div class="widget-header">';
					echo '<i class="icon-th-list"></i>';
					echo "<h2 style='margin-top:-15px; margin-left:-50px; text-align:center;'>". $name . " { ". $scale ." Pts}</h2>";
				echo '</div>'; 
				
				echo '<div class="widget-content">';
				
            echo '<table class="table table-striped table-bordered">';
            echo "<thead>";
            echo '<tr>';
            echo '<th>Student Name</th>';
            echo '<th>Upload</th>';
			echo '<th>Comments</th>';
            echo '<th>Late</th>';
			echo '<th>Current Grade</th>';
			
            echo '<th>Grade</th>';             
                          
            echo    '</tr>';
            echo    '</thead>';
                      
            echo    '<tbody>';
			$sid=0;
   
   while($row2 = mysqli_fetch_assoc($result2)) 
	{
		
		$student=$row2['studentid'];
		
		
		 $result3 = mysqli_query($con,"SELECT * FROM users WHERE id = $student");
		 
	while($row3 = mysqli_fetch_assoc($result3)) 
	{
		$sid=$row3['id'];
		echo '<tr>';
		echo '<td> ' . $row3['fname'] . '  ' . $row3['lname'] . '</td>';
		
		$result4 = mysqli_query($con, "SELECT * FROM studentupload WHERE assignmentid = $asset AND studentid = $sid");
		$query1 = mysqli_query($con, "SELECT * FROM studentupload WHERE assignmentid = $asset AND studentid = $sid");
		if(mysqli_fetch_assoc($result4)==false)
		{
			echo '<td></td>';
			echo '<td>No submission yet.</td>';
			echo '<td></td>';
			echo '<td></td>';
			echo "<td><input name='rightgrade' type='text' maxlength='3' size='3' >";
		}
		else
		{
			while($row4 = mysqli_fetch_assoc($query1)) 
			{
				echo "<td><a href='javascript:download(".$row4['id'].")'> " . $row4['file_name'] . "</td>";
				echo '<td>' . $row4['comment'] . '</td>';
				$islate = $row4['islate'];
				if($islate==1)
				{
					echo '<td>Yes</td>';
				}
				else
				{
					echo '<td>No</td>';
				}


			}
		
		
		$result5 = mysqli_query($con,"SELECT * FROM grades WHERE assignmentid = $asset AND studentid = $sid");
		$query2 = mysqli_query($con,"SELECT * FROM grades WHERE assignmentid = $asset AND studentid = $sid");
		$check = mysqli_query($con,"SELECT * FROM grades WHERE assignmentid = $asset AND studentid = $sid");
		
		if(mysqli_fetch_assoc($result5)==false)
		{
			echo '<td></td>';
		}
		else
		{
			while($row5 = mysqli_fetch_assoc($query2)) 
			{
				$points = $row5['points'];
				$gradeid = $row5['gradeid'];
				echo '<td>' . $points . '</td>';
			}
		}
		
		echo "<td><input name='points[]' type='text' size='3' >";
		echo '<input name="assignmentid[]" type="hidden" value=' . $asset . '>';
		echo '<input name="studentid[]" type="hidden" value=' . $student . '>';
		echo '<input name="islate[]" type="hidden" value=' . $islate . '>';
		echo '<input name="classid[]" type="hidden" value=' . $class . '>';
		if(mysqli_fetch_assoc($check)==true)
		{
			echo '<input name="newpoints[]" type="hidden" value=' . $points . '>';
			echo '<input name="gradeid[]" type="hidden" value=' . $gradeid . '>';
		}
		echo "</tr>"; 
		}
	
	}
	
	
}
echo "<tr>";
echo ' <td colspan="6"><input name="add" type="submit" value="Submit Grades" class="btn btn-med btn-success"></td>';
echo "</tr>";
echo "</tbody>";
				echo "</table>";

				echo '</div>';
				echo '</div>'; 
   				
   
}
   
   ?>


