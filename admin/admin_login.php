<!-- <?php
// session_start();
// include '../includes/db.php';


// if (isset($_POST['login'])) {
// $user = $_POST['username'];
// $pass = $_POST['password'];


// $q = "SELECT * FROM admin WHERE username='$user' AND password='$pass'";
// $res = mysqli_query($conn, $q);


// if (mysqli_num_rows($res) == 1) {
// $_SESSION['admin'] = $user;
// header("Location: admin_dashboard.php");
// } else {
// echo "Invalid Login";
// }
// }
// ?>


<form method="POST">
    Username:
    <input type="text" name="username">
    Password:
    <input type="password" name="password">
    <button name="login">Login</button>
</form> -->

<?php
include '../includes/db.php';
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['admin'] = mysqli_fetch_assoc($query);
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "❌ Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <style>
        body {
            margin:0;
            padding:0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #ff416c, #ff4b2b);
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
            background:#ff4b2b;
            color:white;
            font-size:16px;
            border:none;
            border-radius:8px;
            cursor:pointer;
            margin-top:10px;
            transition:0.3s;
        }

        button:hover {
            background:#ff416c;
        }

        .error {
            color:red;
            margin-bottom:10px;
        }

        a {
            text-decoration:none;
            color:#ff4b2b;
        }

       

    </style>
</head>
<body>
    <div class="login-box">
        <h2>Admin Login</h2>

        <?php if(isset($error)) { echo "<p class='error'>$error</p>"; } ?>

        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button name="login">Login</button>
        </form>

        <p><a href="../index.html">⬅ Back to Main Page</a></p>
    </div>

    

</body>
</html>
