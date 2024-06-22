<?php

session_start();

// if(!isset($_SESSION['editorId']))
// {
//     header('Location: login.php');
//     exit();
// }
include '../Database.php';
include 'Editor.php';

$database = new Database();
$db = $database->getConnection();

$editor = new Editor($db);
$result = $editor->getEditors();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Editors</title>
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
        .container{
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
            font-size: 25px;
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
        .no-data {
            text-align: center;
            color: #999;
        }
        </style>
</head>
<body>
    <header class="header">
    <h1>All Editors</h1>
    <a href="editor_home.php">Home</a>
    </header>
    <div class="container">
    <table>
        <thead>
        <tr>
            <th>Editor Id</th>
            <th>Name</th>
            <th>Profile Picture</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row["editorId"]; ?></td>
                    <td><?php echo $row["editorName"];?></td>
                    <td> <img src="../imagess/<?= $row['editorPic']; ?>" alt="" width="150"></td>      
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='3'>No editors found</td></tr>";
        }
        $db->close();
        ?>
        </tbody>
    </table>
    </div>
</body>
</html>