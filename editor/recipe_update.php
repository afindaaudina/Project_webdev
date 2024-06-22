<?php
include '../Database.php';
include '../Recipe.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $database = new Database();
    $db = $database->getConnection();

    $recipe = new Recipe($db);

    $recipeId = $_POST['recipeId'];
    $recipeName = $_POST['recipeName'];
    $oldrecipePic = $_POST['oldrecipePic'];
    $recipePic = $_POST['recipePic'];

    if(empty($recipePic)){
        $recipePic = $oldrecipePic;
    }
    $recipeDesc = $_POST['recipeDesc'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];
    $recipeDate = $_POST['recipeDate'];

    $recipe->updateRecipe($recipeId, $recipeName, $recipePic, $recipeDesc, $ingredients, $instructions, $recipeDate);
  
    $db->close();
}
?>