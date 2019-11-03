<?php
/**
WEBDEV 2 - FINAL PROJECT
STUDENT : BRUNO PERRELLI
ID: 0316446
**/
include 'connect.php';

	
	$userName 			= $_POST['tUsername'];
	$password    		= $_POST['tPassword'];
	$privilege      	= $_POST['tPrivilege'];

	$password_hash      =  hash('sha256', $password);



     $query = "INSERT INTO  users (username,password, privilege) values ('$userName','$password_hash','$privilege')";
    $statement = $db->prepare($query);
    $statement->execute();


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<pre> <?php print_r($_POST) ?> </pre> 

</body>
</html>




