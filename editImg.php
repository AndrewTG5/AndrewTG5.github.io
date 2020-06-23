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
                "setTimeout(function () { createUIPrompt('Error deleting image: $error');}, 50);",
                "</script>";
        }
    }
    ?>
    <?php
    if (isset($_POST['submit'])) {
        $name = $_FILES['file']['name'];
        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Convert to base64 
        $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
        $image = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
        // Insert record
        $sql = "INSERT INTO images (image, name) VALUES('$image', '$name')";
        if ($conn->query($sql) === true) {
            echo     "<script>",
                "setTimeout(function () {createUIPrompt('Image uploaded');}, 50);",
                "</script>";
        } else {
            $error = addslashes($conn->error);
            echo     "<script>",
                "setTimeout(function () { createUIPrompt('Error uploading image: $error');}, 50);",
                "</script>";
        }
        // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name);
    }
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            let uploadField = document.getElementById("file");

            uploadField.onchange = function() {
                if (this.files[0].size > 1048576) {
                    createUIPrompt("Image is too large!");
                    this.value = "";
                };
            };
        });
    </script>
</head>

<body>
    <div id="mySidenav" class="sidenav"></div>
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
                        <img src="<?php echo $image ?>" alt="">
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