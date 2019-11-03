<?php





include 'connect.php';

//RETRIEVE CONTENTS OF THE SELECTED PAGE

  $id = ($_GET['id']) ;

  $index_array = ($_GET['id']) - 1 ;

  $queryPages = " SELECT * FROM pages WHERE pageID = $id ";
  $statement = $db->prepare($queryPages);
  $statement->execute();
  $pages = $statement->fetchAll();
  $page = $pages[0];

//RETRIEVE IMAGES

  $imageID = $page['imageID'];
  echo $imageID;
  $queryImage = "SELECT * FROM images WHERE imageID = $imageID ";
  $statement = $db->prepare($queryImage);
  $statement->execute();
  $images = $statement->fetchAll();
  $image = $images[0];


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
		<h1> Welcome to <?= $page['Title']?></h1>
		 <br>
		 <p>  <?= $page['description'] ?> </p>
		<br>
		<nav id="top-categories">  
		<ul> 
			<li><a href="http://10.10.128.0:31337/project/webdev2/main.php">Home</a></li>
		</ul>
		</nav>
	</header>
	<section>
		<strong>Welcome to your page!</strong>
	</section>
	<section id="pageContent">
		<main role="main">
			<article>
		<!---	<button class="button button1" type="submit" onClick="window.location='create_page.php';">ADD Page!</button>
			<button class="button button1" type="submit">DEL Page!</button>
			<button class="button button1" type="submit">VIEW Pages!</button>-->

			</article>
			<article>
				<?=$page['content']?>		
	    <!---	<pre> <?= print_r($pages) ?> </pre> --->
	    <!--- <pre> <?= print_r($images) ?> </pre> --->

		<!---	<pre> <?= print_r($$_GET) ?> </pre> --->

			</article>
			
		</main>
		<aside>
			<div><img src="uploads/<?=$image['Name']?>" alt="<?=$image['Name']?>" height="200" width="200"></div>
	
		</aside>
	</section>
	<footer>
		<p></p>
	</footer>


</body>

</html>