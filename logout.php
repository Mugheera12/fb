<?php
include("./config.php");
session_start();
// Clear the cookie
setcookie('username', '', time() - 3600); // Set expiration time to past
session_unset();
session_destroy();
// Redirect to the index page
header("location: $base_url");
exit();

?>