<?php

include "ldap_auth.php";
$username = $_POST['username'];
$password = $_POST['password'];

// Authenticate NetID entered.
if (ldap_login($username,$password))
{
	session_start();
	$_SESSION["admin_login"] = true;
	header("Location: show_forms.php");
}
else
{
	header("Location: admin_login.html");
}
//$con=mysqli_connect('localhost','sefiform','8D3nSs]N',"sefiform");
//if($con)
//  echo 'connected sucessfully to sefiform database';
  
?>
