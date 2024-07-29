<?php
session_start();
session_unset();
session_destroy();
session_start(); 
$_SESSION['logout_message'] = "See you soon!.";
header('Location: login.php');
exit;
?>