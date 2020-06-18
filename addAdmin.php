<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "php/head.php"; ?>
    <?php
        if (!isset($authed)) {
            $authed = 0;
        }
    ?>
    <?php
    if (isset($_POST["username"])) {
        $uname = $_POST["username"];
        $psw = $_POST["password"];

        $sql = "SELECT * FROM users WHERE email='$uname'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        if ($result->num_rows == 1) {
            if (password_verify($psw, $row["password"])) {
                $_SESSION["username"] = $uname;
                $_SESSION["loggedin"] = 1;
                $authed = 1;
                echo     "<script>",
                    "setTimeout(function () {createUIPrompt('Logged in');}, 50);",
                    "</script>";
            } else {
                echo     "<script>",
                    "setTimeout(function () { createUIPrompt('Incorrect password');}, 50);",
                    "</script>";
            }
        } else {
            $error = addslashes($conn->error);
            echo     "<script>",
                "setTimeout(function () { createUIPrompt('Can\'t log in: $error');}, 50);",
                "</script>";
        }
    }
    if (isset($_POST["newUsername"])) {
        $uname = $_POST["newUsername"];
        $psw = password_hash($_POST["newPassword"], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (email, password)
    		VALUES ('$uname', '$psw')";

        if ($conn->query($sql) === true) {
            $_SESSION["username"] = $uname;
            $_SESSION["loggedin"] = 1;
            echo     "<script>",
                "setTimeout(function () {createUIPrompt('Account created');}, 50);",
                "</script>";
        } else {
            $error = addslashes($conn->error);
            echo     "<script>",
                "setTimeout(function () { createUIPrompt('Can\'t create account: $error');}, 50);",
                "</script>";
        }
    }
    ?>
</head>

<body>
    <div id="mySidenav" class="sidenav"></div>
    <div class="wrapper">
        <?php
        $head = "KKC clubs";
        include "php/titlerow.php";
        ?>
        <div class="bodyContainer">
            <?php
            if ($authed == 0) {
                echo '
                     <form id="login" class="bodyText" action="addAdmin.php" method="post">
                    <h2>Please sign in again</h2>
                    <div class="form__group field">
                        <input type="input" class="form__field" placeholder="Username" name="username" id="username" required />
                        <label for="username" class="form__label">Username</label>
                    </div>
                    <div class="form__group field">
                        <input type="password" class="form__field" placeholder="Password" name="password" id="password" required />
                        <label for="password" class="form__label">Password</label>
                    </div>

                    <input type="submit" value="Submit">
                </form>
                ';
            }
            if ($authed == 1) {
                echo '
                     <form id="login" class="bodyText" action="addAdmin.php" method="post">
                    <h2>Create new admin account</h2>
                    <div class="form__group field">
                        <input type="input" class="form__field" placeholder="Username" name="newUsername" id="username" required />
                        <label for="username" class="form__label">Username</label>
                    </div>
                    <div class="form__group field">
                        <input type="password" class="form__field" placeholder="Password" name="newPassword" id="password" required />
                        <label for="password" class="form__label">Password</label>
                    </div>

                    <input type="submit" value="Submit">
                </form>
                ';
            }

            ?>
        </div>
    </div>
</body>

</html>