<!--- THE SCRIPT TO INSERT NEW FORM INTO THE DATABASE ON SERVER --->
<?php

	$insertValues = array();
		
	// Prints name of each input element and what has been submitted. Stores them in dictionary $queryArguments 
	// so inputs later used in query string.
	foreach($_POST as $inputfield => $value)
	{
		// echo "$inputfield: $value<br>";
		$insertValues[$inputfield] = $value;
		echo "$inputfield: ".$insertValues[$inputfield]."<br>";
	}
		
// Prints file field names and the name of the submitted files.
	echo '<strong>Files Uploads: '.count($_FILES).' of them</strong><br>';
	foreach($_FILES as $file_field => $file)
		{
			$f_name = $file['name'];
			echo "<strong>".$file_field.": ".$f_name."</strong><br>";
			include "functions/save_upload.php";
		}

	// Sets size of class variable to be the value in input field corresponding to the class level(pre-k, toddlers).
	// i.e. values are 10 for pre-k, 5 for toddlers. If pre-k is selected radio button, then class size variable set to 10.
	if ($insertValues['classlevel'] == "preschool")
	{
		$classSize = $insertValues['classsize_prek'];
	}
	else
	{
		$classSize = $insertValues['classsize_inf'];
	}
	// Build the insert statement that will append to the database the new form's data.
	require "dbconnect.php";
	$insert_query = "insert into form values('',
			'".$insertValues['org-name']."',
			'".$insertValues['org-address']."',
			'".$insertValues['org-phnumber']."',
			'".$insertValues['contactname']."',
			'".$insertValues['contact-email']."',
			'".$insertValues['org-county']."',
			'".$insertValues['tasname']."',
			'".$insertValues['tasphone']."',
			'".$insertValues['tasemail']."',
			'".$insertValues['gnjktransdate']."',
			'".$insertValues['gnjkregion']."',
			'".$insertValues['classlevel']."',
			'".$classSize."',
			'".$insertValues['trainingtype']."',
			'".$insertValues['duration']."',
			'".$insertValues['timeofday']."',
			'".$insertValues['dayofweek']."',
			'','')";
	echo $insert_query;
	$db->query($insert_query);
	if($db->error)
	{
			echo "What.<br>";
	}
?>