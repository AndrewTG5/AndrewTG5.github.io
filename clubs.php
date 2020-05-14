<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "php/head.php"; ?>
</head>

<body>
    <div id="mySidenav" class="sidenav"></div>
    <div class="wrapper">
        <?php 
		$head="KKC clubs";
		include "php/titlerow.php";
		?>
        <div class="galleryContainer">
            <div class="gallery">
                <a href="clubpage.php?dest=robotics">
                    <img src="img/robotsq.png" alt="">
                </a>
                <div class="desc">Robotics</div>
                <a href="addclub.php?edit=robotics">Edit</a>
            </div>

            <div class="gallery">
                <a href="clubpage.php?dest=evolocity">
                    <img src="img/evolocity.png" alt="">
                </a>
                <div class="desc">Evolocity</div>
                <a href="addclub.php?edit=evolocity">Edit</a>
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