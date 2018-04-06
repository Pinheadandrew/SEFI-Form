<!--- THE SCRIPT TO INSERT NEW FORM INTO THE DATABASE ON SERVER --->
<?php

	foreach($_POST as $inputfield => $value)
	{
		echo $inputfield.": ".$value."<br>";
	}
?>