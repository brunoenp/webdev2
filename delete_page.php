<?php


include 'connect.php';

//RETRIEVE CATEGORIES AVAILABLE ON THE WEBSITE


    $queryPages = "SELECT * FROM pages";
    $statement = $db->prepare($queryPages);
    $statement->execute();
    $pages = $statement->fetchAll();
    $page = $pages[0];

    $counterPages = count ($pages);
    echo  $counterPages;

?>






<!DOCTYPE html>
<pre> <?php print_r($_POST) ?> </pre> 
<pre> <?php print_r($_FILES) ?> </pre> 
<!--pre> <?php print_r($pages) ?> </pre> -->



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ON-DEMAND MISSIONS   -----------------    DELETE PAGE</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body>
	<header>
		<h1> ON-DEMAND MISSIONS   ||||||||||||||||||'''||DELETE PAGE||'''||||||||||||||||||</h1>
		<nav id="top-categories">  
			<ul>
				<li><a href="http://10.10.128.0:31337/project/webdev2/main.php">Home</a>
			
			</ul>
		</nav>
	</header>
	<section>
		<strong>Select which page you want to delete:</strong>
	</section>
	<section id="pageContent">
		<main role="main">
	
		<form method="post" id="form_new_page" action="db_del_page.php" enctype="multipart/form-data" >

				
				<p><label for="cID"> Select a page to delete: </label>
					<select name="tID" id="cID"> </p>

					<?php for ($x = $counterPages - 1  ;$x >= 0 ; $x--) :?>
	 					<option value= <?=$pages[$x]['pageID']?>> <?= $pages[$x]['Title'] ?> </option>
					<?php endfor ?>							
					</select>	
					<br>
					<br>
					<p><input type= "submit" name="submit" value= "Delete Page"> </p>

    				</form> </p>
		
		</main>
		<aside>

		</aside>
	</section>
	<footer>
		<p></p>
	</footer>


</body>

</html>