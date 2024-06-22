<?php
session_start();

// if(!isset($_SESSION['adminId']))
//     {
//         header('Location: editor_login.php');
//         exit();
//     }

include '../Database.php';
include 'Editor.php';

$database = new Database();
$db = $database->getConnection();

$editor = new Editor($db);
$result = $editor->getEditor($_SESSION['editorId']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor Profile</title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding-top: 20px;
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
            z-index: 1000;
        }
        .container {
            max-width: 600px;
            margin: 120px auto 20px;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
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
        .profile-info {
            text-align: left;
            margin-bottom: 20px;
        }
        .profile-info p {
            margin-bottom: 10px;
        }
        .btn-edit {
            background-color: #ff5722;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }
        .btn-edit:hover {
            background-color: #e64a19;
        }
    </style>
</head>
<body>
    <header class="header">
        <h1>Editor Profile</h1>
        <a href="editor_home.php">Home</a>
    </header>
    <div class="container">

    <form action="update_editor.php" method="post" enctype="multipart/form-data">

        <img src="../imagess/<?= $result['editorPic']; ?>" alt="" width="200">
    <div class="profile-info">
        <p>Editor ID: <?php echo $result['editorId'];?></p>
        <p>Name: <?php echo $result['editorName'];?></p>
        <p>Description: <?php echo $result['editorDesc'];?></p>
    </div>
    <!-- Button to edit profile -->
    <a href="update_editor.php" class="btn-edit">Edit Profile</a>
    </div>
    </form> 
</body>
</html>