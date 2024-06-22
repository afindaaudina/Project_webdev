<?php

    session_start();

    // if(!isset($_SESSION['editorId']))
    // {
    //     header('Location: login.php');
    //     exit();
    // }
    include '../Database.php';
    include '../Recipe.php';

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        
        $database = new Database();
        $db = $database->getConnection();

        $recipeId = $_GET['recipeId'];

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
        body {
            font-family: "Poppins", sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding-top: 20px;
            text-align: center;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: green;
            margin-bottom: 20px;
        }
        a {
            color: green;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        form {
            text-align: left;
        }
        input[type="text"],
        input[type="file"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }
        textarea {
            height: 150px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    </head>

    <body>
        <div class="container">
        <h1><?php echo $recipeDetails["recipeName"]?></h1>
        <a href="editor_home.php">Home</a>

        <form action="recipe_update.php" method="post">

            <br><img src="../imagess/<?= $recipeDetails['recipePic']; ?>" alt="" width="150"><br><br>

            <input type="hidden" name="recipeId" id="recipeId" value="<?php echo $recipeDetails['recipeId']; ?>">
            
            <input type="hidden" name="oldrecipePic" value="<?= $recipeDetails['recipePic']; ?>">
            
            <?php echo "Last Edited: ".$recipeDetails["recipeDate"]; ?><br>

            <input type="hidden" name="recipeDate" id="recipeDate" value="<?php echo date("Y-m-d");?>">

            <p><?php echo "Editor: ".$recipeDetails["editorName"]; ?><br></p>
          
            <h5>Recipe Name</h5>
            <input type="text" name="recipeName" id="recipeName" value="<?php echo $recipeDetails["recipeName"]; ?>"> 

            <h5>Update Picture</h5>
            <input type="file" name="recipePic" id="recipePic">

            <h5>Recipe Description</h5>
            <textarea name="recipeDesc" id="recipeDesc"><?php echo $recipeDetails["recipeDesc"]; ?></textarea><br>
            
            <h5>Ingredients</h5>
            <textarea name="ingredients" id="ingredients"><?php echo $recipeDetails["ingredients"]; ?></textarea><br>

            <h5>Instructions</h5>
            <textarea name="instructions" id="instructions"><?php echo $recipeDetails["instructions"]; ?></textarea><br><br>

            <input type="submit" value="Update">
        </form>  
    </div> 
</body>
</html>

<?php
    }
?>