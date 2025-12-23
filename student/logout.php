<?php
session_start();
session_destroy();

// Redirect to main index page
header("Location: ../index.html");
exit();
?>
