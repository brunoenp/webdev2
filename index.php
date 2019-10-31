<?php





include 'connect.php';

//RETRIEVE CATEGORIES AVAILABLE ON THE WEBSITE

    $query = "SELECT Name FROM categories";
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();

    $counterCategories = count ($categories);
    echo $counterCategories;



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
		<nav id="top-categories">  
			<ul>
				<li><a href="/">Home</a>
				<li><a href="https://html-css-js.com/">HTML</a>
				<li><a href="https://html-css-js.com/css/code/">CSS</a>
				<li><a href="https://htmlcheatsheet.com/js/">JS</a>
			</ul>
		</nav>
	</header>
	<section>
		<strong>Demonstration of a simple page layout using HTML5 tags: header, nav, section, main, article, aside, footer, address.</strong>
	</section>
	<section id="pageContent">
		<main role="main">
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