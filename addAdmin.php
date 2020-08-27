<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "php/head.php"; ?>
    <?php
    /**
     * page to make new club admin accounts. admin needs to sign in again for security.
     */
    if (!isset($authed)) {
        $authed = 0;
    }
    ?>
    <?php
    // prepared statement
    $addacc = $conn->prepare("INSERT INTO users (email, password, first_name, last_name, status) VALUES (?, ?, ?, ?, ?)");
    $addacc->bind_param("sssss", $uname, $psw, $fname, $lname, $zero);
    $zero = 0;

    // checks login details
    if (isset($_POST["username"])) {
        $uname = $_POST["username"];
        $psw = $_POST["password"];

        $sql = "SELECT * FROM users WHERE email='$uname'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        if ($result->num_rows == 1) {
            $status = $row["status"];
            if (password_verify($psw, $row["password"])) {
                $_SESSION["email"] = $uname;
                if ($status == 1) {
                    $_SESSION["loggedin"] = 1;
                } elseif ($status == 0) {
                    $_SESSION["loggedin"] = 0;
                }
                $authed = 1;
            } else {
                echo     "<script>",
                    "setTimeout(function () { createUIPrompt('Incorrect password');}, 50);",
                    "</script>";
            }
        } else {
            echo     "<script>",
                "setTimeout(function () { createUIPrompt('Incorrect email');}, 50);",
                "</script>";
        }
    }
    if (isset($_POST["newUsername"])) {
        // send the new account to the database
        $uname = $_POST["newUsername"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $psw = password_hash($_POST["newPassword"], PASSWORD_DEFAULT);

        // check for duplication, if none, insert record
        $sql = "SELECT * FROM users WHERE email='$uname'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0
        ) {
            echo     "<script>",
                "setTimeout(function () {createUIPrompt('The user \'<b>$uname</b>\' already exits');}, 50);",
                "</script>";
        } else {
            if ($addacc->execute()) {
                echo     "<script>",
                    "setTimeout(function () {createUIPrompt('Account created');}, 50);",
                    "</script>";
            } else {
                $error = addslashes($conn->error);
                echo     "<script>",
                    "setTimeout(function () { createUIPrompt('Failed to create account: $error');}, 50);",
                    "</script>";
            }
        }
        $addacc->close();
    }
    ?>
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
                        <input type="input" class="form__field" placeholder="First name" name="fname" id="fname" autocomplete="off" required />
                        <label for="username" class="form__label">First name</label>
                    </div>
                    <div class="form__group field">
                        <input type="input" class="form__field" placeholder="Last namel" name="lname" id="lname" autocomplete="off" required />
                        <label for="username" class="form__label">Last name</label>
                    </div>
                    <div class="form__group field">
                        <input type="input" class="form__field" placeholder="Email" name="newUsername" id="email" autocomplete="off" required />
                        <label for="email" class="form__label">Email</label>
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
    <?php include "php/footer.php" ?>
</body>

</html>