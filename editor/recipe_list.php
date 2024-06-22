<?php

session_start();

// if(!isset($_SESSION['adminId']))
// {
//     header('Location: editor_login.php');
//     exit();
// }

include '../Database.php';
include '../Recipe.php';

$database = new Database();
$db = $database->getConnection();

$recipe = new Recipe($db);
$result = $recipe->getRecipes();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Recipes</title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding-top: 100px; /* Add padding to top to account for fixed header */
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
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: green;
        }
        a {
            color: green;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
        }
        th {
            background-color: #f4f4f4;
        }
        td img {
            max-width: 100px;
            height: auto;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .no-data {
            text-align: center;
            color: #999;
        }
        .action-links a {
            display: inline-block;
            padding: 5px 10px;
            margin: 0 5px;
            border-radius: 3px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
        }
        .action-links a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header class="header">
        <h1>All Recipes</h1>
        <a href="editor_home.php">Home</a>
    </header>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Recipe Id</th>
                    <th>Recipe Name</th>
                    <th>Picture</th>
                    <th>Editor Name</th>
                    <th>Last Edited</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row['recipeId']?></td>
                            <td><?php echo $row["recipeName"]; ?></td>
                            <td><img src="../imagess/<?= $row['recipePic']; ?>" alt="" width="100"></td>
                            <td><?php echo $row["editorName"]; ?></td>
                            <td><?php echo $row["recipeDate"]; ?></td>
                            <td><a href="recipe_view.php?recipeId=<?php echo $row["recipeId"]; ?>">View</a></td>        
                            <td><a href="recipe_update_form.php?recipeId=<?php echo $row["recipeId"]; ?>">Update</a></td>
                            <td><a href="recipe_delete.php?recipeId=<?php echo $row["recipeId"]; ?>">Delete</a></td> 
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='8'>No recipes found</td></tr>";
                }
                $db->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
