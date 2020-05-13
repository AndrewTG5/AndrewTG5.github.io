<!DOCTYPE html>
<html lang="en">

<head>
	<?php include "php/head.php"; ?>

	<?php
		if (isset($_GET["edit"])) {
    	    $dest = $_GET['edit'];
		
    	    $sql = "SELECT * FROM pages WHERE page='$dest'";
    	    $result = $conn->query($sql);

    	    if ($result->num_rows > 0) {
    	        $row = $result->fetch_assoc();
			
    	        $title=$row["title"];
    	        $main_para1=$row["main_para1"];
    	        $para1=$row["para1"];
    	        $image1=$row["image1"];
    	    } else {
    	        echo "0 results";
    	    }
			$conn->close();
		}
    ?>
	<?php
		if (isset($_GET["title"])) {
			$target=$_GET["title"];
			$main_para1=$_POST["main_para1"];
			$image1=$_POST["image1"];
			$para1=$_POST["para1"];

			$sql = "UPDATE pages SET main_para1='$main_para1', image1='$image1', para1='$para1' WHERE title='$target'";
			
    		if ($conn->query($sql) === true) {
				echo 	"<script type='text/javascript'>",
    				"setTimeout(function () { createUIPrompt('Club updated', 'Dismiss');}, 50);",
    				"</script>"
					;
    		} else {
				$error = addslashes($conn->error);
    		    echo 	"<script type='text/javascript'>",
    				"setTimeout(function () { createUIPrompt('Error updating club: $error', 'Dismiss');}, 50);",
    				"</script>"
    		           ;
			}
			$sql = "SELECT * FROM pages WHERE title='$target'";
    	    $result = $conn->query($sql);
		
    	    if ($result->num_rows > 0) {
    	        $row = $result->fetch_assoc();
			
    	        $title=$row["title"];
    	        $main_para1=$row["main_para1"];
    	        $para1=$row["para1"];
    	        $image1=$row["image1"];
    	    } else {
    	        echo "0 results";
    	    }
			$conn->close();

		}
	?>
</head>

<body>
	<div id="mySidenav" class="sidenav"></div>
	<div class="wrapper">
		<div class="titleRow">
			<h1 class="title"><?php print $title;?></h1>
			<div class="signin">
				<p>You are not signed in</p>
				<a href="settings.php#login">
					<p>Sign in</p>
				</a>
			</div>
		</div>
		<form action="clubpageedit.php?title=<?php echo $title ?>" method="post">
			<div class="bodyContainer">
				<textarea type="input" class="bodyText" name="main_para1">
					<?php print $main_para1?>
				</textarea>
			</div>
			<div class="ImgContainer">
				<textarea type="input" name="image1">
					<?php print $image1?>
				</textarea>
				<textarea type="input" class="bodyText TextImg" name="para1">
					<?php print $para1?>
				</textarea>
			</div>
			<input type="submit" value="Submit">
		</form>
	</div>
	<!--TODO: add other boxes-->
</body>

</html>