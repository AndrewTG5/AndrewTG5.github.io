<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "php/head.php"; 
    $dest="";
    ?>
</head>

<body>
    <div>
        <h1 class="title">KKC clubs</h1>
    </div>
    <div id="mySidenav" class="sidenav"></div>
    <div class="wrapper">
        <div class="galleryContainer">
            <div class="gallery">
                <a href="clubpage.php?dest=robotics">
                    <img src="img/robotsq.png" alt="">
                </a>
                <div class="desc">Robotics</div>
            </div>

            <div class="gallery">
                <a href="clubpage.php?dest=evolocity">
                    <img src="img/evolocity.png" alt="">
                </a>
                <div class="desc">Evolocity</div>
            </div>

            <div class="gallery">
                <a href="#">
                    <img src="img/new.png" alt="">
                </a>
                <div class="desc">Add a club</div>
            </div>
        </div>
    </div>
</body>

</html>