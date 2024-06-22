<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
       *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
        }

        body {
            background-color: #f4f4f4;
            padding-top: 80px; /* Space for the fixed header */
            text-align: center;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
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
        .header a {
            color: green;
            text-decoration: none;
            font-weight: bold;
        }
        .wrapper {
            width: 420px;
            background: green;
            color: #fff;
            border-radius: 10px;
            padding: 30px 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
        }

        .wrapper .input-box {
            position: relative;
            width: 100%;
            height: 50px;
            margin: 30px 0;
        }

        .input-box input {
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rgba(255, 255, 255, .2);
            border-radius: 40px;
            font-size: 16px;
            color: #fff;
            padding: 20px 45px 20px 20px;
        }

        .input-box input::placeholder {
            color: #fff;
        }

        .wrapper label {
            display: block;
            text-align: left;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .wrapper input[type="file"],
        .wrapper input[type="text"],
        .wrapper input[type="password"] {
            margin-bottom: 20px;
        }

        .wrapper .btn {
            width: 100%;
            height: 45px;
            background: #fff;
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            color: #333;
            font-weight: 600;
            margin-top: 20px;
        }

        .wrapper .reset-link {
            font-size: 14.5px;
            text-align: center;
            margin: 20px 0 15px;
        }

        .reset-link a {
            color: #fff;
            text-decoration: none;
            cursor: pointer;
        }

        .reset-link a:hover {
            text-decoration: underline;
        }
    </style>
    <title>Register Editor</title>
</head>
<body>
<header class="header">
    <h1>Register Editor</h1>
    <a href="editor_home.php">Home</a>
</header>

<div class="wrapper">
    <form action="editor_insert.php" method="post" enctype="multipart/form-data">
        <div class="input-box">
            <label for="editorId">Editor ID</label>
            <input type="text" name="editorId" id="editorId" required>
        </div>

        <div class="input-box">
            <label for="editorName">Name</label>
            <input type="text" name="editorName" id="editorName" required>
        </div>

        <br>
        <label for="editorPic">Profile Picture</label>
        <input type="file" name="editorPic" id="editorPic" required>

        <div class="input-box">
            <label for="editorPw">Password</label>
            <input type="password" name="editorPw" id="editorPw" required>
        </div>

        <div class="input-box">
            <label for="editorDesc">Description</label>
            <input type="text" name="editorDesc" id="editorDesc" required>
        </div>

        <button type="submit" class="btn">Register</button>
        
        <div class="reset-link">
            <a href="javascript:void(0);" onclick="resetForm();">Reset</a>
        </div>
    </form>
</div>

<script>
    function resetForm() {
        document.getElementById('editorId').value = '';
        document.getElementById('editorName').value = '';
        document.getElementById('editorPic').value = '';
        document.getElementById('editorPw').value = '';
        document.getElementById('editorDesc').value = '';
    }
</script>
</body>
</html>