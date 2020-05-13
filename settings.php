<!DOCTYPE html>
<html lang="en">

<head>
	<?php include "php/head.php"; ?>

	<?php
		if (isset($_GET["to_delete"])) {
			$to_delete=$_GET["to_delete"];
			
			
			$sql = "DELETE FROM sign_ups WHERE id=$to_delete"; //sec_user needs delete permissions
         	if ($conn->query($sql) === TRUE) {
			 	echo 	"<script type='text/javascript'>",
			 			"setTimeout(function () { createUIPrompt('Record deleted', 'Dismiss');}, 50);",
     					"</script>"
						;
         	} else {
             	$error = addslashes($conn->error);
    		    echo 	"<script type='text/javascript'>",
    				"setTimeout(function () { createUIPrompt('Error deleting record: $error', 'Dismiss');}, 50);",
    				"</script>"
    		           ;
         	}
     	}
	?>
	<style>
		.bodyText {
			-webkit-transition: background 0.15s ease;
			-o-transition: background 0.15s ease;
			transition: background 0.15s ease;
		}

		.sidenav {
			-webkit-transition: background 0.15s ease;
			-o-transition: background 0.15s ease;
			transition: background 0.15s ease;
		}

		p,
		h1,
		h2,
		h3 {
			-webkit-transition: color 0.15s ease;
			-o-transition: color 0.15s ease;
			transition: color 0.15s ease;
		}

		table {
			border-collapse: collapse;
			border-spacing: 0;
			width: 100%;
			border: 1px solid #ddd;
			margin-bottom: 3vh;
		}

		th,
		td {
			text-align: left;
			padding: 8px;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2
		}
	</style>
	<script>
		document.addEventListener('DOMContentLoaded', (event) => {
			startSettings();
		});

		function toggleTheme() {
			//sets site theme
			var themePref = localStorage.getItem("themePref");
			if (themePref == "dark") {
				light();
				localStorage.setItem("themePref", "light");
			} else {
				dark();
				localStorage.setItem("themePref", "dark");
			}
		}

		function startSettings() {
			//sets toggle button state
			var userPref = localStorage.getItem("themePref");
			var soundPref = localStorage.getItem("soundPref");
			if (themePref == "dark") {
				document.getElementById("themeSwitch").checked = true;
			} else {
				document.getElementById("themeSwitch").checked = false;
			}
		}
	</script>
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
			<div class="bodyText" style="min-width: 86%">
				<h2 style="display:inline-block; margin: 0.6vh 0 0 0">Dark theme</h2>
				<input class="tgl tgl-skewed" aria-label="Dark theme" type="checkbox" id="themeSwitch"
					onclick="toggleTheme()" />
				<label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="themeSwitch"></label>
			</div>
			<div class="bodyText">
				<h2 style="border-bottom: 2px solid var(--accentBlue);">Experiments</h2>
				<a style="color: var(--mainText); font-size: 125%; transition: color 0.15s ease;" href="#"
					onclick="createUIPrompt('This can say anything🔥','Dismiss')">
					Example notification banner
				</a>
				<br>
				<br>
				<a style="color: var(--mainText); font-size: 125%; transition: color 0.15s ease;" href="#" onclick="">
					TODO: Example confirm dialog
				</a>
			</div>
			<form id="login" class="bodyText" action="php/settings.php" method="post">
				<h2>Sign in to access more settings</h2>
				<div class="form__group field">
					<input type="input" class="form__field" placeholder="Username" name="uername" id="username"
						required />
					<label for="username" class="form__label">Username</label>
				</div>
				<!--TODO: fix autofill bug and non focused but filled behaviour-->
				<div class="form__group field">
					<input type="password" class="form__field" placeholder="Password" name="password" id="password"
						required />
					<label for="password" class="form__label">Password</label>
				</div>

				<input type="submit" value="Submit">
			</form>
			<div class="bodyText">
				<h2>All sign ups</h2>
				<table id="table">
					<tr>
						<th>#</th>
						<th>First name</th>
						<th>Last name</th>
						<th>Age</th>
						<th>Club</th>
					</tr>
					<?php
						 $sql = "SELECT * FROM sign_ups";
						 $result = $conn->query($sql);
						 if ($result->num_rows > 0) {
						     // output data of each row
						     while ($row = $result->fetch_assoc()) {
						         $id=$row["id"];
						         $fname=$row["fname"];
						         $lname=$row["lname"];
								 $age=$row["age"];
								 $club=$row["club"]; 
					?>
						<tr>
							<td><?php print $id; ?>
								<a
									href="settings.php?to_delete=<?php echo $id; ?>#table">Delete
								</a>
							</td>
							<td><?php print $fname; ?></td>
							<td><?php print $lname; ?></td>
							<td><?php print $age; ?></td>
							<td><?php print $club; ?></td>
						</tr>
					<?php
        				}
    						} 
						$conn->close();
					?>
				</table>
			</div>
			<div class="foot">
				<a href="https://github.com/andrewthegreat5/andrewthegreat5.github.io/tree/php-sql-version"
					target="_blank" rel="noopener">GitHub</a>
				<p>Author: Andrew Blake</p>
				<p>Version 5.1.0 php</p>
			</div>
</body>

</html>