<!--- THE SHOW FORM SCRIPT ON THE SERVER --->
<?php
	session_start();

	include "templates/header.php";
	require "dbconnect.php";
	//include "functions/retrieve_field_names.php";
	
	echo "<h2> THIS IS THE ADMIN PAGE, CHECK THESE SUBMITTED FORMS OUT</h2>";
	
	$select = "SELECT * FROM form";
	$forms = $db->query($select);
	echo "<table>";
?>
	<tr>
		<th>Form ID</th><th>Organization</th><th>Address</th><th>Phone Number</th><th>Director ;amp/or Contact</th>
		<th>E-mail</th><th>NJ County</th><th>GNJK TAS Name</th><th>GNJK TAS Phone</th><th>GNJK TAS E-mail</th>
		<th>Date of GNJK Transition to TAC</th><th>GNJK Region</th><th>Training Type</th><th>Duration</th><th>Time</th>
		<th>Day</th><th>Class level</th><th>Class Size</th><th>GNJK TAS Recommended Supports</th><th>Center Director Recommended Supports</th>
		<th>Site Staff Specfic Log</th><th>Site Staff Directions</th><th>GNJK TAS General Comments</th><th>GNJK TAS Specific Comments</th>
		<th>Center Director General Comments</th><th>Center Director Specific Comments</th>
	</tr>
<?php
	// Prints out each form that has been submitted and stored as row in table. If an attribute for an instance is null, print EMPTY in place of it.
	while($resultrow = $forms->fetch_assoc())
	{
		echo "<tr>";
		
		foreach($resultrow as $attrName => $value)
		{
			echo "<td>";
			
			if ($value == null || $value == "")
			{
				echo "EMPTY";
			}
			else
			{
				// If name of attribute being looped over is filename string, make a download link for it from the directory made for files of that attribute.
				if (strpos($attrName, 'filepath') !== false) 
				{
					$directory_name = str_replace("-filepath", "", $attrName);
    			echo "<a href='$directory_name/$value' download target='_blank'>$value</a>";
				}
				else
				{
					echo $value;
				}
			}
			
			echo "</td>";
		}
		
		echo "</tr>";
	}
echo "</table>";
include "templates/footer.php";
?>