<!--- THE SCRIPT TO INSERT NEW FORM INTO THE DATABASE ON SERVER --->
<?php

	foreach($_POST as $inputfield => $value)
	{
		echo $inputfield.": ".$value;
		
		if (strpos($inputfield, 'upload') !== false) 
		{
    	echo ' (This is also a file upload field)';
		}
		echo "<br>";
	}
	
	include "functions/save_upload.php";
?>