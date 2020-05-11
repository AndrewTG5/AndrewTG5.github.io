<!DOCTYPE html>
<html lang="en">

<head>
	<?php include "php/head.php"; ?>

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
				<a href="settings.php#login"><p>Sign in</p></a>
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
					onclick="createUIPrompt('This can say anything🔥','Dismiss',dismissUIPrompt)">
					Example notification banner
				</a>
				<br>
				<br>
				<a style="color: var(--mainText); font-size: 125%; transition: color 0.15s ease;" href="#" onclick="">
					TODO: Notification.requestPermission()
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
		</div>
	</div>
	<div class="foot">
		<a href="https://github.com/andrewthegreat5/andrewthegreat5.github.io/tree/php-sql-version" target="_blank"
			rel="noopener">GitHub</a>
		<p>Author: Andrew Blake</p>
		<p>Version 5.0.6 php</p>
	</div>
</body>

</html>