<!DOCTYPE html>
<html lang="en">

<head>
	<?php include "php/head.php"; ?>

	<?php
	/**
	 *  delete records from sign_ups and prepared statement
	 */
	$delsignup = $conn->prepare("DELETE FROM sign_ups WHERE id=?");
	$delsignup->bind_param("i", $to_delete);

	if (isset($_GET["to_delete"])) {
		$to_delete = $_GET["to_delete"];
		
		if ($delsignup->execute()) {
			echo 	"<script>",
				"setTimeout(function () { createUIPrompt('Sign up record deleted');}, 50);",
				"</script>";
		} else {
			$error = addslashes($conn->error);
			echo 	"<script>",
				"setTimeout(function () { createUIPrompt('Failed to delete record: $error');}, 50);",
				"</script>";
		}
		$delsignup->close();
	}
	?>
	<?php
	/**
	 * signs users in
	 */
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
				echo     "<script>",
					"setTimeout(function () {createUIPrompt('Logged in');}, 50);",
					"</script>";
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
	?>
	<style>
		/* transition css for dark theme toggle */
		.bodyText {
			-webkit-transition: background 0.15s ease;
			-o-transition: background 0.15s ease;
			transition: background 0.15s ease;
		}

		.navbar {
			-webkit-transition: background 0.15s ease;
			-o-transition: background 0.15s ease;
			transition: background 0.15s ease;
		}

		p,
		h1,
		h2,
		h3,
		th,
		td {
			-webkit-transition: color 0.15s ease;
			-o-transition: color 0.15s ease;
			transition: color 0.15s ease;
		}

		tr:nth-child(even) {
			-webkit-transition: background-color 0.15s ease;
			-o-transition: background-color 0.15s ease;
			transition: background-color 0.15s ease;
		}
	</style>
	<script>
		document.addEventListener('DOMContentLoaded', (event) => {
			startSettings();
		});

		function toggleTheme() {
			//  sets site theme
			const themePref = localStorage.getItem('themePref');
			if (themePref == 'dark') {
				light();
				localStorage.setItem('themePref', 'light');
			} else {
				dark();
				localStorage.setItem('themePref', 'dark');
			}
		}

		function startSettings() {
			//	sets toggle button state
			const themePref = localStorage.getItem('themePref');
			if (themePref == 'dark') {
				document.getElementById('themeSwitch').checked = true;
			} else {
				document.getElementById('themeSwitch').checked = false;
			}
			document.getElementById(bgPref).checked = true;
		}
	</script>
</head>

<body>
	<div id="myNavbar" class="navbar"></div>
	<?php include "php/notif.php"; ?>
	<div class="wrapper">
		<?php
		$head = "Settings";
		include "php/titlerow.php";
		?>
		<div class="bodyContainer">
			<div class="bodyText" style="min-width: 86%">
				<h2 style="display:inline-block; margin: 0.6vh 0 0 0">Dark mode</h2>
				<input class="tgl tgl-skewed" aria-label="Dark theme" type="checkbox" id="themeSwitch" onclick="toggleTheme()" />
				<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="themeSwitch"></label>
			</div>
			<div class="bodyText">
				<h2>Theme</h2>
				<div class="selectorContainer">
					<input onclick="bgSelector('default')" type="radio" name="bg" id="default" class="input-hidden" />
					<label for="default">
						<div class="default selector"></div>
					</label>
					<input onclick="bgSelector('mint')" type="radio" name="bg" id="mint" class="input-hidden" />
					<label for="mint">
						<div class="mint selector"></div>
					</label>
					<input onclick="bgSelector('rain')" type="radio" name="bg" id="rain" class="input-hidden" />
					<label for="rain">
						<div class="rain selector"></div>
					</label>
					<input onclick="bgSelector('charcoal')" type="radio" name="bg" id="charcoal" class="input-hidden" />
					<label for="charcoal">
						<div class="charcoal selector"></div>
					</label>
				</div>
				<br>
			</div>
			<?php if ($_SESSION["loggedin"] == 2) {
				// if no one is logged in prompt user to log in
				echo '
			<form id="login" class="bodyText" action="settings.php" method="post">
				<h2>Sign in to access more settings</h2>
				<div class="form__group field">
					<input type="input" class="form__field" placeholder="Email" name="username" id="username"
						required />
					<label for="username" class="form__label">Email</label>
				</div>
				<div class="form__group field">
					<input type="password" class="form__field" placeholder="Password" name="password" id="password"
						required />
					<label for="password" class="form__label">Password</label>
				</div>

				<input type="submit" value="Submit">
			</form> ';
			} ?>
			<?php if ($_SESSION["loggedin"] == 1) {
				// if logged in user is admin present admin tools
				echo '
				<div class="bodyText">
				<h2>Admin tools</h2>
				<a href="editImg.php">Manage images</a>
				<br>
				<a href="addAdmin.php">Create new admin account</a>
				<br>
			</div>';
			} ?>
			<div class="bodyText" <?php if ($_SESSION["loggedin"] != 1) {
										echo 'style="display:none"';
									} //! INSECURE 		^
									?>>
				<h2>Club owners</h2>
				<table id="table">
					<tr>
						<th>Club name</th>
						<th>Owner</th>
					</tr>
					<?php
					$sql = "SELECT * FROM clubs INNER JOIN users ON clubs.owner=users.id;";

					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						// output data of each row
						while ($row = $result->fetch_assoc()) {
							$title = $row["title"];
							$owner = $row["email"];
					?>
							<tr>
								<td><?php print $title; ?></td>
								<td style="word-break: break-all;"><?php print $owner; ?></td>
							</tr>
					<?php
						}
					}
					?>
				</table>
			</div>
			<div class="bodyText" <?php if ($_SESSION["loggedin"] == 2) {
										echo 'style="display:none"';
									} //! INSECURE 		^
									?>>
				<h2>All sign ups</h2>
				<table id="table">
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Age</th>
						<th>Club</th>
						<th></th>
					</tr>
					<?php
					$sql = "SELECT clubs.id, sign_ups.full_name, sign_ups.email, sign_ups.age, sign_ups.club, clubs.title, sign_ups.id FROM sign_ups INNER JOIN clubs ON sign_ups.club=clubs.id ORDER BY sign_ups.id;";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						// output data of each row
						while ($row = $result->fetch_assoc()) {
							$id = $row["id"];
							$name = $row["full_name"];
							$email = $row["email"];
							$age = $row["age"];
							$club = $row["title"];
					?>
							<tr>
								<td><?php print $id; ?></td>
								<td><?php print $name; ?></td>
								<td style="word-break: break-all;"><?php print $email; ?></td>
								<td><?php print $age; ?></td>
								<td><?php print $club; ?></td>
								<td><a href="settings.php?to_delete=<?php echo $id; ?>#table">Delete</a></td>
							</tr>
					<?php
						}
					}
					?>
				</table>
			</div>
			<?php include "php/footer.php" ?>
</body>

</html>