
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
	
	$result = mysqli_query($con,"Select * FROM assignment WHERE assignmentid= $asset");
	$class=0;
	while($row = mysqli_fetch_assoc($result)) 
	{
		
		$class=$row['classid'];
		$name=$row['assignmentname'];
		$scale=$row['total'];
		$due=$row['duedate'];
	}
	
   $result2 = mysqli_query($con," Select studentid FROM classassign WHERE classid = $class");  
   
   echo '<br>';
			
			echo ' <div class="widget stacked widget-table action-table">';
    				
				echo '<div class="widget-header">';
					echo '<i class="icon-th-list"></i>';
					echo "<h2 style='margin-top:-15px;margin-left:150px;'>". $name . "{ ". $scale ." Pts}</h2>";
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
		
		
		 $result3 = mysqli_query($con," Select * FROM users WHERE id = $student");
		 
	while($row3 = mysqli_fetch_assoc($result3)) 
	{
		$sid=$row3['id'];
		echo '<tr>';
		echo '<td> ' . $row3['fname'] . '  ' . $row3['lname'] . '</td>';
		
		 $result4 = mysqli_query($con," Select * FROM studentupload WHERE assignmentid = $asset AND studentid = $sid");
		
		if(!$result4)
		{
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
		}
		
		else
		{
			while($row4 = mysqli_fetch_assoc($result4)) 
			{
			echo '<td>' . $row4['file_name'] . '</td>';
			echo '<td>' . $row4['comment'] . '</td>';
			echo "<td></td>";
			}
		}
		
		$result5 = mysqli_query($con," Select * FROM grades WHERE assignmentid = $asset AND studentid = $sid");
		 
		 if(!$result5)
		 {
			
			echo "<td></td>"; 
		 }
		 
		 else
		 {
			while($row5 = mysqli_fetch_assoc($result5)) 
			{
			echo '<td>' . $row5['points'] . '</td>';
			}
		 }
		echo "<td><input name='rightgrade' type='text' maxlength='3' size='3' >";
		echo "</tr>"; 
		
	
	}
	
	
}
echo "</tbody>";
				echo "</table>";
				echo '</div>';
				echo '</div>'; 
   
   
}
   
   ?>


