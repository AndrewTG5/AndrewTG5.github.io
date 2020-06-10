<!DOCTYPE html>
<html lang="en">

<head>
	<?php include "php/head.php"; ?>
	<?php
	if (isset($_GET["date"])) {
		$date = $_GET["date"];

		$sql = "DELETE FROM news WHERE date='$date'"; //sec_user needs delete permissions
		if ($conn->query($sql) === TRUE) {
			echo     "<script>",
				"setTimeout(function () { createUIPrompt('News deleted');}, 50);",
				"</script>";
		} else {
			$error = addslashes($conn->error);
			echo     "<script>",
				"setTimeout(function () { createUIPrompt('Error deleting news: $error');}, 50);",
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
			<div class="bodyText">
				<p>This website showcases clubs available to join in Katikati College.</p>
				<p>There are more than 2 clubs available, click the Clubs button or <a href="clubs.php">here</a> to see
					the full list of them</p>
			</div>
			<div class="bodyText">
				<h1>News</h1>
				<?php if ($_SESSION["loggedin"] == 1) {
					echo '<a href="addnews.php" style="font-size: 1.25em;">Create new</a>';
				} ?>
				<?php
				$sql = "SELECT * FROM news";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					// output data of each row
					while ($row = $result->fetch_assoc()) {
						$date = $row["date"];
						$content = $row["content"];
				?>
						<h3><?php echo $date ?></h3>
						<?php if ($_SESSION["loggedin"] == 1) {
							echo '<a href="index.php?date=' . $date . '" style="float: right">Delete</a>';
						}?>
						<p><?php echo $content ?></p>
				<?php
					}
				}
				?>
			</div>
		</div>
	</div>
</body>

</html>