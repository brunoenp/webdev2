<?php


include 'connect.php';

//RETRIEVE CATEGORIES AVAILABLE ON THE WEBSITE

  


?>



<!DOCTYPE html>
<!--<pre> <?php print_r($_POST) ?> </pre>  -->
<!--<pre> <?php print_r($_FILES) ?> </pre>  -->


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ON-DEMAND MISSIONS   -----------------    CREATE USER</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body>
	<header>
		<h1> ON-DEMAND MISSIONS   ||||||||||||||||||'''||CREATE USER||'''||||||||||||||||||</h1>
		<nav id="top-categories">  
			<ul>
				<li><a href="/">Home</a>
			
			</ul>
		</nav>
	</header>
	<section>
		<strong>Provide the following data and your new user will be ready to go!</strong>
	</section>
	<section id="pageContent">
		<main role="main">
	
		<form method="post" id="form_new_page" action="db_add_user.php" enctype="multipart/form-data" >
				<h1>NEW USER FORM</h1>
				<br>

				<p><label for="cUsername">Insert a username:  </label> <input type="text" name="tUsername" id="cUsername" size= "20" maxlength="30" placeholder="" autofocus=""></p>
				<p><label for="cPassword">Insert a password:   </label> <input type="password" name="tPassword" id="cPassword" size= "20" maxlength="30" placeholder="" autofocus=""></p>
	
				<p><label for="cPrivilege"> Select a privilege level: </label>
					<select name="tPrivilege" id="cPrivilege"> </p>
							
	 					<option value= '1'> Administrator </option>
	 					<option value= '2'> Regular </option>
	 					<option value= '3'> Guest </option>


					</select>	

					

					<p><input type= "submit" name="submit" value= "Create Page"> </p>

			

		
	 </p></form>

				



		</form>
		</main>
		<aside>

		</aside>
	</section>
	<footer>
		<p></p>
	</footer>


</body>

</html>