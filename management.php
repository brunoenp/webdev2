<?php

session_start();


?>

<?php if ($_SESSION['user'] === 'guest') : ?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>ACESS DENIED</title>
	</head>
	<body>
		<h1> GUEST ACCESS IS NOT ALLOWED ON THIS PAGE! </h1>
	</body>
	</html>

<?php else : ?>



<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ON-DEMAND MISSIONS BOARD</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body>
	<header>
		<h1> ON-DEMAND MISSIONS - SITE ADMINISTRATION</h1>
	<nav id="top-categories"> 
		<ul> 
			<li><a href="http://10.10.128.0:31337/project/webdev2/main.php">Home</a></li>
		</ul>
		<br>
		<br>
	</nav>
		<h2> Please select an option : </h2>
	
	</header>

<section id="pageContent">
		<main role="main">
			<button class="button button1" type="submit" onClick="window.location='create_user.php';">ADD USER</button>		
			<button class="button button1" type="submit" onClick="window.location='create_user.php';">ADD CATEGORY</button>	
			<button class="button button1" type="submit" onClick="window.location='create_user.php';">ADD PLATFORM</button>		
		</main>

		</section>	
	<footer>
		<p></p>
	</footer>


</body>

</html>

<?php endif ?>