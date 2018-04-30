<!--- THE SHOW FORM SCRIPT ON THE SERVER --->
<?php
	session_start();
//	if (!$_SESSION["admin_login"])
//	{
//		header("Location: admin_login.html");;
//	}

	include "templates/header.php";
	require "dbconnect.php";
	//include "functions/retrieve_field_names.php";
	
	echo "<h2> THIS IS THE ADMIN PAGE, CHECK THESE SUBMITTED FORMS OUT</h2>";
	
	$select = "SELECT * FROM form";
	$forms = $db->query($select);
	$field_info = $forms->fetch_fields();
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
	// Prints out each form that has been submitted and stored. 
	while($result = $forms->fetch_array(MYSQLI_NUM))
	{
		echo "<tr>";
		foreach($result as $attr)
		{
			echo "<td>";
			if ($attr == null || $attr == "")
			{
				echo "EMPTY";
			}
			else
			{
				echo $attr;
			}
			echo "</td>";
		}
		echo "</tr>";
	}
echo "</table>";
include "templates/footer.php";
?>