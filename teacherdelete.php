<?php
ini_set('display_startup_errors', TRUE);
ini_set('display_errors',1); 
error_reporting(E_ALL);
require_once 'core/init.php';

$con = mysqli_connect("localhost","mmollica","Thepw164", "capstone_db");


// Get value of id that sent from hidden field 
$classid=$_POST['classid'];
$assignmentid=$_POST['assignmentid'];

// branch on the basis of 'calculate' value 

switch ($_POST['process']) 
{
	case 'Update Assignment':

		if($_FILES['content']['name']==true)
		{
			
			$total=$_POST['total'];
			$duedate=$_POST['duedate'];
			$assignmentname=$_POST['assignmentname'];
			$description=$_POST['description'];
			$tmpName = $_FILES['content']["tmp_name"];
		    $fileName = $_FILES['content']["name"];
		    $fileSize = $_FILES['content']['size'];            
		    $fileType = $_FILES['content']["type"];
		    $fileData = file_get_contents($_FILES['content']['tmp_name']);
			
			if(!get_magic_quotes_gpc()) 
			{
			  $fileName = addslashes($fileName);
			}
			/*move_uploaded_file($tmpName, "/temp/$fileName");
			$tmpName = "/temp/$fileName";

			$fp = fopen($tmpName, 'r');
			$content = fread($fp, filesize($tmpName));
			fclose($fp);*/



			$allowedExts = array("gif", "jpeg", "jpg", "png", "pdf", "txt", "doc", "docx");
			$temp = explode(".", $_FILES['content']["name"]);
			//$ext = end($temp);
			$temp2 = end($temp);
			$ext = (string) $temp2;

			if ((($_FILES['content']["type"] == "image/gif")
			|| ($_FILES['content']["type"] == "image/jpeg")
			|| ($_FILES['content']["type"] == "image/jpg")
			|| ($_FILES['content']["type"] == "image/pjpeg")
			|| ($_FILES["content"]["type"] == "text/plain")
			|| ($_FILES["content"]["type"] == "application/msword")
			|| ($_FILES["content"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
			|| ($_FILES['content']["type"] == "image/x-png")
			|| ($_FILES['content']["type"] == "application/pdf")
			|| ($_FILES['content']["type"] == "image/png"))
			&& ($_FILES['content']["size"] < 1024000)
			&& in_array($ext, $allowedExts))
			{
				$query1="UPDATE assignment SET total='$total', duedate='$duedate', assignmentname='$assignmentname', description='$description', file_name='$fileName', file_type='$fileType', file_size='$fileSize', file_data='$fileData' WHERE assignmentid= $assignmentid";
				$result1=mysqli_query($con,$query1);  
			}
					
			 
		}
		else
		{
			
			$total=$_POST['total'];
			$duedate=$_POST['duedate'];
			$assignmentname=$_POST['assignmentname'];
			$description=$_POST['description'];
			$query2="UPDATE assignment SET total='$total', duedate='$duedate', assignmentname='$assignmentname', description='$description', file_name='', file_type='', file_size='', file_data='' WHERE assignmentid= $assignmentid";
			$result2=mysqli_query($con,$query2); 
			
		}
		
		echo '<form id="processuser" name="form1" method="get" action="teacherassignmentpage.php">';
		echo '<input name="classid" type="hidden" value=' . $classid . ' class="btn btn-large btn-success">';
		echo '</form>'; 
    break;
		
	case 'Update Content':
		
		if($_FILES['content']['name']==true)
		{
			
			$assignmentname=$_POST['assignmentname'];
			$description=$_POST['description'];
			$tmpName = $_FILES['content']["tmp_name"];
		    $fileName = $_FILES['content']["name"];
		    $fileSize = $_FILES['content']['size'];            
		    $fileType = $_FILES['content']["type"];
		    $fileData = file_get_contents($_FILES['content']['tmp_name']);
			
			if(!get_magic_quotes_gpc()) 
			{
			  $fileName = addslashes($fileName);
			}
			/*move_uploaded_file($tmpName, "/temp/$fileName");
			$tmpName = "/temp/$fileName";

			$fp = fopen($tmpName, 'r');
			$content = fread($fp, filesize($tmpName));
			fclose($fp);*/



			$allowedExts = array("gif", "jpeg", "jpg", "png", "pdf", "txt", "doc", "docx");
			$temp = explode(".", $_FILES['content']["name"]);
			//$ext = end($temp);
			$temp2 = end($temp);
			$ext = (string) $temp2;

			if ((($_FILES['content']["type"] == "image/gif")
			|| ($_FILES['content']["type"] == "image/jpeg")
			|| ($_FILES['content']["type"] == "image/jpg")
			|| ($_FILES['content']["type"] == "image/pjpeg")
			|| ($_FILES["content"]["type"] == "text/plain")
			|| ($_FILES["content"]["type"] == "application/msword")
			|| ($_FILES["content"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
			|| ($_FILES['content']["type"] == "image/x-png")
			|| ($_FILES['content']["type"] == "application/pdf")
			|| ($_FILES['content']["type"] == "image/png"))
			&& ($_FILES['content']["size"] < 1024000)
			&& in_array($ext, $allowedExts))
			{
				$query1="UPDATE assignment SET assignmentname='$assignmentname', description='$description', file_name='$fileName', file_type='$fileType', file_size='$fileSize', file_data='$fileData' WHERE assignmentid= $assignmentid";
				$result1=mysqli_query($con,$query1);  
			}
					
			
		}
		else
		{
			$assignmentname=$_POST['assignmentname'];
			$description=$_POST['description'];
			$query2="UPDATE assignment SET total='$total', duedate='$duedate', assignmentname='$assignmentname', description='$description', file_name='', file_type='', file_size='', file_data='' WHERE assignmentid= $assignmentid";
			$result2=mysqli_query($con,$query2);  
	
			 
		}
		echo '<form id="processuser" name="form1" method="get" action="teachercontentpage.php">';
		echo '<input name="classid" type="hidden" value=' . $classid . ' class="btn btn-large btn-success">';
		echo '</form>';
    break;

    case 'Delete Assignment':
		
		$sql= "DELETE FROM assignment WHERE assignmentid= $assignmentid";
		$result2=mysqli_query($con,$sql);

		echo '<form id="processuser" name="form1" method="get" action="teacherassignmentpage.php">';
		echo '<input name="classid" type="hidden" value=' . $classid . ' class="btn btn-large btn-success">';
		echo '</form>';   
           
    break;
    case 'Delete Content':
		
		$sql= "DELETE FROM assignment WHERE assignmentid= $assignmentid";
		$result2=mysqli_query($con,$sql);

		echo '<form id="processuser" name="form1" method="get" action="teachercontentpage.php">';
		echo '<input name="classid" type="hidden" value=' . $classid . ' class="btn btn-large btn-success">';
		echo '</form>';   
           
    break;
}

?>
<script type="text/javascript">
document.getElementById("processuser").submit();
</script>