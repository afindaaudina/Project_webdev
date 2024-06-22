<?php
session_start();

//if(!isset($_SESSION['editorId']))
//{
//header('Location: editor_login.php');
//exit();

//}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Recipe </title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding-top: 100px;
            text-align: center;
            color: #333;
        }
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: #F3E5AB;
            box-shadow: 0 0 10px rgba(0, 0, 0, .4);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 10%;
            box-sizing: border-box;
            z-index: 1000;
            height: 80px;
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
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom:10px;
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
            resize: vertical;
        }
        input[type="reset"],
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
        }
        input[type="reset"]:hover,
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header class="header">
    <h1>Add New Recipe</h1>
    <a href="editor_home.php">Home</a>
    </header>

    <form action="recipe_add.php" method="post" enctype="multipart/form-data">

            <label for="recipeId">Recipe ID</label><br>
            <input type="text" name="recipeId" id="recipeId" required><br>

            <label for="recipeName">Recipe Name</label><br>
            <input type="text" name="recipeName" id="recipeName" required><br>

            <label for="recipePic">Picture</label><br>
            <input type="file" name="recipePic" id="recipePic" required><br>

            <label for="recipeDesc">Description</label><br>
            <textarea name="recipeDesc" id="recipeDesc" rows="5" cols="40" ></textarea><br>

            <label for="ingredients">Ingredients (one per line)</label><br>
            <textarea name="ingredients" id="ingredients" rows="15" cols="40" ></textarea><br>
        
            <label for="instructions">Instructions (one per line)</label><br>
            <textarea name="instructions" id="instructions" rows="30" cols="40" required></textarea><br><br>

            <input type="submit" name="submit" value="Add Recipe">
            <input type="reset" name="reset" value="Reset">          
    </form>
</body>
</html>