<?php
    require_once('operations.php');
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rcipe Upload</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">




    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
    scroll-behavior: smooth;
    list-style: none;
    text-decoration: none;
}

:root{
    --main-color:#a020f0;
    --text-color:#fff;
    --bg-color:#1e1c2a;
    --big-font:3rem;
    --h2-font:2.25rem;
    --p-font:0.9rem;
}

*::selection{
    background: var(--main-color);
    color : #fff;
}
body{
    color: var(--text-color);
    background: var(--bg-color);
}

header{
    position: fixed;
    top: 0;
    right: 0;
    width: 100%;
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 10px;
    background: var(--bg-color);
}
img{
    width: 15%;
    height: 15%;
}
.navbar{
    display: flex;
}

.navbar a{
    color: var(--text-color);
    font-size: 1rem;
    padding: 10px 20px;
    font-weight: 500;
}
.navbar a:hover{
    color: var(--main-color);
    transition: .4s;
}


/*Bot png*/

.navbar img{
  height: 50px;
  width: 50px;
  transition: transform .2s;
}
.navbar img:hover{
  -ms-transform: scale(1.5);
  -webkit-transform: scale(1.5);
  transform: scale(1.2);

}
section{
    padding: 70px 17%;
}

section h1{
    font-size: 35px;
    padding: 40px;
    color: var(--main-color);
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
            <li><a href="#">Home</a></li>
            <li><a href="recipe.php">Recipes</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="C:\xampp\htdocs\frmain\login/logout.php">Logout</a></li>
            
        </ul>
    </header>
    
    
    
    
    <section>
    <center>   <h1>Upload Your Recipe</h1>
    <div>
        <form action="display.php" method="post" enctype="multipart/form-data">
            <!--div>
                <input type="text" name="username" placeholder="username">
            </div>

            <div>
                <input type="text" name="mobile" placeholder="Description">
            </div-->

            <label><h3>Recipe name</h3></label><br>
            <?php inputfields("Recipename","recipename","","text") ?><br>
            <label class="des"><h3>Recipe Description</h3></label><br>
            <?php inputfields("Description","description","","text") ?>
            <label><h3>Select Image:</h3></label><br>
            <?php inputfields("","file","","file") ?>

            <button type="submit"name="submit">Submit</button>

        </form>
    </div>
    
</center>
</section>
 
</body>
</html>