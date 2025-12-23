<?php
session_start();
include '../includes/db.php';

// Check if student is logged in
if(!isset($_SESSION['student'])){
    header("Location: student_login.php");
    exit();
}

$student_id = $_SESSION['student']['id'];
$student_name = $_SESSION['student']['name'];

// Fetch marks
$marks_query = mysqli_query($conn, "
    SELECT subjects.subject_name, marks.marks 
    FROM marks 
    JOIN subjects ON marks.subject_id = subjects.id 
    WHERE marks.student_id = '$student_id'
");

$total = 0;
$count = 0;
$marks_data = [];
while($row = mysqli_fetch_assoc($marks_query)){
    $marks_data[] = $row;
    $total += $row['marks'];
    $count++;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Result</title>
    <style>
        body {
            margin:0;
            padding:0;
            font-family:'Arial', sans-serif;
            background: linear-gradient(to right, #00c6ff, #0072ff);
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .result-container {
            background: rgba(255,255,255,0.95);
            padding:50px 60px;
            border-radius:15px;
            text-align:center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            width: 500px;
        }

        h2 {
            margin-bottom:30px;
            color:#333;
        }

        table {
            width:100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 12px;
            text-align:center;
        }

        th {
            background-color: #0072ff;
            color:white;
        }

        tr:nth-child(even){
            background-color: #f2f2f2;
        }

        .total {
            font-weight:bold;
            font-size:18px;
        }

        .btn {
            display:inline-block;
            margin:10px 10px 0 10px;
            padding:12px 25px;
            background:#0072ff;
            color:white;
            text-decoration:none;
            border-radius:8px;
            transition:0.3s;
        }

        .btn:hover {
            background:#00c6ff;
        }

        .logout {
            background:red;
        }

        .logout:hover {
            background:darkred;
        }
    </style>
</head>
<body>
    <div class="result-container">
        <h2>Result of <?php echo $student_name; ?> 🎓</h2>

        <?php if($count > 0){ ?>
            <table>
                <tr>
                    <th>Subject</th>
                    <th>Marks</th>
                </tr>
                <?php foreach($marks_data as $m){ ?>
                <tr>
                    <td><?php echo $m['subject_name']; ?></td>
                    <td><?php echo $m['marks']; ?></td>
                </tr>
                <?php } ?>
            </table>

            <p class="total">Total Marks: <?php echo $total; ?></p>
            <p class="total">Percentage: <?php echo round($total/$count,2); ?>%</p>
        <?php } else { ?>
            <p>No result available yet.</p>
        <?php } ?>

        <a href="student_dashboard.php" class="btn">⬅ Back to Dashboard</a>
        <a href="logout.php" class="btn logout">🚪 Logout</a>
    </div>
</body>
</html>
