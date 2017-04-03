<?php
	//instantiate a DBLink object and then uses all the public functions to test the class
	//several queries to test 

	include_once "myClasses.php";

	//retrieve log in information
	$login = file('/home/int322_171d17/secret/topsecret');
	$dbserver = trim($login[0]);
	$uid = trim($login[1]);
	$pw = trim($login[2]);
	$dbname = trim($login[3]);

	$db = new DB_link($dbserver, $uid, $pw, $dbname);

	//update
	$user = "alena@hotmail.com";
	$query = "update users set passwordHint = 'number one new' where username = '" . $user ."'";
	$result = $db -> query($query);
	if($result)
	{
		echo "Update complete.<br>";
	}

	//select
	$query = "select username from users";
	$result = $db -> query($query);
	$db -> display($result);
	if($result)
	{
		echo "Select complete.<br>";
	}

	//returns true if the last result set returned from the DB had no records in it
	//otherwise, it should return false (meaning there are records in the result set)
	$result = $db->emptyResult();
	if($result){
		echo "No results";
	}


?>


