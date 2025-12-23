<?php
include '../includes/db.php';
session_start();

if (isset($_POST['login'])) {
    $roll_no = $_POST['roll_no'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM students WHERE roll_no='$roll_no' AND password='$password'");
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['student'] = mysqli_fetch_assoc($query);
        header("Location: student_dashboard.php");
        exit();
    } else {
        $error = "❌ Invalid Roll Number or Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Login</title>
    <style>
        body {
            margin:0;
            padding:0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #00c6ff, #0072ff);
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .login-box {
            background: rgba(255,255,255,0.95);
            padding: 50px 40px;
            border-radius: 15px;
            text-align:center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            width: 350px;
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
            background:#0072ff;
            color:white;
            font-size:16px;
            border:none;
            border-radius:8px;
            cursor:pointer;
            margin-top:10px;
            transition:0.3s;
        }

        button:hover {
            background:#00c6ff;
        }

        .error {
            color:red;
            margin-bottom:10px;
        }

        a {
            text-decoration:none;
            color:#0072ff;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Student Login</h2>

        <?php if(isset($error)) { echo "<p class='error'>$error</p>"; } ?>

        <form method="POST">
            <input type="text" name="roll_no" placeholder="Roll Number" required>
            <input type="password" name="password" placeholder="Password" required>
            <button name="login">Login</button>
        </form>

        <p><a href="../index.html">⬅ Back to Main Page</a></p>
    </div>
</body>
</html>
