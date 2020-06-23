<!DOCTYPE html>
<html lang="en">

<head>
	<?php include "php/head.php"; ?>
	<?php
	if (isset($_POST["content"])) {
		$content = $_POST["content"];

		$sql = "INSERT INTO news (content)
    		VALUES ('$content')";

		if ($conn->query($sql) === true) {
			echo 	"<script>",
				"setTimeout(function () {createUIPrompt('News created');}, 50);",
				"</script>";
		} else {
			$error = addslashes($conn->error);
			echo 	"<script>",
				"setTimeout(function () { createUIPrompt('Error creating news: $error');}, 50);",
				"</script>";
		}
	}
	?>
	<script src="https://cdn.tiny.cloud/1/u1vfk8m72ii6gn3b521dfnuyvi517yjvhpc11gijfk2r1m0k/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	<script>
		tinymce.init({
			selector: 'textarea'
		});
	</script>
</head>

<body>
	<div id="mySidenav" class="sidenav"></div>
	<div class="wrapper">
		<?php
		$head = "Create news";
		include "php/titlerow.php";
		?>
		<div class="bodyContainer">
			<form class="bodyText" action="addnews.php" method="post" autocomplete="off">
				<div class="form__group field">
					<textarea type="input" class="form__field" placeholder="some news" name="content" id="content"></textarea>
				</div>
				<input type="submit" value="Submit">
			</form>
		</div>
	</div>
	<?php include "php/footer.php" ?>
</body>

</html>