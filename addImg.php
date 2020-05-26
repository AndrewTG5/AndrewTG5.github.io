<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "php/head.php"; ?>
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

</head>

<body>
    <div id="mySidenav" class="sidenav"></div>
    <div class="wrapper">
        <?php
        $head = "Add image";
        include "php/titlerow.php";
        ?>
        <div class="bodyContainer">
            <form class="bodyText" action="addImg.php" method="post" enctype="multipart/form-data">
                <h2>Select image to upload:</h2>
                <input type="file" name="file" required>
                <div style="margin-top: 2vh;">
                    <input type="submit" value="Submit" name="submit">
                </div>
            </form>
        </div>
    </div>
</body>

</html>