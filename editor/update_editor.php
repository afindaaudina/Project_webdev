<?php
session_start();

// Ensure the editor is logged in
if (!isset($_SESSION['editorId'])) {
    header('Location: login.php');
    exit();
}

include '../Database.php';
include '../Editor.php';

// Get the editor ID from session
$editorId = $_SESSION['editorId'];

// Create database and editor objects
$database = new Database();
$db = $database->getConnection();
$editor = new Editor($db);

// Get editor details
$editorDetails = $editor->getEditor($editorId);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $editorName = $_POST['editorName'];
    $editorDesc = $_POST['editorDesc'];
    $editorPic = $_FILES['editorPic'];

    if (!empty($editorPic['name'])) {
        // Handle file upload logic here
        $uploadDir = '../imagess/';
        $uploadFile = $uploadDir . basename($editorPic['name']);

        if (move_uploaded_file($editorPic['tmp_name'], $uploadFile)) {
            // Update editor details with new picture path
            $editorPicPath = basename($editorPic['name']);
            $updateSuccess = $editor->updateEditorWithPic($editorId, $editorName, $editorDesc, $editorPicPath);
        } else {
            $message = "Failed to upload file.";
            $updateSuccess = false;
        }
    } else {
        // No file uploaded, update editor details without changing picture
        $updateSuccess = $editor->updateEditor($editorId, $editorName, $editorDesc);
    }

    if ($updateSuccess) {
        echo "Editor details updated successfully.";
    } else {
        echo "Failed to update editor details.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Editor Details</title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding-top: 80px;
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
            height: 75px;
        }
        h1 {
            color: green;
            margin-bottom: 20px;
        }
        a {
            color: green;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }
        label {
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header class="header">
        <h1>Update Editor Details</h1>
        <a href="editor_home.php">Home</a>
    </header>

    <form action="update_editor.php" method="post">
        <label for="editorId">Editor ID</label><br>
        <input type="text" name="editorId" id="editorId" value="<?php echo htmlspecialchars($editorDetails['editorId']); ?>" readonly><br>

        <label for="editorName">Editor Name</label><br>
        <input type="text" name="editorName" id="editorName" value="<?php echo htmlspecialchars($editorDetails['editorName']); ?>" required><br>

        <label for="editorPic">Profile Picture</label><br>
        <input type="file" name="editorPic" id="editorPic"><br><br>

        <label for="editorDesc">Description</label>
        <input type="text" name="editorDesc" id="editorDesc" value="<?php echo htmlspecialchars($editorDetails['editorDesc']); ?>"required>

        <input type="submit" value="Update Details">
    </form>
</body>
</html>