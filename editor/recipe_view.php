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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($recipeDetails["recipeName"]); ?></title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding-top: 80px;
            text-align: center;
            color: #333;
        }

        .header{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: #F3E5AB;
            box-shadow: 0 0 10px rgba(0, 0, 0, .4);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 10%;
            box-sizing: border-box;
            z-index: 1000;
        }
        .container {
            width:100%;
            height:auto;
            position:static;
            margin-bottom:20px;
        }

        .container img{
            width:100%;
            height:auto;
        }
        h1 {
            color: green;
            margin-bottom: 20px;
        }

        h2{
            text-align: left;
            margin-left:50px;
        }
        
        a {
            color: green;
            text-decoration: none;
            font-weight: bold;
        }
        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
        .meta-info {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
           
        }
        .recipe-desc {
            text-align: left;
            margin-bottom: 20px;
            margin-left:30px;
            margin-right:30px;
            
        }
        .ingredient-list, .instruction-list {
            text-align: left;
            line-height: 1.6;
            margin-bottom:50px;
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
    <h1><?php echo htmlspecialchars($recipeDetails["recipeName"]); ?></h1>
        <a href="editor_home.php">Home</a> 
    </header>
    <div class="container">
        <img src="../imagess/<?php echo htmlspecialchars($recipeDetails['recipePic']); ?>" alt="" width="150"><br>
        <div class="meta-info">
            <?php echo "Last Edited: " . htmlspecialchars($recipeDetails["recipeDate"]); ?><br>
            <?php echo "Editor: " . htmlspecialchars($recipeDetails["editorName"]); ?>
        </div>

        <div class="recipe-desc">
            <p><?php echo nl2br(htmlspecialchars($recipeDetails["recipeDesc"])); ?></p>
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