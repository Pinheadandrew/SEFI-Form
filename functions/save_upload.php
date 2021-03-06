<?php
	/* Script of function that would take string for title of field and store it in a 
	directory based on which field it was submitted through. It's in the works. Based off of W3Schools file upload example, https://www.w3schools.com/php/php_file_upload.asp */
		
	$target_dir = $file_field;
	if(!is_writable($target_dir))
	{
		echo "Directory NOT Writable.<br>";
	}
	else
	{
		$target_file = basename($f_name);
		$uploadOk = 1;
		$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if file already exists
		if (file_exists("$target_dir/$target_file")) 
		{
				echo "Sorry, file already exists.<br>";
				$uploadOk = 0;
		}
		// Check file size
		if ($file["size"] > 5000000) 
		{
				echo "Sorry, your file is too large.<br>";
				$uploadOk = 0;
		}
		// Allow certain file formats
		if($fileType != "doc" && $fileType != "docx" && $fileType != "pdf") 
		{
				echo "Sorry, only .doc, .docx, and .pdf files are allowed.<br>";
				$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.<br>";
		// if everything is ok, try to upload file
		} 
		else 
		{
			if (move_uploaded_file($file["tmp_name"], "$target_dir/$target_file")) 
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