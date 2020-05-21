<!DOCTYPE html>
<html lang="en">

<head>
	<?php include "php/head.php"; ?>

	<?php
	$dest = $_GET['dest'];

	$sql = "SELECT * FROM pages WHERE title='$dest'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();

		$title = $row["title"];
		$main_para1 = $row["main_para1"];
		$para1 = $row["para1"];
		$image1 = $row["image1"];
	} else {
		echo "0 results";
	}
	$conn->close();
	?>
</head>

<body>
	<div id="mySidenav" class="sidenav"></div>
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
			<img src="img/<?php print $image1 ?>" alt="" class="bodyImg">
			<div class="bodyText TextImg">
				<?php print $para1 ?>
			</div>
		</div>
	</div>
	<!--TODO: add other boxes-->
</body>

</html>