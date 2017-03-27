<?php
	//retrieve log in information
	$login = file('/home/int322_171d17/secret/topsecret');
	$dbserver = trim($login[0]);
	$uid = trim($login[1]);
	$pw = trim($login[2]);
	$dbname = trim($login[3]);
	
	//establish connection
	$link = mysqli_connect($dbserver, $uid, $pw, $dbname)
	or die ('Could not connect' . mysqli_error($link));

	//create table
	$sql_query = "create table users (
	username varchar(100) not null,
	password blob not null,
	role enum('user','admin') not null,
	passwordHint varchar(100),
	primary key (username))";
		
	$result = mysqli_query($link, $sql_query)
	or ('Query failed' . mysqli_error($link));
?>