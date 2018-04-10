<?php
	/* Script of function that would take string for title of field and store it in a directory based on which field it was submitted through. It's in the works. */
		
	$target_dir = $file_field."/";
	if(!is_writable($target_dir))
	{
		echo "Directory NOT Writable.<br>";
	}
	else
	{
		$target_file = $target_dir.basename($f_name);
		$uploadOk = 1;
		$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		if(!isset($_POST["submit"])) 
		{
			echo "No file uploaded yet!<br>";
		}
		// Check if file already exists
		if (file_exists($target_file)) 
		{
				echo "Sorry, file already exists.<br>";
				$uploadOk = 0;
		}
		// Check file size
		if ($file["size"] > 500000) 
		{
				echo "Sorry, your file is too large.<br>";
				$uploadOk = 0;
		}
		// Allow certain file formats
		if($fileType != "doc" && $fileType != "docx") 
		{
				echo "Sorry, only .doc and .docx files are allowed.<br>";
				$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.<br>";
		// if everything is ok, try to upload file
		} 
		else 
		{
			if (move_uploaded_file($file["tmp_name"], $target_file)) 
			{
					echo "The file ". basename($f_name). " has been uploaded.<br>";
			} 
			else 
			{
					echo "Sorry, there was an error uploading your file.<br>";
			}
		}
	}
?>