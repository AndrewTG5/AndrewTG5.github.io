<!DOCTYPE html>
<html lang="en">

<head>
	<?php include "php/head.php"; ?>
	<?php
	if (isset($_POST["page"]) && !isset($_GET["title"])) {
		//	submitting a new club
		$title = $conn->real_escape_string($_POST["page"]);
		$main_para1 = $conn->real_escape_string($_POST["main_para1"]);
		$image1 = $_POST["image1"];
		$para1 = $conn->real_escape_string($_POST["para1"]);
		$intent = '';

		$sql = "INSERT INTO pages (title, main_para1, image1, para1)
    		VALUES ($title', '$main_para1', '$image1', '$para1')";

		if ($conn->query($sql) === true) {
			echo 	"<script>",
				"setTimeout(function () { createUIPrompt('Club created');}, 50);",
				"</script>";
		} else {
			$error = addslashes($conn->error);
			echo 	"<script>",
				"setTimeout(function () { createUIPrompt('Error Creating club: $error');}, 50);",
				"</script>";
		}
	} elseif (isset($_GET["edit"])) {
		//	when editing a club
		$dest = $_GET['edit'];
		$intent = '?title=' . $dest . '';

		$sql = "SELECT * FROM pages WHERE title='$dest'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();

			$title = $row["title"];
			$main_para1 = $row["main_para1"];
			$para1 = $row["para1"];
			$image1 = $row["image1"];
		}
	} elseif (isset($_GET["title"])) {
		// submitting an edited club
		$target = $_GET["title"];
		$title = $target;
		$main_para1 = $_POST["main_para1"];
		$image1 = $_POST["image1"];
		$para1 = $_POST["para1"];
		$intent = '?title=' . $target . '';

		$dmain_para1 = $conn->real_escape_string($_POST["main_para1"]);
		$dpara1 = $conn->real_escape_string($_POST["para1"]);

		$sql = "UPDATE pages SET main_para1='$dmain_para1', image1='$image1', para1='$dpara1' WHERE title='$target'";

		if ($conn->query($sql) === true) {
			echo 	"<script>",
				"setTimeout(function () { createUIPrompt('Club updated');}, 50);",
				"</script>";
		} else {
			$error = addslashes($conn->error);
			echo 	"<script>",
				"setTimeout(function () { createUIPrompt('Error updating club: $error');}, 50);",
				"</script>";
		}
		$sql = "SELECT * FROM pages WHERE title='$target'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();

			$title = $row["title"];
			$main_para1 = $row["main_para1"];
			$para1 = $row["para1"];
			$image1 = $row["image1"];
		}
	} else {
		//	when adding a blank club
		$title = "";
		$main_para1 = "";
		$image1 = "";
		$para1 = "";
		$intent = "";
	}
	?>

</head>

<body>
	<div id="mySidenav" class="sidenav"></div>
	<div class="wrapper">
		<?php
		$head = "Add/edit club";
		include "php/titlerow.php";
		?>
		<div class="bodyContainer">
			<form class="bodyText" action="addclub.php<?php echo $intent; ?>" method="post" autocomplete="off">
				<div class="form__group field">
					<input type="input" class="form__field" placeholder="Title" value="<?php echo $title ?>" name="page" id="title" required />
					<label for="title" class="form__label">Title (max 40)</label>
				</div>
				<div class="form__group field">
					<textarea type="input" placeholder="paragraph 1" name="main_para1" id="mpara1" required><?php echo $main_para1 ?></textarea>
				</div>
				<div style="margin-top: 2vh;">
					<label for="club" style="color: var(--mainText)">Image 1</label>
					<select id="club" name="club">
						<?php
						$sql = "SELECT * FROM images";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								$image = $row["image"];
								$name = $row["name"];
						?>
								<option value="<?php echo $image ?>" <?php if ($image == $image1) {
																			echo 'selected="selected"';
																		} ?>><?php echo $name ?></option>
						<?php
							}
						}
						?>
					</select>
				</div>
				<div class="form__group field">
					<textarea type="input" placeholder="paragraph 2" name="para1" id="para1" required><?php echo $para1 ?></textarea>
				</div>
				<input type="submit" value="Submit">
				<input type="button" style="margin-top: 0" onclick="window.location.href = 'clubs.php'" value=" Cancel">
			</form>
		</div>
	</div>
</body>

</html>