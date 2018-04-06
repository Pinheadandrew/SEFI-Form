<?php
	/* Script of function that would take string for title of field and store it in a directory based on which field it was submitted through. It's in the works*/
		
	$target_dir = "site-staff-comments/";
	$target_file = $target_dir.basename($_FILES["sitestaff-comments-upload"]["name"]);
	echo $target_file;
	$uploadOk = 1;
	$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	if(!isset($_POST["submit"])) 
	{
		echo "No file for Site Staff Comments uploaded!";
	}
	// Check if file already exists
	if (file_exists($target_file)) 
	{
			echo "Sorry, file already exists.";
			$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["sitestaff-comments-upload"]["size"] > 500000) 
	{
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
	}
	// Allow certain file formats
	if($fileType != "doc" && $fileType != "docx") 
	{
			echo "Sorry, only .doc and .docx files are allowed.";
			$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} 
	else 
	{
			if (move_uploaded_file($_FILES["sitestaff-comments-upload"]["tmp_name"], $target_file)) 
			{
					echo "The file ". basename( $_FILES["sitestaff-comments-upload"]["name"]). " has been uploaded.";
			} else 
			{
					echo "Sorry, there was an error uploading your file.";
			}
	}
?>