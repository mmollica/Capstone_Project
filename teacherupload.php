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

// Get value of id that sent from hidden field 
$classid=$_POST['classid'];


// branch on the basis of 'calculate' value 
switch ($_POST['process']) {
      
      case 'assignment':
	  
if(Input::exists())
{
      if($_FILES['content']['name']==true)
      {
	      $upload = new Upload();
	      date_default_timezone_set('America/New_York');
	      $time = date("Y-m-d H:i:s");
	      
	      $tmpName = $_FILES['content']["tmp_name"];
	      $fileName = $_FILES['content']["name"];
	      $fileSize = $_FILES['content']['size'];            
	      $fileType = $_FILES['content']["type"];
	      $fileData = file_get_contents($_FILES['content']['tmp_name']);
	      
	      $total = Input::get('total');
	      echo $total;

	      if(!get_magic_quotes_gpc()) 
	      {
	          $fileName = addslashes($fileName);
	      }
	      /*move_uploaded_file($tmpName, "/temp/$fileName");
	      $tmpName = "/temp/$fileName";

	      $fp = fopen($tmpName, 'r');
	      $content = fread($fp, filesize($tmpName));
	      fclose($fp);*/
	  

	   
	      $allowedExts = array("gif", "jpeg", "jpg", "png", "pdf", "txt", "doc", "xdoc");
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
	          try
	            {
	                $upload->createassignment(array(
	                  'classid' =>  $classid,
	                  'date_added' => $time,
	                  'description'=> Input::get('description'),
	                  'assignmentname'=> Input::get('assignmentname'),
	                  'duedate'=>Input::get('duedate'),
	                  'type'=> 1,
	                  'total'=>Input::get('total'),
	                  'file_name'=>$fileName,
	                  'file_type'=>$fileType,
	                  'file_size'=>$fileSize,
	                  'file_data'=>$fileData
	                            ));

	            }
	            catch(Exception $e)
	            {
	        die($e->getMessage());
	            }
	        }
	      else
	        echo "Not acceptable file.";
	    }
	        else
    {
    	$upload = new Upload();
	    date_default_timezone_set('America/New_York');
	    $time = date("Y-m-d H:i:s");
    	try
	            {
	                $upload->createassignment(array(
	                  'classid' =>  $classid,
	                  'date_added' => $time,
	                  'description'=> Input::get('description'),
	                  'assignmentname'=> Input::get('assignmentname'),
	                  'duedate'=>Input::get('duedate'),
	                  'type'=> 1,
	                  'total'=>Input::get('total'),
	             
	                            ));

	            }
	            catch(Exception $e)
	            {
	        die($e->getMessage());
	            }
	}
	echo '<form id="processuser" name="form1" method="get" action="teacherassignmentpage.php">';
	echo '<input name="classid" type="hidden" value=' . $classid . ' class="btn btn-large btn-success">';
	echo '</form>';   
    break;
}
		
		

      case 'content':
	 
if(Input::exists())
{
      if($_FILES['content']['name']==true)
      {
	      $upload = new Upload();
	      date_default_timezone_set('America/New_York');
	      $time = date("Y-m-d H:i:s");
	      
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
	  

	   
	      $allowedExts = array("gif", "jpeg", "jpg", "png", "pdf", "txt", "doc", "xdoc");
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
	          try
	            {
	                $upload->createassignment(array(
	                  'classid' =>  $classid,
	                  'date_added' => $time,
	                  'description'=> Input::get('description'),
	                  'assignmentname'=> Input::get('assignmentname'),	                 
	                  'type'=> 2,                  
	                  'file_name'=>$fileName,
	                  'file_type'=>$fileType,
	                  'file_size'=>$fileSize,
	                  'file_data'=>$fileData
	                            ));

	            }
	            catch(Exception $e)
	            {
	        die($e->getMessage());
	            }
	        }
	      else
	        echo "Not acceptable file.";
    }
    else
    {
    	$upload = new Upload();
	     date_default_timezone_set('America/New_York');
	     $time = date("Y-m-d H:i:s");
    	try
	            {
	                $upload->createassignment(array(
	                  'classid' =>  $classid,
	                  'date_added' => $time,
	                  'description'=> Input::get('description'),
	                  'assignmentname'=> Input::get('assignmentname'),
	                  'type'=> 2
	             
	                            ));

	            }
	            catch(Exception $e)
	            {
	        die($e->getMessage());
	            }
	}
	echo $classid;
	echo '<form id="processuser" name="form1" method="get" action="teachercontentpage.php">';
	echo '<input name="classid" type="hidden" value=' . $classid . ' class="btn btn-large btn-success">';
	echo '</form>';   
    break;

}
		
		
}

?>

<script type="text/javascript">
document.getElementById("processuser").submit();
</script>