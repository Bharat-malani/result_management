<?php
include '../includes/db.php';

if (isset($_POST['add'])) {
    $subject = $_POST['subject'];

    mysqli_query($conn, "INSERT INTO subjects VALUES (NULL,'$subject')");

    // 🔙 Redirect to admin dashboard
    header("Location: admin_dashboard.php");
    exit();
}
?>

<!-- <h2>Add Subject</h2>

<form method="POST">
    Subject Name:
    <input name="subject" required>
    <button name="add">Add Subject</button>
</form>

<br>
<a href="admin_dashboard.php">Back to Dashboard</a> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Subject</title>
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

        input[type="text"] {
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
        <h2>Add Subject</h2>

        <?php if(isset($error)) { echo "<p class='error'>$error</p>"; } ?>

        <form method="POST">
            <input type="text" name="subject" placeholder="Subject Name" required>
            <button name="add">Add Subject</button>
        </form>

        <p><a href="admin_dashboard.php">⬅ Back to Dashboard</a></p>
    </div>
</body>
</html>