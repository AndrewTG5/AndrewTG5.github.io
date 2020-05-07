<!DOCTYPE html>
<html lang="en">

<head>
	<?php include "php/head.php"; ?>
	<?php include "php/sw_module.php"; ?>
</head>

<body>
	<div>
		<h1 class="title">Sign up</h1>
	</div>
	<div id="mySidenav" class="sidenav"></div>
	<div class="wrapper">
		<div class="bodyContainer">
			<div class="bodyText">
				<div class="form__group field">
					<!--TODO: naming conventions-->
					<input type="input" class="form__field" placeholder="First name" name="first name" id="first name"
						required />
					<label for="first name" class="form__label">First name</label>
				</div>
				<div class="form__group field">
					<input type="input" class="form__field" placeholder="last ame" name="last name" id="last name"
						required />
					<label for="last name" class="form__label">Last name</label>
				</div>
				<div class="form__group field">
					<input type="input" class="form__field" placeholder="Age" name="age" id="age" required />
					<label for="age" class="form__label">Age</label>
				</div>
				<form style="margin-top: 2vh;">
					<label for="club">Club</label>
					<select id="club" name="club">
						<option value="evolocity">Evolocity</option>
						<option value="robotics">Robotics</option>
						<option value="club3">Club 3</option>
					</select>

					<input type="submit" value="Submit">
				</form>
			</div>
		</div>
	</div>
</body>

</html>