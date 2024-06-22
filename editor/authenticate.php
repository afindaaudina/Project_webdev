<?php
session_start();
include '../Database.php';
include 'Editor.php';

if(isset($_POST['submit'])&&($_SERVER['REQUEST_METHOD'] == 'POST')){

    $database = new Database();
    $db = $database->getConnection();

    $editorId = $db->real_escape_string($_POST['editorId']);
    $editorPw = $db->real_escape_string($_POST['editorPw']);

    if(!empty($editorId) && !empty($editorPw)){
        $editor = new Editor($db);
        $editorDetails = $editor->getEditor($editorId);

        if($editorDetails && password_verify($editorPw, $editorDetails['editorPw'])){
            $_SESSION['editorId'] = $editorDetails['editorId'];
            header('Location:editor_home.php');
            exit(); }
        else{
                echo("Failed login. Please try again");
            }   }
        else{
            echo("Please fill in all required fields.");
        }   }
?>