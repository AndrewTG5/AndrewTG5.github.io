<!DOCTYPE html>
<html lang="en">

<head>
	<?php include "php/head.php"; ?>
	<?php include "php/sw_module.php"; ?>

	<?php include "php/setup.php"; 
		$sql = "SELECT * FROM pages";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
			$row = $result->fetch_assoc(); 
		
			//for debugging
			//print_r($row);
		
			$title1=$row["title1"];
			$para1=$row["para1"];
			$para2=$row["para2"];
			$image1=$row["image1"];
		
		} else {
		    echo "0 results";
		}
		$conn->close();
	?>
</head>

<body>
	<div>
		<h1 class="title"><?php print $title1?></h1>
	</div>
	<div id="mySidenav" class="sidenav"></div>
	<div class="wrapper">
		<div class="bodyContainer">
			<div class="bodyText">
				<?php print $para1?>
			</div>
		</div>
		<div class="ImgContainer">
			<img src="img/<?php print $image1?>" alt="evolocity logo" class="bodyImg">
			<div class="bodyText TextImg">
				<?php print $para2?>
			</div>
		</div>
	</div>
</body>

</html>