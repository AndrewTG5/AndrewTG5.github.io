<!DOCTYPE html>
<html lang="en">

<head>
	<?php include "php/head.php"; ?>
	<?php
     	if (isset($_POST["fname"])) {
    		$fname = $_POST["fname"];
    		$lname = $_POST["lname"];
    		$age = $_POST["age"];
    		$club = $_POST["club"];

    		$sql = "INSERT INTO sign_ups (fname, lname, age, club)
    		VALUES ('$fname', '$lname', '$age', '$club')";
			
    		if ($conn->query($sql) === true) {
				echo 	"<script type='text/javascript'>",
    				"setTimeout(function () {createUIPrompt('Record created', 'Dismiss');}, 50);",
    				"</script>"
					;
    		} else {
    		    $error = addslashes($conn->error);
    		    echo 	"<script type='text/javascript'>",
    				"setTimeout(function () { createUIPrompt('Error creating record: $error', 'Dismiss');}, 50);",
    				"</script>"
    		           ;
    		}
     	}
    ?>

</head>

<body>
	<div id="mySidenav" class="sidenav"></div>
	<div class="wrapper">
		<div class="titleRow">
			<h1 class="title">KKC clubs</h1>
			<div class="signin">
				<p>You are not signed in</p>
				<a href="settings.php#login">
					<p>Sign in</p>
				</a>
			</div>
		</div>
		<div class="bodyContainer">
			<form class="bodyText" action="signup.php" method="post" autocomplete="off">
				<div class="form__group field">
					<input type="input" class="form__field" placeholder="First name" name="fname" id="first name" required />
					<label for="first name" class="form__label">First name</label>
				</div>
				<div class="form__group field">
					<input type="input" class="form__field" placeholder="last ame" name="lname" id="last name" required />
					<label for="last name" class="form__label">Last name</label>
				</div>
				<div class="form__group field">
					<input type="input" class="form__field" placeholder="Age" name="age" id="age" required />
					<label for="age" class="form__label">Age</label>
				</div>
				<div style="margin-top: 2vh;">
					<label for="club">Club</label>
					<select id="club" name="club">
						<option value="evolocity">Evolocity</option>
						<option value="robotics">Robotics</option>
						<option value="club3">Club 3</option>
					</select>

					<input type="submit" value="Submit">
				</div>
			</form>
		</div>
	</div>
</body>

</html>