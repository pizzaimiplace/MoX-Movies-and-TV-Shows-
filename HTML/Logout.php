<?php 
session_start();
$_SESSION['username'] = NULL;
$_SESSION['id'] = NULL;
header("Location: Login.php");
?>