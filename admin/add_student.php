<?php
include '../includes/db.php';


if (isset($_POST['add'])) {
$roll = $_POST['roll'];
$name = $_POST['name'];
$sem = $_POST['sem'];
$pass = $_POST['password'];


mysqli_query($conn, "INSERT INTO students VALUES (NULL,'$roll','$name','$sem','$pass')");
    echo "Student Added Successfully";
}
?>


<!-- <form method="POST">
Roll No: <input name="roll"><br>
Name: <input name="name"><br>
Semester: <input name="sem"><br>
Password: <input name="password"><br>
<button name="add">Add Student</button>
</form> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Student</title>
    <style>
        body {
            margin:0;
            padding:0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .form-container {
            background: rgba(255,255,255,0.95);
            padding: 50px 60px;
            border-radius: 15px;
            text-align:center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            width: 400px;
        }

        h2 {
            margin-bottom: 30px;
            color:#333;
        }

        input[type="text"], input[type="password"] {
            width:100%;
            padding:12px;
            margin:10px 0;
            border-radius:8px;
            border:1px solid #ccc;
        }

        button {
            width:100%;
            padding:12px;
            background:#2575fc;
            color:white;
            font-size:16px;
            border:none;
            border-radius:8px;
            cursor:pointer;
            margin-top:10px;
            transition:0.3s;
        }

        button:hover {
            background:#6a11cb;
        }

        .error {
            color:red;
            margin-bottom:10px;
        }

        a {
            text-decoration:none;
            color:#2575fc;
        }

    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add Student</h2>

        <?php if(isset($error)) { echo "<p class='error'>$error</p>"; } ?>

        <form method="POST">
            <input type="text" name="name" placeholder="Student Name" required>
            <input type="text" name="roll" placeholder="Roll Number" required>
            <input type="text" name="sem" placeholder="Semester" required>
            <input type="password" name="password" placeholder="Password" required>
            <button name="add">Add Student</button>
        </form>

        <p><a href="admin_dashboard.php">⬅ Back to Dashboard</a></p>
    </div>



</body>
</html>