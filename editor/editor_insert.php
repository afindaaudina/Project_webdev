<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '../Database.php';
    include 'Editor.php';

    $database = new Database();
    $db = $database->getConnection();

    $editor = new Editor($db);

    $editor->createEditor($_POST['editorId'], $_POST['editorName'], $_POST['editorPic'], $_POST['editorDesc'], $_POST['editorPw']);

    $db->close();
}
?>