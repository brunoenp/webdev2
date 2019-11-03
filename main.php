<?php

session_start();
echo $_SESSION['auth_status'] ;
echo $_SESSION['user'] ;
echo $_SESSION['privilege'] ;


include 'connect.php';

//RETRIEVE CATEGORIES AVAILABLE ON THE WEBSITE

    $queryCategories = "SELECT * FROM categories";
    $statement = $db->prepare($queryCategories);
    $statement->execute();
    $categories = $statement->fetchAll();

    $counterCategories = count ($categories);
    echo $counterCategories;

    $queryPages = "SELECT * FROM pages";
    $statement = $db->prepare($queryPages);
    $statement->execute();
    $pages = $statement->fetchAll();

    $counterPages = count ($pages);
    //echo $counterPages;



?>



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
		<h1> ON-DEMAND MISSIONS</h1>
		<br>
		<h2> You have created <?= $counterCategories ?> entertainment additional page! Select you option below! </h2>
		<br>
		<nav id="top-categories"> 
		<ul> 
			<li><a href="http://10.10.128.0:31337/project/webdev2/main.php">Home</a>
			<?php if ($_SESSION['privilege'] === '1' ) :?>
			<li><a href="http://10.10.128.0:31337/project/webdev2/management.php">Admin</a>
			<?php endif ?>
		</ul>
			<h2> Categories </h2>
			<ul>
			<?php for ($x = $counterCategories - 1  ;$x >= 0 ; $x--) :?>
				<li><a href="http://localhost:31337/project/webdev2/load_page.php/?<?=$pages[$x]['pageID']?>"><?= $categories[$x]['Name'] ?></a>
				<?php endfor ?>
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
		<strong>Welcome! Select the option on the menu below or navigate though the above categories!</strong>
	</section>
	<section id="pageContent">
		<main role="main">
			<article>
				<?php if ($_SESSION['privilege'] === '1' ) :?>
					<button class="button button1" type="submit" onClick="window.location='create_page.php';">ADD Page!</button>
					<button class="button button1" type="submit" onClick="window.location='delete_page.php';">DEL Page!</button>
					<button class="button button1" type="submit" onClick="window.location='view_pages.php';"  >VIEW Pages!</button>

				<?php endif ?>
				



			</article>
			<article>
				<h2>Stet facilis ius te</h2>
				<p>Lorem ipsum dolor sit amet, nonumes voluptatum mel ea, cu case ceteros cum. Novum commodo malorum vix ut. Dolores consequuntur in ius, sale electram dissentiunt quo te. Cu duo omnes invidunt, eos eu mucius fabellas. Stet facilis ius te, quando voluptatibus eos in. Ad vix mundi alterum, integre urbanitas intellegam vix in.</p>
			</article>
			
		</main>
		<aside>
			<div>Sidebar 1</div>
			<div>Sidebar 2</div>
			<div>Sidebar 3</div>
		</aside>
	</section>
	<footer>
		<p></p>
	</footer>


</body>

</html>