<!--- THE SHOW FORM SCRIPT ON THE SERVER --->
<?php
	echo "This script is to display all successfully submitted forms stored it in the form table of the sefiform database.";

	require "dbconnect.php";

	$select = "SELECT * , datediff(`date_of_gnjk_to_tac`, '2012-02-24') FROM form";
	$results = $db->query($select);
	echo "<table>";
	while($result = $results->fetch_array(MYSQLI_NUM))
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
$stuff = array("git"=> "good", "gg"=> "ez",);

foreach ($stuff as $key => $value)
{
	if($key == "git")
	{
		echo "git gud";
	}
}
?>