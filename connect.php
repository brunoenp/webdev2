<?php
/**
WEBDEV 2 - FINAL PROJECT
STUDENT : BRUNO PERRELLI
ID: 0316446
**/

define ('DB_DSN', 'mysql:host=localhost;dbname=project;charset=utf8');
define ('DB_USER', 'project');
define ('DB_PASS', 'project');

//Create a PDO object called $db.
	try{
		$db = new PDO(DB_DSN, DB_USER, DB_PASS);
	} catch (PDOException $e) {
		print "Error: " . $e->getMessage();
		die();
	}

?>