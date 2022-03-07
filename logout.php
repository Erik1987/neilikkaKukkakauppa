<?php session_start(); /* Starts the session */

setcookie('username', '', 5);
setcookie('email', '', 5);
setcookie('password', '', 5);
$_SESSION = array();
unset($_SESSION['loggedin']);
unset($_SESSION['cart']);
unset($_SESSION['id']);
session_destroy(); /* Destroy started session */
header("location:login-form.php");  /* Redirect to login page */
exit;
?>