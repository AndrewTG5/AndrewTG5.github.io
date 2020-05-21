<?php
session_start();
$_SESSION["username"] = "";
$_SESSION["loggedin"] = 0;
header("Location: ../index.php");
die();
?>