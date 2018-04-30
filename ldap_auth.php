<?php

// function to use LDAP authentication
// created by Justin Towe
// modified by pastries

function ldap_login($uid,$pword)
	{
	if($uid == "admin" && $pword == "adminpassword")
		{
		//no ldap if 'local' admin username & password are provided here
		return true;
		}
	
	// otherwise use LDAP auth
		
	define("_LDAP_URI", "ldap.montclair.edu");
	define("_LDAP_CONTEXT", "o=montclair.edu,dc=montclair,dc=edu");	
	$connect_id = ldap_connect(_LDAP_URI) or die("Failed to connect to " . _LDAP_URI );
	ldap_set_option($connect_id, LDAP_OPT_PROTOCOL_VERSION, 3);

	// bind anonymously...
	ldap_bind($connect_id) or die("Failed to bind anonymously to the directory.");

	//lookup the user's dn
	$search_id = ldap_search($connect_id, _LDAP_CONTEXT, "(&(uid=$uid)(inetuserstatus=active))", array('dn'));

	//check the results to verify that an active user with this uid exists:
	$result_array = ldap_get_entries($connect_id, $search_id);

	// ensure that there was exactly one object returned with this uid
	if ($result_array['count'] != 1)
		{
		return false;
		}
    
    $dn = $result_array[0]['dn'];
    
	// free up memory, just in case the LDAP search returned a huge resultset
	ldap_free_result($search_id);

	// re-bind using the user's dn and supplied password.
	$bind = ldap_bind($connect_id, $dn, $pword);

	if ($bind && $pword != '')
		{
		return true;
		}
	else
		{
		return false;
		}
	}
?>

