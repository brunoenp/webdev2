<?php

include 'connect.php';

session_start();
echo $_SESSION['auth_status'];

$providedUsername = $_POST['username'];
$providedPassword = $_POST['password'];
$providedHash     =  hash('sha256', $providedPassword);

    $queryPages = "SELECT * FROM users WHERE username = '$providedUsername' ";
    $statement = $db->prepare($queryPages);
    $statement->execute();
    $users = $statement->fetchAll();
    $realPassword = $users[0]['password'];
    $username = $users[0]['username'];
    $userID = $users[0]['userID'];
    $userPrivilege = $users[0]['privilege'];


    echo $realPassword;


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<!--<pre> <?= print_r($_POST) ?> </pre> -->
<!--<pre> <?= print_r($users) ?> </pre> -->

<?php if ($providedHash === $realPassword) : ?>
	<h2> PASSWORD IS CORRECT! </h2>
	<p> Redirecting you to the home page... </p>
	<?php $_SESSION['auth_status'] = 'authenticated' ; ?>
	<?php $_SESSION['user'] = $username; ?>
	<?php $_SESSION['userID'] = $userID; ?>
	<?php $_SESSION['privilege'] = $userPrivilege; ?>


	<?php header("Refresh:5; url=main.php"); ?>

	<?php else : ?>
	<h3> PASSWORD INVALID! </h3>
	<?php $_SESSION['auth_status'] = 'guest' ; ?>

<?php endif ?>



</body>
</html>