<?php
session_start();
session_destroy();

// Redirect to main dashboard
header("Location: ../index.html");
exit();
?>