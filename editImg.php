<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "php/head.php"; ?>
    <?php
        if (isset($_GET["delete"])) {
        $to_delete = $_GET["delete"];


        $sql = "DELETE FROM images WHERE id=$to_delete"; //sec_user needs delete permissions
        if ($conn->query($sql) === TRUE) {
            echo     "<script>",
                "setTimeout(function () { createUIPrompt('Image deleted');}, 50);",
                "</script>";
        } else {
            $error = addslashes($conn->error);
            echo     "<script>",
                "setTimeout(function () { createUIPrompt('Error deleting image: $error');}, 50);",
                "</script>";
        }
    }
    ?>
</head>

<body>
    <div id="mySidenav" class="sidenav"></div>
    <div class="wrapper">
        <?php
        $head = "View images";
        include "php/titlerow.php";
        ?>
        <div class="galleryContainer">
            <?php
            $sql = "SELECT * FROM images";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $title = $row["name"];
                    $image = $row["image"];
            ?>
                    <div class="gallery">
                        <img src="<?php echo $image ?>" alt="">
                        <div class="desc"><?php echo $title ?>  <a href="editImg.php?delete=<?php echo $title ?>">Delete</a></div>
                    </div>
            <?php
                }
            }
            $conn->close();
            ?>
        </div>
    </div>
</body>

</html>