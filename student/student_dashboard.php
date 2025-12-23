<!-- <?php
// include '../includes/auth.php';
// checkStudent();
// ?> -->
<!-- 
<h2>Student Dashboard</h2>

<p>Welcome, <?php echo $_SESSION['student']['name']; ?></p>

<ul>
    <li><a href="view_result.php">View Result</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul> -->

<?php
session_start();
include '../includes/db.php';

// Check if student is logged in
if (!isset($_SESSION['student'])) {
    header("Location: student_login.php");
    exit();
}
$student_name = $_SESSION['student']['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    <style>
        body {
            margin:0;
            padding:0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #00c6ff, #0072ff);
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
            background: #0072ff;
            border-radius: 10px;
            transition: 0.3s;
        }

        .btn:hover {
            background: #00c6ff;
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
        <h1>Welcome, <?php echo $student_name; ?> 🎓</h1>

        <a href="view_result.php" class="btn">View Result</a>
        <a href="logout.php" class="btn logout">Logout</a>
    </div>
</body>
</html>
