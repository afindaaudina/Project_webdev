<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '../Database.php';
    include '../Recipe.php';

    $database = new Database();
    $db = $database->getConnection();

    $recipe = new Recipe($db);

    $recipe->createRecipe($_POST['recipeId'], $_SESSION['editorId'], $_POST['recipeName'], $_POST['recipePic'], $_POST['recipeDesc'], $_POST['ingredients'], $_POST['instructions']);

    $db->close();
}
?>