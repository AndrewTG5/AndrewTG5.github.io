<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<meta name="author" content="Andrew Blake">
<meta name="Description" content="Information about clubs in Katikati college.">
<title>KKC clubs</title>
<script src="js/script.js"></script>
<link href="css.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
<!--icon stuff-->
<meta name="theme-color" content="#0094ff">
<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="img/favicon.png">
<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
<link rel="manifest" href="site.webmanifest">
<link rel="shortcut icon" href="img/favicon.ico">
<meta name="apple-mobile-web-app-title" content="KKC clubs">
<meta name="application-name" content="KKC clubs">
<meta name="msapplication-TileColor" content="#0094ff">
<meta name="msapplication-config" content="browserconfig.xml">
<?php
$servername = "localhost";
$username = "sec_user";
$password = "greenChair153";
$database = "kkc_clubs";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
