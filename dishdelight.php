<?php 
include 'Database.php';
include 'Recipe.php';
include 'editor/Editor.php';

$database = new Database();
$db = $database->getConnection();

$recipe = new Recipe($db);


// Fetch specific recipe
$nasiLemakRecipe = $recipe->getRecipeByName('Nasi Lemak');
$sambalUdangRecipe = $recipe->getRecipeByName('Sambal Udang');
$charKueyTeowRecipe = $recipe->getRecipeByName('Char Kuey Teow');

$editor = new Editor($db);
$editors = $editor->getEditors();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dish Delight</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/imagess/icon.png">
</head>
<body>
    
    <header class="header">
        <a href="#" class="Logo">Dish<span>Delight</span></a>
        <nav class="navbar">
            <a href="#Home" class="active">Home</a>
            <a href="more.php">Recipes</a>
            <a href="dishdelight.php">About</a>
        </nav>
    </header>
    <section class="home-section">
        <div class="text-content">
            <h2>Welcome to Dish Delight</h2>
            <p>Explore the world of delicious recipes and culinary delights, where every dish tells a story and every meal is a celebration. Whether you're a seasoned chef or a home cook looking to expand your repertoire, we have something for everyone. Dive into our extensive collection of recipes, discover new flavors, and transform your kitchen into a gourmet paradise. Join us on this culinary journey and let your taste buds embark on an adventure they will never forget. Happy cooking!</p>
            <button class="btn" onclick="window.location.href='more.php'">View All Recipes</button>
        </div>
        <div class="image-section">
            <img src="imagess/newButtermilk.png" alt="Home Banner Image">
            <div class="shadow"></div>
        </div>
    </section>
    <section class="Recipes-Section" id="Recipes">
        <h2 class="heading">Popular Recipes</h2>
        <div class="recipesGallery">
            <div class="food-image">
            <img src="imagess/sambalUdang.png" alt="Sambal Udang" draggable="false">
                <div class="inner-text">
                    <h2>Sambal Udang</h2>
                    <p>A fiery Malaysian prawn dish cooked in a spicy chili paste, delivering bold flavors and irresistible heat.</p>
                    <div class="recipe-section">
                        <?php if ($sambalUdangRecipe): ?>
                            <a href="recipe_view.php?recipeId=<?php echo $sambalUdangRecipe['recipeId']; ?>"><span>Visit Recipe</span></a>
                        <?php else: ?>
                            <span>Recipe not found</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="food-image">
            <img src="imagess/ckt2-removebg-preview.png" alt="Char Kuey Teow" draggable="false">
                <div class="inner-text">
                    <h2>Char Kuey Teow</h2>
                    <p>A classic Malaysian noodle stir-fry with prawns, bean sprouts, and flavorful spices.</p>
                    <div class="recipe-section">
                    <?php if ($charKueyTeowRecipe): ?>
                            <a href="recipe_view.php?recipeId=<?php echo $charKueyTeowRecipe['recipeId']; ?>"><span>Visit Recipe</span></a>
                        <?php else: ?>
                            <span>Recipe not found</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="food-image">
                <img src="imagess/nasilemak-removebg-preview.png" alt="Nasi Lemak" draggable="false">
                <div class="inner-text">
                    <h2>Nasi Lemak</h2>
                    <p>A classic Malaysian dish of coconut rice served with flavorful sambal, anchovies, peanuts, and egg, offering a delicious blend of tastes.</p>
                    <div class="recipe-section">
                        <?php if ($nasiLemakRecipe): ?>
                            <a href="recipe_view.php?recipeId=<?php echo $nasiLemakRecipe['recipeId']; ?>"><span>Visit Recipe</span></a>
                        <?php else: ?>
                            <span>Recipe not found</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-section" id="About">
    <h2 class="heading"><span><div class="edit-button">Our Editors</span></div></h2>
    <div class="editor-details">
        <?php
        if ($editors && $editors->num_rows > 0) {
            while ($row = $editors->fetch_assoc()) {
                ?>
                <div class="editor-image">
                    <div class="image-1">
                        <img src="imagess/<?php echo $row['editorPic']; ?>" alt="<?php echo $row['editorName']; ?>">
                        <div class="text-content-1">
                            <div class="effect">
                                <span><?php echo $row['editorName']; ?></span>
                                <p class="text-p"><?php echo $row['editorDesc']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <p>No editors found</p>
            <?php   }
        ?>
    </div>
</section>    
<div class="section facility-section">
            <h2 class="heading">About<span> Us</span></h2> 
            <div class="icon-section">
                <div class="icon-text">
                    <i class='bx bxs-info-circle' ></i>
                    <p>At DishDelight, we are passionate about cooking and sharing delicious recipes with food lovers around the world. Whether you're a seasoned chef or just starting your culinary journey, we're here to inspire and guide you through the wonderful world of cooking.</p>
                </div>
                <div class="icon-text">
                    <i class='bx bxs-quote-alt-left' ></i>
                    <p>Our team is driven by a deep passion for culinary excellence. We live and breathe food, and we're dedicated to sharing that passion with our community. From crafting delectable recipes to offering expert cooking advice, our love for all things food shines through in everything we do.</p>
                </div>
                <div class="icon-text">
                    <i class='bx bxs-check-circle' ></i>
                    <p>Our goal is to make cooking easy, fun, and fulfilling for all. We believe in the power of good food to unite people and make lasting memories. That's why we offer a wide range of recipes, tips, and tools to help you discover your cooking potential and craft delicious dishes at home.</p>
                </div>
            </div>
        </div>
        <footer>
            <div class="inner-item">
                <a href="#" class="logo-1">Dish<span>Delight</span></a>
                <div class="textbar">
                    <a href="#">Home</a>
                    <a href="#">Recipes</a>
                    <a href="#">About</a>
                </div>
                <div class="footer-icon">
                    <a href="https://www.instagram.com/dishdelight_s1_g8?igsh=MW93aGFwcmlleTdxag==" target="_blank"><i class='bx bxl-instagram-alt' ></i></a>
                </div>
            </div>
            <hr>
            <p>Copyright @ 2024 By BIT21503 Section 1 Group 8 | All Right Reserved</p>
        </footer>
        
        <script type="module" src="style.js"></script> 
    </body>
</html>