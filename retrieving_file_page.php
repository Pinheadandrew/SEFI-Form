<?php
	/* Testing for file retrieval so I can make a download link fo it on the page that downloads the documents for each form submitted onto the host machine.*/

    require "dbconnect.php";
    
    $query_for_filenames = "SELECT * FROM form";
    $forms = $db->query($query_for_filenames);
    
		echo $forms->num_rows." forms submitted so far. Checking for the files uploaded for them.<br><table><tr>";
		$field_info = $forms->fetch_fields(); //<- Fetches all the attributes of the form table. 

		// Array to store strings of file category that are assigned to contain uploaded documents. Weeding out the attributes with "filepath" contained in name and push them into array.
		$filepath_fields = array();
		foreach($field_info as $field) 
		{
			if (strpos($field->name, 'filepath') !== false) 
			{
    		array_push($filepath_fields, $field->name);
			}
		}

		//Make header for each column corresponding to the file categories, using string of file category name stored from array.
		foreach ($filepath_fields as $file_directory)
			{
				echo "<td><strong>".$file_directory."</strong></td>";
			}

		echo "</tr>";
		// For each row in the forms table, generate a download link for all of the files assigned to the filepaths stored in the row. Output them in a table. Cycle through each field of the row that contain filepaths, print out a download link for the file.
    while ($form_row = $forms->fetch_assoc())
    {
			echo "<tr>";
			
			foreach ($filepath_fields as $fpath) 
			{
				echo "<td>";
      	if(!empty($form_row[$fpath]))
	    	{
		  		echo "<a href='$form_row[$fpath]' download target='_blank'>$form_row[$fpath]</a><br>";
	    	}
				else
				{
					echo "No file uploaded.";
				}
				echo "</td>";
			}
			echo "</tr>";
    }
	
?>
</table>