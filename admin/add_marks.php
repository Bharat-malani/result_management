<?php
session_start();
include '../includes/db.php';

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Fetch students
$students = mysqli_query($conn, "SELECT * FROM students");

// Selected student
$selected_student = isset($_POST['student']) ? $_POST['student'] : "";

// Save marks
if (isset($_POST['save'])) {
    $student_id = $_POST['student'];
    $subject_id = $_POST['subject'];
    $marks = $_POST['marks'];

    $check = mysqli_query($conn, "SELECT * FROM marks WHERE student_id='$student_id' AND subject_id='$subject_id'");
    if (mysqli_num_rows($check) == 0) {
        mysqli_query($conn, "INSERT INTO marks VALUES(NULL,'$student_id','$subject_id','$marks')");
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "❌ Marks already added for this subject.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Marks</title>
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

        select, input[type="number"] {
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
        <h2>Add Marks</h2>

        <?php if(isset($error)) { echo "<p class='error'>$error</p>"; } ?>

        <form method="POST">
            <!-- Student Select -->
            Student:
            <select name="student" onchange="this.form.submit()" required>
                <option value="">-- Select Student --</option>
                <?php while($s = mysqli_fetch_assoc($students)) { ?>
                    <option value="<?php echo $s['id']; ?>" <?php if($selected_student==$s['id']) echo "selected"; ?>>
                        <?php echo $s['name']; ?>
                    </option>
                <?php } ?>
            </select>

            <?php
            if($selected_student!="") {
                $subjects = mysqli_query($conn, "SELECT * FROM subjects WHERE id NOT IN (SELECT subject_id FROM marks WHERE student_id='$selected_student')");
            ?>
            <br>
            Subject:
            <select name="subject" required>
                <option value="">-- Select Subject --</option>
                <?php while($sub = mysqli_fetch_assoc($subjects)) { ?>
                    <option value="<?php echo $sub['id']; ?>"><?php echo $sub['subject_name']; ?></option>
                <?php } ?>
            </select>

            <br>
            Marks:
            <input type="number" name="marks" min="0" max="100" required>

            <br>
            <button name="save">Save Marks</button>
            <?php } ?>
        </form>

        <p><a href="admin_dashboard.php">⬅ Back to Dashboard</a></p>
    </div>
</body>
</html>
