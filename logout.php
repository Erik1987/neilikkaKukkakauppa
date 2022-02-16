<?php session_start(); /* Starts the session */
$_SESSION = array();
session_destroy(); /* Destroy started session */
header("location:login-form.php");  /* Redirect to login page */
exit;
?>