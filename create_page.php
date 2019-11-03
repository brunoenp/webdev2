<?php


include 'connect.php';
session_start();


//RETRIEVE CATEGORIES AVAILABLE ON THE WEBSITE

    $query = "SELECT CategoryID,Name FROM categories";
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();

    $counterCategories = count ($categories);
    echo $counterCategories;



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
<pre> <?php print_r($_POST) ?> </pre> 
<pre> <?php print_r($_FILES) ?> </pre> 


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ON-DEMAND MISSIONS   -----------------    CREATE PAGE</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body>
	<header>
		<h1> ON-DEMAND MISSIONS   ||||||||||||||||||'''||CREATE PAGE||'''||||||||||||||||||</h1>
		<nav id="top-categories">  
			<ul>
				<li><a href="http://10.10.128.0:31337/project/webdev2/main.php">Home</a>
			
			</ul>
		</nav>
	</header>
	<section>
		<strong>Provide the following data and your new page will be ready to go!</strong>
	</section>
	<section id="pageContent">
		<main role="main">
	
		<form method="post" id="form_new_page" action="db_add_page.php" enctype="multipart/form-data" >
				<h1>CREATE NEW PAGE</h1>
				<br>

				<p><label for="cName">Insert a name:  </label> <input type="text" name="tName" id="cName" size= "40" maxlength="30" placeholder="" autofocus=""></p>
	
				<p><label for="cCategory"> Select a category: </label>
					<select name="tCategory" id="cCategory"> </p>
					
					<?php for ($x = $counterCategories - 1  ;$x >= 0 ; $x--) :?>
	 					<option value=<?=$categories[$x]['CategoryID']?>> <?= $categories[$x]['Name'] ?> </option>
					<?php endfor ?>							
					</select>	

					<p><label for="cDescription">Description: :</label>
					<textarea name="tDescription" id="cDescription" cols="45" rows="1" placeholder="Please insert a description to your page."></textarea></p>


					<p><label for="cContent">Content : :</label>
					<textarea name="tContent" id="cContent" cols="45" rows="5" placeholder="What is your page about...."></textarea></p>
	       			<label for="image">Image Filename:</label>
	       			<input type="file" name="image" id="image">
					<p><input type= "submit" name="submit" value= "Create Page"> </p>

    				</form> </p>

		

				<!-- Test Upload for Imageness -->

				<?php  if (isset($_FILES['image']) && $_FILES['image']['error'] > 0):?>
					<p> An error have ocurred while uploading your file. Error Number: <?= $_FILES['image']['error']?> </p>
				<?php endif ?>

				<?php 
					function file_upload_path ($original_filename, $upload_subfolder_name = 'uploads') {

						$current_folder = dirname(__FILE__);
						$path_segments = [$current_folder, $upload_subfolder_name, basename($original_filename)];
						return join (DIRECTORY_SEPARATOR, $path_segments);
					}


					function  file_is_an_image ($temporary_path, $new_path){

						$allowed_mime_types 		= ['image/gif', 'image/jpeg', 'image/png'];
						$allowed_file_extensions	= ['gif', 'jpg', 'jpeg', 'png'];

						$actual_file_extension 		= pathinfo($new_path, PATHINFO_EXTENSION);
						$actual_mime_type 			= getimagesize($temporary_path)['mime'];


						$file_extension_is_valid	= in_array ($actual_file_extension, $allowed_file_extensions);

						$mime_type_is_valid 		= in_array ($actual_mime_type, $allowed_mime_types);

						return $file_extension_is_valid && $mime_type_is_valid;
					}


					$image_upload_detected = isset($_FILES['image']) && ($_FILES['image']['error'] ===0);

					if ($image_upload_detected) {
						$image_filename			= $_FILES['image']['name'];
						$temporary_image_path	= $_FILES['image']['tmp_name'];
						$new_image_path			= file_upload_path($image_filename);

						if (file_is_an_image($temporary_image_path,$new_image_path)){
							move_uploaded_file($temporary_image_path, $new_image_path);

						}

					}

				?>



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

<?php endif ?>