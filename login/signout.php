<?php
session_start();

// End the session and remove all session variables
session_destroy();

// Set the cache-control header to prevent caching
header('Cache-Control: no-cache, no-store, must-revalidate');

// Redirect the user to the login page
header('Location: login.php');
exit;

?>
