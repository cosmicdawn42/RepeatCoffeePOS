<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php"); // Use the absolute path to the index page
exit();
?>
