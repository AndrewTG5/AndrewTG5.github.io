<?php
/**
 *  shows the current logged in user in the titlerow
 */
if(!isset($_SESSION["email"])) {
    // sets email to blank is if email is undefined
    $_SESSION["email"] = "";
}
if (isset($_SESSION["loggedin"])) {
    if ($_SESSION["loggedin"] != 2) {
        $signin = '<p>Signed in as ' . $_SESSION["email"] . '</p>
            <a href="php/signout.php"><p>Sign out</p></a>';
    } else {
        $signin = '<p>You are not signed in</p>
	    	<a href="settings.php#login"><p>Sign in</p></a>';
    }
} else {
    $_SESSION["loggedin"] = 2;
    $signin = '<p>You are not signed in</p>
    	    	<a href="settings.php#login"><p>Sign in</p></a>';
}
?>

<div class="titleRow">
    <a href="index.php" style="text-decoration: none; float: left;">
    <img src="img/favicon.png">
    <h1 class="title"><?php print $head; ?></h1>
    </a>
    <div class="signin">
        <?php echo $signin ?>
    </div>
</div>