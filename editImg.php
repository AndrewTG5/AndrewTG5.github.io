<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "php/head.php"; ?>
    <?php
    // delete image prepared statement
    $delimage = $conn->prepare("DELETE FROM images WHERE name=?");
    $delimage->bind_param("s", $to_delete);
    // add image prepared statment
    $addimage = $conn->prepare("INSERT INTO images (name, image, club_id, description) VALUES(?, ?, ?, ?)");
    $addimage->bind_param("ssis", $name, $image, $clubid, $desc);

    if (isset($_GET["delete"])) {
        $to_delete = $_GET["delete"];

        if ($delimage->execute()) {
            echo     "<script>",
                "setTimeout(function () { createUIPrompt('Image \'<b>$to_delete</b>\' deleted');}, 50);",
                "</script>";
        } else {
            $error = addslashes($conn->error);
            echo     "<script>",
                "setTimeout(function () { createUIPrompt('Failed to delete image: $error');}, 50);",
                "</script>";
        }
        $delimage->close();
    }
    ?>
    <?php
    if (isset($_POST['submit'])) {
        $name = $_FILES['file']['name'];
        $clubid = $_POST['club'];
        $desc = $_POST['desc'];

        // get file type from uploaded file
        $imageFileType = explode('/', $_FILES['file']['type'])[1];

        // convert to base64 
        $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
        $image = 'data:image/' . $imageFileType . ';base64,' . $image_base64;

        // check for duplication, if none, insert record
        $sql = "SELECT * FROM images WHERE image='$image'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo     "<script>",
                "setTimeout(function () {createUIPrompt('Image already exists in database');}, 50);",
                "</script>";
        } else {
            if ($addimage->execute()) {
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
        $addimage->close();
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
                <input type="file" name="file" id="file" accept="image/*" style="color: var(--mainText)" required>
                <div class="form__group field">
                    <input type="input" class="form__field" placeholder="Description" name="desc" id="desc" required/>
                    <label for="desc" class="form__label">Description</label>
                </div>
                <div style="margin-top: 2vh;">
                    <label for="club" style="color: var(--mainText)">Club</label>
                    <select id="club" name="club">
                        <option value="0">None</option>
                        <?php
                        $sql = "SELECT * FROM clubs";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $title = $row["title"];
                                $id = $row["id"];
                        ?>
                                <option value="<?php echo $id ?>"><?php echo $title ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
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