<!DOCTYPE html>
<html lang="en">

<head>
	<?php include "php/head.php"; ?>

	<?php
	$dest = $_GET['dest'];

	$sql = "SELECT * FROM clubs WHERE title='$dest';";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();

		$title = $row["title"];
		$main_para1 = $row["main_para1"];
		$para1 = $row["para1"];
	} else {
		echo "0 results";
	}
	?>
	<script>
		let i = 2;

		function setMax(val) {
			window.setInterval(function() {
				if (i > val) {
					i = 1;
				}
				let view = "slide-" + i;
				if (window.matchMedia('(orientation: landscape)').matches) {
					document.getElementById(view).scrollIntoView({block: 'nearest', inline: 'nearest'});
					i++;
				}
			}, 4000);
		}
	</script>
</head>

<body>
	<div id="myNavbar" class="navbar"></div>
	<?php include "php/notif.php"; ?>
	<div class="wrapper">
		<?php
		$head = "$title";
		include "php/titlerow.php";
		?>
		<div class="bodyContainer">
			<div class="bodyText">
				<?php print $main_para1 ?>
			</div>
		</div>
		<div class="ImgContainer">
			<div class="bodyImg" id="slideshow">
				<?php
				$sql = "SELECT * FROM clubs INNER JOIN images ON clubs.id=images.club_id WHERE title='$dest';";
				$result = $conn->query($sql);
				$i = 0;
				if ($result->num_rows > 0) {
					// output data of each row
					while ($row = $result->fetch_assoc()) {
						$image = $row['image'];
						$desc = $row['description'];
				?>
						<img src="<?php echo $image ?>" alt="<?php echo $desc ?>" id="slide-<?php echo ++$i ?>">
					<?php
					}
				}
				$sql = "SELECT * FROM clubs INNER JOIN images ON clubs.image1=images.id WHERE title='$dest';";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					// output data of each row
					while ($row = $result->fetch_assoc()) {
						$image = $row['image'];
						$desc = $row['description'];
					?>
						<img src="<?php echo $image ?>" alt="<?php echo $desc ?>">
				<?php
					}
					echo "<script>",
						"setMax($i);",
						"</script>";
				}
				?>
			</div>
			<div class=" bodyText TextImg">
				<?php print $para1 ?>
			</div>
		</div>
	</div>
	<?php include "php/footer.php" ?>
</body>

</html>