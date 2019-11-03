<?php
/**
WEBDEV 2 - FINAL PROJECT
STUDENT : BRUNO PERRELLI
ID: 0316446
**/
include 'connect.php';

	session_start();


	
	$pageID 			= $_POST['tID'];
    $query = "DELETE FROM  pages WHERE pageID = '$pageID'   ";
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
<pre> <?php print_r($_FILES) ?> </pre> 



</body>
</html>




