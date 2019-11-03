<?php

session_start();
echo $_SESSION['auth_status'] ;



include 'connect.php';

//RETRIEVE CATEGORIES AVAILABLE ON THE WEBSITE
    if ($_GET['tSort'] === 'Title') {
	    $queryPages = "SELECT * FROM pages order by Title ASC";
	    $statement = $db->prepare($queryPages);
	    $statement->execute();
	    $pages = $statement->fetchAll();

	    $counterPages = count ($pages);
	    // echo $counterPages;
    }
      if ($_GET['tSort'] === 'Category') {
	    $queryPages = "SELECT * FROM pages order by CategoryID ASC";
	    $statement = $db->prepare($queryPages);
	    $statement->execute();
	    $pages = $statement->fetchAll();

	    $counterPages = count ($pages);
	    // echo $counterPages;
    }
      if ($_GET['tSort'] === 'Creator') {
	    $queryPages = "SELECT * FROM pages order by userID ASC";
	    $statement = $db->prepare($queryPages);
	    $statement->execute();
	    $pages = $statement->fetchAll();

	    $counterPages = count ($pages);
	    // echo $counterPages;
    }

    $queryCategories = "SELECT * FROM categories";
    $statement = $db->prepare($queryCategories);
    $statement->execute();
    $categories = $statement->fetchAll();

   // $counterCategories = count ($categories);
   // echo $counterCategories;





    $userQuery = "SELECT userID FROM users";
    $statement = $db->prepare($queryCategories);
    $statement->execute();
    $categories = $statement->fetchAll();

   // $counterCategories = count ($categories);
   // echo $counterCategories;


function returnAuthor ($providedUserID){

	define ('DB_DSN2', 'mysql:host=localhost;dbname=project;charset=utf8');
	define ('DB_USER2', 'project');
	define ('DB_PASS2', 'project');

//Create a PDO object called $db.
	try{
		$db2 = new PDO(DB_DSN2, DB_USER2, DB_PASS2);
	} catch (PDOException $e) {
		print "Error: " . $e->getMessage();
		die();
	}


	$userQuery = "SELECT username FROM users WHERE userID = '$providedUserID'";
    $statement = $db2->prepare($userQuery);
    $statement->execute();
    $users = $statement->fetchAll();
    return $users[0]['username'];


}
$test = '1';
	echo returnAuthor ($test);




?>



<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ON-DEMAND MISSIONS BOARD</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <pre> <?= print_r($_GET) ?> </pre>
</head>

<body>
	<header>
		<h1> ON-DEMAND MISSIONS</h1>
		<br>
		<br>
		<nav id="top-categories"> 
		<ul> 
			<li><a href="http://10.10.128.0:31337/project/webdev2/">Home</a>
			<li><a href="http://10.10.128.0:31337/project/webdev2/management.php">Admin</a>
		</ul>
			<h3> Pages</h3>
			<ul>
				<?php for ($x = $counterPages - 1  ;$x >= 0 ; $x--) :?>
				<li><a href="load_page.php?id=<?=$pages[$x]['pageID']?>"><?= $pages[$x]['Title'] ?></a>
				<?php endfor ?>
			</ul>
		</nav>
	</header>
	<section>
		<br>
		<br>
		<strong>There are the available pages!</strong>
		<br>
		<br>
		<strong>Pages sorted by : <?= $_GET['tSort'] ?></strong>

	</section>
	<section id="pageContent">
		<main role="main">
			<article>
			<button class="button button1" type="submit" onClick="window.location='view_pages.php';"  >VIEW Pages!</button>
			<br>
			<br>
			<form action="http://10.10.128.0:31337/project/webdev2/sorted_pages.php" method="get" id="form1">
			<p><label for="cSort"> Sort criteria: </label>
						<select name="tSort" id="cSort"> </p>
						<option value= 'Title'> Title </option>
	 					<option value= 'Category'> Category </option>
	 					<option value= 'Creator'> Creator </option>
					</select>	
					<button type="submit" action="http://10.10.128.0:31337/project/webdev2/sorted_pages.php" value="Submit" method="post"> Sort Pages</button>

			<br>
			<br>
			</form>


			<?php for ($x = $counterPages - 1  ;$x >= 0 ; $x--) :?>
				<article>
					<?php 
					$authorID = $pages[$x]['userID'];
					$userQuery = "SELECT username FROM users WHERE userID = '$authorID'";
    				$statement = $db->prepare($userQuery);
    				$statement->execute();
    				$authors = $statement->fetchAll();
    				$author = $authors[0]['username'];

    				$categoryID = $pages[$x]['categoryID'];
					$categoryQuery = "SELECT Name FROM categories WHERE categoryID = '$categoryID'";
    				$statement = $db->prepare($categoryQuery);
    				$statement->execute();
    				$categories = $statement->fetchAll();
    				$category = $categories[0]['Name'];
    				?>
					<h4> <a  href="http://10.10.128.0:31337/project/webdev2/load_page.php?id=<?=$pages[$x]['pageID']?>" >  Page: <?=$pages[$x]['pageID']?> -  <?= $pages[$x]['Title'] ?></a> </h4>
					<br>
					<p> Created by : <?= $author ?> </p>
					<br>
					<p> Category : <?= $category ?> </p>
					</article>
			<?php endfor ?>			

			
		</main>
		<aside>

		</aside>
	</section>
	<footer>
		<p></p>
	</footer>


</body>

</html>