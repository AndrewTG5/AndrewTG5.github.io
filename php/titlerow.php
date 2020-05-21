<?php
if (isset($_SESSION["loggedin"])) {
    if ($_SESSION["loggedin"] == 1) {
        $signin = '<p>Signed in as ' . $_SESSION["username"] . '</p>
            <a href="php/signout.php"><p>Sign out</p></a>';
    } else {
        $signin = '<p>You are not signed in</p>
	    	<a href="settings.php#login"><p>Sign in</p></a>';
    }
} else {
    $_SESSION["loggedin"] = 0;
    $signin = '<p>You are not signed in</p>
    	    	<a href="settings.php#login"><p>Sign in</p></a>';
}

?>

<div class="titleRow">
    <h1 class="title"><?php print $head; ?></h1>
    <div class="signin">
        <?php echo $signin ?>
    </div>
</div>