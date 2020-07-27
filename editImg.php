<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "php/head.php"; ?>
    <?php
    if (isset($_GET["delete"])) {
        $to_delete = $_GET["delete"];

        $sql = "DELETE FROM images WHERE name='$to_delete'"; //sec_user needs delete permissions
        if ($conn->query($sql) === TRUE) {
            echo     "<script>",
                "setTimeout(function () { createUIPrompt('Image deleted');}, 50);",
                "</script>";
        } else {
            $error = addslashes($conn->error);
            echo     "<script>",
                "setTimeout(function () { createUIPrompt('Failed to delete image: $error');}, 50);",
                "</script>";
        }
    }
    ?>
    <?php
    if (isset($_POST['submit'])) {
        $name = $_FILES['file']['name'];

        // get file type from uploaded file
        $imageFileType = explode('/', $_FILES['file']['type'])[1];

        // convert to base64 
        $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
        $image = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
        // insert record
        $sql = "INSERT INTO images (image, name) VALUES('$image', '$name')";
        if ($conn->query($sql) === true) {
            echo     "<script>",
                "setTimeout(function () {createUIPrompt('Image uploaded');}, 50);",
                "</script>";
        } else {
            $error = addslashes($conn->error);
            echo     "<script>",
                "setTimeout(function () { createUIPrompt('Failed to upload image: $error');}, 50);",
                "</script>";
        }
    }
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            let uploadField = document.getElementById("file");

            uploadField.onchange = function() {
                // stops users from uploading files that are too large
                if (this.files[0].size > 1048576) {
                    createUIPrompt("Image is too large! Needs to be <1MB");
                    this.value = "";
                };
            };
        });
    </script>
</head>

<body>
    <div id="myNavbar" class="navbar"></div>
    <?php include "php/notif.php"; ?>
    <div class="wrapper">
        <?php
        $head = "View images";
        include "php/titlerow.php";
        ?>
        <div class="bodyContainer">
            <form class="bodyText" action="editImg.php" method="post" enctype="multipart/form-data">
                <h2>Select image to upload:</h2>
                <p>Max 1MB</p>
                <input type="file" name="file" id="file" accept="image/*" required>
                <div style="margin-top: 2vh;">
                    <input type="submit" value="Submit" name="submit">
                </div>
            </form>
        </div>
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
                        <img class="gImg" src="<?php echo $image ?>" alt="">
                        <div class="desc"><?php echo $title ?> <a href="editImg.php?delete=<?php echo $title ?>">Delete</a></div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <?php include "php/footer.php" ?>
</body>

</html>