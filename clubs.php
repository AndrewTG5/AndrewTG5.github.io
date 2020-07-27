<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "php/head.php"; ?>
</head>

<body>
    <div id="myNavbar" class="navbar"></div>
    <?php include "php/notif.php"; ?>
    <div class="wrapper">
        <?php
        $head = "KKC clubs";
        include "php/titlerow.php";
        ?>
        <div class="bodyContainer">
            <div class="galleryContainer">
                <?php
                $sql = "SELECT * FROM clubs INNER JOIN images ON clubs.image1=images.id INNER JOIN users ON clubs.owner=users.id;";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $title = $row["title"];
                        $image = $row["image"];
                        $owner = $row["email"];
                        /**
                         *  loops thorugh each record in the table and makes a gallery entry for it
                         */
                ?>
                        <div class="gallery">
                            <a href="clubpage.php?dest=<?php echo $title ?>">
                                <img class="gImg" src="<?php echo $image ?>" alt="">
                            </a>
                            <div class="desc"><?php echo $title ?><?php if ($_SESSION["email"] == $owner || $_SESSION["loggedin"] == 1) {
                                                                        echo '  <a href="addclub.php?edit=' . $title . '">Edit</a>';
                                                                    } ?></div>
                        </div>
                <?php
                    }
                }
                ?>

                <?php if ($_SESSION["loggedin"] == 1) {
                    // if logged in user is admin let them make a new club
                    echo '
                <div class="gallery">
                    <a href="addclub.php">
                        <img class="gImg" src="img/new.png" alt="">
                    </a>
                    <div class="desc">Add a club</div>
                </div>
                ';
                } ?>
            </div>
        </div>
    </div>
    <?php include "php/footer.php" ?>
</body>

</html>