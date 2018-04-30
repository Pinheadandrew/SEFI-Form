<?php

@ $db = new mysqli('localhost', /* MySQL User on server*/, /* User's Password */, 'sefiform');

if(!$db)
{
    echo "There was an error connecting to the database.";
}
?>