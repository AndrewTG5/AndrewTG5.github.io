<?php
/**
 *  run when logout requested. redirects to index
 *  2 == signed out
 *  1 == admin
 *  0 == club admin
 */
session_start();
$_SESSION["email"] = "";
$_SESSION["loggedin"] = 2;
header("Location: ../index.php");
die();
?>