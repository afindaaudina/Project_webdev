<?php

session_start();

// if(!isset($_SESSION['editorId']))
//     {
//         header('Location: login.php');
//         exit();
//     }

include '../Database.php';
include 'Editor.php';
include '../Recipe.php';

$database = new Database();
$db = $database->getConnection();

$editor = new Editor($db);
$result = $editor->countEditors();
//fetch all editors
$resultEditors = $editor -> getEditors();

$recipe = new Recipe($db);
$result2 = $recipe->countRecipes();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor Panel</title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding-top: 80px; /* Space for the fixed header */
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
            padding: 20px 10%;
            box-sizing: border-box;
        }
        .header h1, h2{
            margin: 0;
            font-size: 24px;
            color: green;
        }
        h3{
            font-size: 24px;
        }
        a {
            display: block;
            margin: 10px 0;
            color: green;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        .stats {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            width: 300px;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            margin: 20px 0;
        }
        .stats p {
            margin: 5px 0;
        }
        .stats a {
            color: green;
            text-decoration: none;
        }
        .stats a:hover {
            text-decoration: underline;
        }
        .btn-logout {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        .btn-add-recipe {
            background-color: #ff5722;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            margin: 20px 0;
        }
        table{
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
    <script>
        function logout() {
            if (confirm('Are you sure you want to logout?')) {
                window.location.href = 'logout.php';
            }
        }
    </script>
</head>
<body>
    <header class="header">
        <h1>Editor Panel</h1>
        <input type="button" value="Logout" class="btn-logout" onclick="logout()"/>
    </header>

    <h1>Hello, fellow editor!</h1>
    <h3>Check out your<a href="editor_profile.php">profile</a></h3>
    <div class="container">
        <?php 
            $totalEditor = $result->fetch_assoc();
            $totalRecipe = $result2->fetch_assoc();
        ?>
        <div class="stats">
        <p>Total Registered Editors: <a href="editor_list.php"><?php echo $totalEditor['total']; ?></a></p>
        </div>
        <div class="stats">
        <p>Total Registered Recipes: <a href="recipe_list.php"><?php echo $totalRecipe['total']; ?></a></p>
    </div>
    </div>
    
    <a href="recipe_add_form.php" class="btn-add-recipe">Add Recipe</a>

    <div class="container">
        <div class="stats" style="width: 100%;">
            <h2>All Editors</h2>
            <table>
                <tr>
                    <th>Editor ID</th>
                    <th>Name</th>
                    <th>Profile Picture</th>
                </tr>
                <?php
                if ($resultEditors->num_rows > 0) {
                    while ($row = $resultEditors->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row["editorId"]; ?></td>
                            <td><?php echo $row["editorName"]; ?></td>
                            <td><img src="../imagess/<?php echo $row['editorPic']; ?>" alt="" width="150"></td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='3'>No editors found</td></tr>";
                }
                ?>
            </table>
            <a href="editor_register.php">Add Editor</a>
        </div>
    </div>
</body>
</html>