<?php
session_start();
$_SESSION["email"] = "";
$_SESSION["loggedin"] = 2;
header("Location: ../index.php");
die();
?>