<!-- <?php
// include '../includes/auth.php';
// checkAdmin();
// ?>

<h2>Admin Dashboard</h2>

<ul>
    <li><a href="add_student.php">Add Student</a></li>
    <li><a href="add_subject.php">Add Subject</a></li>
    <li><a href="add_marks.php">Add Marks</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul> -->

<?php
session_start();
include '../includes/db.php';

// Check if admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
$admin_name = $_SESSION['admin']['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body {
            margin:0;
            padding:0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .dashboard-container {
            background: rgba(255,255,255,0.95);
            padding: 50px 60px;
            border-radius: 15px;
            text-align:center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            width: 400px;
        }

        h1 {
            margin-bottom: 30px;
            color: #333;
        }

        .btn {
            display:block;
            margin: 15px auto;
            padding: 15px 30px;
            font-size: 18px;
            text-decoration:none;
            color: #fff;
            background: #2575fc;
            border-radius: 10px;
            transition: 0.3s;
        }

        .btn:hover {
            background: #6a11cb;
        }

        .logout {
            background: red;
        }

        .logout:hover {
            background: darkred;
        }

    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome, <?php echo $admin_name; ?> 🎓</h1>

        <a href="add_student.php" class="btn">Add Student</a>
        <a href="add_subject.php" class="btn">Add Subject</a>
        <a href="add_marks.php" class="btn">Add Marks</a>
        <a href="logout.php" class="btn logout">Logout</a>
    </div>
</body>
</html>
