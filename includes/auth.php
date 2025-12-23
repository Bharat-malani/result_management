<?php
session_start();

function checkAdmin() {
    if (!isset($_SESSION['admin'])) {
        header("Location: admin_login.php");
        exit();
    }
}

function checkStudent() {
    if (!isset($_SESSION['student'])) {
        header("Location: student_login.php");
        exit();
    }
}
?>