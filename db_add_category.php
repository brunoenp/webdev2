<?php
/**
WEBDEV 2 - FINAL PROJECT
STUDENT : BRUNO PERRELLI
ID: 0316446
**/
include 'connect.php';

	
	$titleName 		= $_POST['tName'];
	$pageCategory	= $_POST['tCategory'];

    $query = "INSERT INTO  pages (Title,CategoryID) values ('$titleName', '$pageCategory')";
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




