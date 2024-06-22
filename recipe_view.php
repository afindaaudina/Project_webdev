<?php
session_start();

    // if(!isset($_SESSION['editorId']))
    // {
    //     header('Location: login.php');
    //     exit();
    // }
include 'Database.php';
include 'Recipe.php';

$recipeId = $_GET['recipeId'];
$database = new Database();

$db = $database->getConnection();

$recipe = new Recipe($db);
$recipeDetails = $recipe->getRecipe($recipeId);

$db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $recipeDetails["recipeName"]?></title>
    <style>
    *{
        margin:0px;
        padding:0;
        box-sizing:border-box;
        font-family:Arial, sans-serif;
    }

    .header{
        position: fixed;
        top: 0;
        left: 0;
        padding: 10px;
        display: flex;
        width: 100%;
        justify-content: center;
        align-items: center;
        background: #F3E5AB;
        box-shadow: 0 0 10px rgba(0,0,0,.4);
        z-index: 100;
    }
    .header .Logo{
        color: #222;
        font-size: 32px;
        font-weight: 600;
        text-decoration: none;
    }
    .header a span{
        color: green;
    }
    .navbar a{
    color: green;
    text-decoration: none;
    margin-left: 35px;
    font-size: 18px;
    font-weight: 500;
    padding: 5px 10px;
    border-radius: 5px;
    justify-content: center;
    align-items: center;
    }
    body{
    width:100%;
    background: rgb(17, 95, 17);
    line-height: 2;
    min-height:100vh; 
    }
    .container{
    width:90%;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content:space-between;
    }
    nav ul li{
    list-style:none;
    display: inline;
    margin-right: 20px;
    margin-left:20px;
    padding:8em;
    }
    .logo{
    font-size:24px;
    }
    .image-section{
    width:100%;
    height:auto;
    position:relative;
    }
    .image-section img{
    width:100%;
    height:auto;
    }
    .image-section .shadow {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.3);
    }
    h1, h2, h4 {
    padding-left:3em;
    padding-right:3em;
    color: green;  
    padding-top:30px;  
    }   
    h3{
    padding-right:3em;
    color:rgb(45, 167, 45);
    }
    ul, ol {
    margin-left:30px;
    margin-right:30px;
    font-family:'Courier New';
    color: black;
    padding:2em;
    }
    .image-section .text-overlay{
    margin-top:75px;
    position: absolute;
    bottom: 20px;
    left: 20px;
    color: white;
    font-size: 4em;
    font-weight: bold;
    transition:opacity;
    }
    .content-container {
    background-color: white;
    margin-left: 6em ;
    margin-right: 6em ;
    margin-top:0;
    padding: 20px; 
    }
    footer{
    height: 20vh;
    background: white;
    padding: 20px 60px;
    }
    .inner-item{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    }
    .inner-item h2{
    color: green;
    }
    .inner-item .textbar a{
    text-decoration: none;
    color: green;
    margin-left: 35px;
    }
    footer p{
    font-size: 16px;
    color: green;
    margin: 20px auto;
    font-weight: 500;
    text-align: center;
    }
    </style>
</head>
<body>
    <header class="header">
        <a href="#" class="Logo">Dish<span>Delight</span></a>
            <nav class="navbar">
                <a href="dishdelight.php" class="active">Home</a>
                <a href="more.php">Recipes</a>
                <a href="dishdelight.php">About</a>
            </nav>
        </header>

        <div class="image-section">
            <<img src="imagess/<?php echo htmlspecialchars($recipeDetails['recipePic']); ?>" alt="" width="150"><br>
            <div class="shadow"></div>
            <div class="text-overlay">
            <?php echo $recipeDetails["recipeName"]?>
            </div>
        </div>

        <div class="content-container">
        <div class="meta-info">
            <?php echo "Last Edited: " . htmlspecialchars($recipeDetails["recipeDate"]); ?><br>
            <?php echo "Editor: " . htmlspecialchars($recipeDetails["editorName"]); ?>
        </div>

        <h2>Ingredients</h2>
        <div class="ingredient-list">
            <ul>
                <?php
                $ingredients = explode("\n", $recipeDetails["ingredients"]);
                foreach ($ingredients as $ingredient) {
                    echo "<li>" . htmlspecialchars($ingredient) . "</li>";
                }
                ?>
            </ul>
        </div>

        <h2>Instructions</h2>
        <div class="instruction-list">
            <ol>
                <?php
                $instructions = explode("\n", $recipeDetails["instructions"]);
                foreach ($instructions as $instruction) {
                    echo "<li>" . htmlspecialchars($instruction) . "</li>";
                }
                ?>
            </ol>
        </div>
        <footer>
        <div class="inner-item">
        </div>
        <hr>
        <p>Copyright @ 2024 By BIT21503 Section 1 Group 8 | All Right Reserved</p>
    </footer>
    </div>   
    </body>
    </html>