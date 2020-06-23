<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "php/head.php"; ?>
</head>

<body>
    <div id="mySidenav" class="sidenav"></div>
    <div class="wrapper">
        <?php
        $head = "KKC clubs";
        include "php/titlerow.php";
        ?>
        <div class="bodyContainer">
            <div class="galleryContainer">
                <?php
                $sql = "SELECT * FROM pages";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $title = $row["title"];
                        $image = $row["image1"];
                ?>
                        <div class="gallery">
                            <a href="clubpage.php?dest=<?php echo $title ?>">
                                <img class="gImg" src="<?php echo $image ?>" alt="">
                            </a>
                            <div class="desc"><?php echo $title ?><?php if ($_SESSION["loggedin"] == 1) {
                                                                        echo '  <a href="addclub.php?edit=' . $title . '">Edit</a>';
                                                                    } ?></div>
                        </div>
                <?php
                    }
                }
                ?>

                <?php if ($_SESSION["loggedin"] == 1) {
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