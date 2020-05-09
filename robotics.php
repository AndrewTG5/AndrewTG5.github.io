<!DOCTYPE html>
<html lang="en">

<head>
	<?php include "php/head.php"; ?>

	<?php include "php/setup.php"; 
		$sql = "SELECT * FROM pages WHERE page='robotics'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
			$row = $result->fetch_assoc(); 
		
			//for debugging
			//print_r($row);
		
			$title=$row["title"];
			$main_para1=$row["main_para1"];
			$para1=$row["para1"];
			$image1=$row["image1"];
		
		} else {
		    echo "0 results";
		}
		$conn->close();
	?>
</head>

<body>
	<div>
		<h1 class="title"><?php print $title?></h1>
	</div>
	<div id="mySidenav" class="sidenav"></div>
	<div class="wrapper">
		<div class="bodyContainer">
			<div class="bodyText">
				<?php print $main_para1?>
			</div>
		</div>
		<div class="ImgContainer">
			<?php print $image1?>
			<div class="bodyText TextImg">
				<?php print $para1?>
			</div>
		</div>
	</div>
</body>

</html>