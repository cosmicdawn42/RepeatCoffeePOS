<?php
session_start();
session_unset();
session_destroy();
header("Location: /pos/index.php"); // Use the absolute path to the index page
exit();
?>
