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
	<style>
		.indexContainer {
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-orient: horizontal;
			-webkit-box-direction: normal;
			-ms-flex-direction: row;
			flex-direction: row;
			-webkit-box-pack: start;
			-ms-flex-pack: start;
			justify-content: flex-start;
			-webkit-box-align: start;
			-ms-flex-align: start;
			align-items: flex-start;
			margin-top: 6vh;
		}

		.newsBody {
			width: 50%;
			flex: 2 1;
		}

		.newsBox {
			width: 20%;
			float: right;
		}

		@media (orientation: portrait) {
			.indexContainer {
				display: -webkit-box;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-orient: vertical;
				-webkit-box-direction: normal;
				-ms-flex-direction: column;
				flex-direction: column;
				-webkit-box-pack: start;
				-ms-flex-pack: start;
				justify-content: flex-start;
				-webkit-box-align: center;
				-ms-flex-align: center;
				align-items: center;
				margin-top: 2vh;
			}

			.newsBody,
			.newsBox {
				float: none;
				flex: 1;
				width: 86%;
				margin-right: 0;
				margin-left: 0;
				display: block;
			}
		}
	</style>
	<script>
		document.addEventListener('DOMContentLoaded', (_event) => {
			const imgSrc = ['img/e1.jpg', 'img/e2.jpg', 'img/r1.jpg', 'img/r2.jpg', 'img/r3.jpg', 'img/r4.jpg', 'img/r5.jpg', 'img/r6.jpg', 'img/r7.jpg'];
			const imgTitle = ['Evolocity', 'Evolocity', 'Robotics', 'Robotics', 'Robotics', 'Robotics', 'Robotics', 'Robotics', 'Robotics'];
			let i;
			for (i = 0; i < imgSrc.length; i++) {
				const div = document.createElement('div');
				const inDiv = document.createElement('div');
				const img = document.createElement('img');
				div.className = "gallery";
				inDiv.className = "desc";
				img.alt = "";
				div.appendChild(img);
				div.appendChild(inDiv);
				inDiv.innerHTML = imgTitle[i];
				img.src = imgSrc[i];
				document.getElementById('gallery').appendChild(div);
			}
		})
	</script>
</head>

<body>
	<div id="mySidenav" class="sidenav"></div>
	<div class="wrapper">
		<?php
		$head = "KKC clubs";
		include "php/titlerow.php";
		?>
		<div class="indexContainer">
			<div class="bodyText newsBody">
				<h2>Welcome to KKC clubs</h2>
				<p>This website showcases clubs available to join in Katikati College.</p>
				<p>There are more than 2 clubs available, click the Clubs button or <a href="clubs.php">here</a> to see
					the full list of them</p>
			</div>
			<div class="bodyText newsBox">
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
						$date = date("F j, Y g:i a", strtotime($row["date"]));
						$content = $row["content"];
				?>
						<h3><?php echo $date ?></h3>
						<?php if ($_SESSION["loggedin"] == 1) {
							echo '<a href="index.php?date=' . $date . '" style="float: right">Delete</a>';
						} ?>
						<p><?php echo $content ?></p>
				<?php
					}
				}
				?>
			</div>
		</div>
		<div class="galleryContainer" id="gallery">
		</div>
	</div>
</body>

</html>