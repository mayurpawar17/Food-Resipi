<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Upload Recipe</title>
	<link rel="stylesheet" type="text/css" href="uploadstyle.css">
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
	section.upload form input{
		padding: 12px 20px;
  margin: 8px 0;
	}



</style>



</head>
<body>
    <header>
        <img src="frl.png" class="logopng">
        <a href="#" class="logoname"></a>
        <div class="menu" id="menuicon"></div>
        <ul class="navbar">
            
            <li><a href="bot.php"><img src="boticon.png"></a></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="recipe.php">Recipes</a></li>
            <li><a href="about.php">About</a></li>
			<li><a href="login/logout.php">Logout</a></li>
        </ul>
    </header>
    <section class="upload">
    	<center>
    	<h1>Upload Your Recipe</h1><hr>

    	<form action="">
    		<label><h2>Recipe Name</h2></label><br>
    		<input type="text" id="fname" name="fname" placeholder="Recipe" required><br><br>
  			<label><h2>Select Recipe Image:</h2></label>
  			 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="file" id="myfile" name="myfile" required><br><br>
  			<label><h2>Recipe Description</h2></label><br>
  			<textarea wrap="off" cols="60" rows="4" required></textarea><br>
  			<button type="submit">Submit</button>
		</form>

		</center>
    </section>

</body>
</html>