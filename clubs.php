<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "php/head.php"; ?>
</head>

<body>
    <div id="mySidenav" class="sidenav"></div>
    <div class="wrapper">
        <div class="titleRow">
			<h1 class="title">KKC clubs</h1>
			<div class="signin">
				<p>You are not signed in</p>
				<a href="settings.php#login"><p>Sign in</p></a>
			</div>
		</div>
        <div class="galleryContainer">
            <div class="gallery">
                <a href="clubpage.php?dest=robotics">
                    <img src="img/robotsq.png" alt="">
                </a>
                <div class="desc">Robotics</div>
                <a href="clubpageedit.php?edit=robotics">Edit</a>
            </div>

            <div class="gallery">
                <a href="clubpage.php?dest=evolocity">
                    <img src="img/evolocity.png" alt="">
                </a>
                <div class="desc">Evolocity</div>
                <a href="clubpageedit.php?edit=evolocity">Edit</a>
            </div>

            <div class="gallery">
                <a href="addclub.php">
                    <img src="img/new.png" alt="">
                </a>
                <div class="desc">Add a club</div>
            </div>
        </div>
    </div>
</body>

</html>