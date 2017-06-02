<?php
session_start();
include("../model/database.php");
include("../model/functions_users.php");

$user_id = $_SESSION['user_id'];

function GetImageExtension($imagetype)
	 {
   if(empty($imagetype)) return false;
   switch($imagetype)
   {
       case 'image/bmp': return '.bmp';
       case 'image/gif': return '.gif';
       case 'image/jpeg': return '.jpg';
       case 'image/png': return '.png';
       default: return false;
   }
 }

if (!empty($_FILES["uploadedimage"]["name"])) {
	if ($_FILES["uploadedimage"]["size"] > 500000) {
    $_SESSION['error'] = "Your file is too large";
		header("location:../view/profile.php");
	} else {
		$file_name=$_FILES["uploadedimage"]["name"];
		$temp_name=$_FILES["uploadedimage"]["tmp_name"];
		$imgtype=$_FILES["uploadedimage"]["type"];
		$ext= GetImageExtension($imgtype);
		if (in_array($ext, array('.bmp', '.gif', '.jpg', '.png')) ){
			$imagename=date("d-m-Y")."-".time().$ext;
			$target_path = "../view/images/".$imagename;
		  if(move_uploaded_file($temp_name, $target_path)) {
		   	$result = saveimagepath($imagename, $user_id);
		    if($result){
		      $_SESSION['success'] = "You have successfully updated your profile picture";
					$_SESSION['avatar'] = $imagename;
		      header("location:../view/profile.php");
		    }
		  } else {
		     header("location:../view/profile.php");
		  }
		} else {
			$_SESSION['error'] = "Incorrect file type";
			header("location:../view/profile.php");
		}
	}
} else {
	header("location:../view/profile.php");
}
?>
