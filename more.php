<?php
include 'Database.php';
include 'Recipe.php';

// Initialize database connection
$database = new Database();
$db = $database->getConnection();

// Initialize Recipe object
$recipe = new Recipe($db);
$result = $recipe->getRecipes();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="more.css">
        <title>More recipes</title>
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

        <div class="main">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="card">
                        <div class="image">
                            <img src="imagess/<?php echo htmlspecialchars($row['recipePic']); ?>">
                        </div>
                        <div class="title">
                            <h1><?php echo htmlspecialchars($row['recipeName']); ?></h1>
                        </div>
                        <div class="desc">
                            <p><?php echo htmlspecialchars($row['recipeDesc']); ?></p>
                            <a href="recipe_view.php?recipeId=<?php echo $row['recipeId']; ?>">
                                <button>View Recipe</button>
                            </a>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No recipes found</p>";
            }
            ?>
        </div>

        <footer>
            <div class="inner-item"></div>
            <hr>
            <p>Copyright @ 2024 By BIT21503 Section 1 Group 8 | All Right Reserved</p>
        </footer>
    </body>
</html>