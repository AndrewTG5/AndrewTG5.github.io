<!DOCTYPE html>
<html lang="en">

<head>
	<?php include "php/head.php";?>
	<?php
     	if (isset($_POST["page"])) {
    		$page = $_POST["page"];
    		$title = $_POST["page"];
    		$mpara1 = $_POST["main_para1"];
			$image1 = $_POST["image1"];
			$para1 = $_POST["para1"];


    		$sql = "INSERT INTO pages (page, title, main_para1, image1, para1)
    		VALUES ('$page', '$title', '$mpara1', '$image1', '$para1')";
			
    		if ($conn->query($sql) === true) {
				echo 	"<script type='text/javascript'>",
    				"setTimeout(function () { createUIPrompt('Club created', 'Dismiss');}, 50);",
    				"</script>"
					;
    		} else {
    		    $error = addslashes($conn->error);
    		    echo 	"<script type='text/javascript'>",
    				"setTimeout(function () { createUIPrompt('Error Creating club: $error', 'Dismiss');}, 50);",
    				"</script>"
    		           ;
    		}
		 } else {
			$title="title";
			$mpara1="main para 1";
			$image1="image 1";
			$para1="para 1";
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
			<form class="bodyText" action="addclub.php" method="post">
				<div class="form__group field">
					<input type="input" class="form__field" placeholder="Title" name="page" id="first name"
						required />
					<label for="first name" class="form__label"><?php echo $title?></label>
				</div>
				<div class="form__group field">
					<textarea type="input" class="form__field" placeholder="main_para1" name="main_para1" id="last name"
						required></textarea>
					<label for="last name" class="form__label"><?php echo $mpara1?></label>
				</div>
				<div class="form__group field">
					<input type="input" class="form__field" placeholder="image1" name="image1" id="age" required />
					<label for="age" class="form__label"><?php echo $image1?></label>
				</div>
				<div class="form__group field">
					<textarea type="input" class="form__field" placeholder="para1" name="para1" id="last name"
						required></textarea>
					<label for="last name" class="form__label"><?php echo $para1?></label>
				</div>
				<div style="margin-top: 2vh;">
					<input type="submit" value="Submit">
				</div>
			</form>
		</div>
	</div>
</body>

</html>