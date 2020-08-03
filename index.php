<!DOCTYPE html>
<html lang="en">

<head>
	<?php include "php/head.php"; ?>
	<?php
	// delete news prepared statement
	$delnews = $conn->prepare("DELETE FROM news WHERE id=?");
	$delnews->bind_param("i", $id);

	if (isset($_GET["id"])) {
		$id = $_GET["id"];

		if ($delnews->execute()) {
			echo     "<script>",
				"setTimeout(function () { createUIPrompt('News deleted');}, 50);",
				"</script>";
		} else {
			$error = addslashes($conn->error);
			echo     "<script>",
				"setTimeout(function () { createUIPrompt('Failed to delete news: $error');}, 50);",
				"</script>";
		}
		$delnews->close();
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
			//	creates index image gallery
			const imgSrc = ['img/e1.jpg', 'img/e2.jpg', 'img/r1.jpg', 'img/r2.jpg', 'img/r3.jpg', 'img/r4.jpg', 'img/r5.jpg', 'img/r6.jpg', 'img/r7.jpg'];
			const imgTitle = ['Evolocity solar powered trike', 'Evolocity race day', 'Robotics robot scoring', 'Robotics robot collecting rings', 'Robotics tweaking the robot', 'Robotics climbing course', 'Robotics team designing and building in the holidays', 'Robotics Katikati competes in Palmerston North', 'Robotics robot climbing the ladder'];
			let i;
			for (i = 0; i < imgSrc.length; i++) {
				const div = document.createElement('div');
				const inDiv = document.createElement('div');
				const img = document.createElement('img');
				div.className = "gallery";
				inDiv.className = "desc";
				img.className = "gImg";
				img.alt = "";
				div.appendChild(img);
				div.appendChild(inDiv);
				inDiv.innerHTML = imgTitle[i];
				img.src = imgSrc[i];
				document.getElementById('gallery').appendChild(div);
			}
		})
	</script>
	<style>
		.gallery {
			position: relative;
			overflow: hidden;
			height: 15vw;
		}

		.gImg {
			position: absolute;
			top: 50%;
			transition: transform 0.25s ease;
			transform: translateY(-50%) scale(1);
		}

		.desc {
			position: absolute;
			width: 100%;
			height: 100%;
			padding: 10% 0;
			font-size: 1.25em;
			transform: translateY(-100%);
			color: var(--mainText);
			background-color: var(--mainIMG);
			transition: transform 0.25s ease;
			text-shadow: var(--Tshadow8);
		}

		.gallery:hover .desc {
			transform: translateY(0);
		}

		.gallery:hover .gImg {
			transform: translateY(-50%) scale(2);
		}

		@media (orientation: portrait) {
			/* portrait view */

			.gallery {
				height: 35vw;
			}
		}
	</style>
</head>

<body>
	<div id="myNavbar" class="navbar"></div>
	<?php include "php/notif.php"; ?>
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
				<h2>News</h2>
				<?php if ($_SESSION["loggedin"] == 1) {
					echo '<a href="addnews.php">Create new</a>';
				} ?>
				<?php
				$sql = "SELECT * FROM news ORDER BY id DESC";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					// output data of each row
					while ($row = $result->fetch_assoc()) {
						$date = date("F j, Y g:i a", strtotime($row["date"]));
						$content = $row["content"];
						$id = $row["id"];
				?>
						<h3><?php echo $date ?></h3>
						<?php if ($_SESSION["loggedin"] == 1) {
							echo '<a href="index.php?id=' . $id . '" style="float: right">Delete</a>';
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
	<?php include "php/footer.php" ?>
</body>

</html>