<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<meta name="author" content="Andrew Blake">
<meta name="Description" content="Information about clubs in Katikati college.">
<title>KKC clubs</title>
<script src="js/script.js"></script>
<link href="css.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
<meta name="theme-color" content="#0094ff">
<link rel="icon" type="image/png" href="img/favicon.png">
<?php
/**
 *  creates database connection
 */
session_start();
$servername = "localhost";
$username = "sec_user";
$password = "greenChair153";
$database = "kkc_clubs";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    $error = addslashes($conn->connect_error);
    echo     "<script>",
        "setTimeout(function () { createUIPrompt('Database connection failed: $error');}, 50);",
        "</script>";
}
?>