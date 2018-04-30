<?php

// Takes two arguments: a database connection and a name of a table. Returns an associative array storing each attribute's info of the queried table.
function get_field_names($db_connect, $table)
{
	if ($db_connect->errno)
	{
		echo "Connection to database was never established.";
	}
	else
	{
		$forms = $db_connect->query("select * from $table");
		$field_info = $forms->fetch_fields(); //<- Fetches all the attributes of the form table. 
		return $field_info;
	}
}

?>