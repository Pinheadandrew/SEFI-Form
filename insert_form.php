<!--- THE SCRIPT TO INSERT NEW FORM INTO THE DATABASE ON SERVER --->
<?php

	foreach($_POST as $inputfield => $value)
	{
		echo "$inputfield: $value<br>";
	}
		
// Prints file field names and the name of the submitted files.
	echo '<strong>Files Uploads:</strong><br>';
	foreach($_FILES as $file_field => $file)
		{
			$f_name = $file['name'];
			echo "<strong>".$file_field.": ".$f_name."</strong><br>";
			include "functions/save_upload.php";
		}
?>