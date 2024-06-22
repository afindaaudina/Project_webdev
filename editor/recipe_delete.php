<?php

session_start();
include '../Database.php';
include '../Recipe.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $recipeId = $_GET['recipeId'];

    $database = new Database();
    $db = $database->getConnection();

    $recipe = new Recipe($db);
    $recipe->deleteRecipe($recipeId);

    $db->close();
}