<!DOCTYPE html>
<html lang="en">

<head>
	<?php include "php/head.php";?>
	<?php
     	if (isset($_POST["page"]) && !isset($_GET["title"])) {
    		$page = $_POST["page"];
    		$title = $_POST["page"];
    		$main_para1 = $_POST["main_para1"];
			$image1 = $_POST["image1"];
			$para1 = $_POST["para1"];
			$intent = '';


    		$sql = "INSERT INTO pages (page, title, main_para1, image1, para1)
    		VALUES ('$page', '$title', '$main_para1', '$image1', '$para1')";
			
    		if ($conn->query($sql) === true) {
				echo 	"<script type='text/javascript'>",
    				"setTimeout(function () { createUIPrompt('Club created', 'Dismiss');}, 50);",
    				"</script>"
					;
    		} else {
    		    $error = addslashes($conn->error);
    		    echo 	"<script type='text/javascript'>",
    				"setTimeout(function () { createUIPrompt('Error Creating club: $error', 'Dismiss');}, 50);",
    				"</script>"
    		           ;
    		}
		 } 

		elseif (isset($_GET["edit"])) {
			$dest = $_GET['edit'];
			$intent = '?title='.$dest.'';
		
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

		elseif (isset($_GET["title"])) {
			$target=$_GET["title"];
			$main_para1=$_POST["main_para1"];
			$image1=$_POST["image1"];
			$para1=$_POST["para1"];
			$intent = '?title='.$target.'';

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

		} else {
			$title="";
			$main_para1="";
			$image1="";
			$para1="";
			$intent="";
		 }
	?>

</head>

<body>
	<div id="mySidenav" class="sidenav"></div>
	<div class="wrapper">
		<div class="titleRow">
			<h1 class="title">KKC clubs</h1>
			<div class="signin">
				<p>You are not signed in</p>
				<a href="settings.php#login">
					<p>Sign in</p>
				</a>
			</div>
		</div>
		<div class="bodyContainer">
			<form class="bodyText" action="addclub.php<?php echo $intent;?>" method="post" autocomplete="off">
				<div class="form__group field">
					<input type="input" class="form__field" placeholder="Title" value="<?php echo $title?>" name="page" id="first name" required />
					<label for="first name" class="form__label">title</label>
				</div>
				<div class="form__group field">
					<textarea type="input" class="form__field" placeholder="main_para1" name="main_para1" id="last name" required><?php echo $main_para1?></textarea>
					<label for="last name" class="form__label">main para 1</label>
				</div>
				<div class="form__group field">
					<input type="input" class="form__field" placeholder="image1" value="<?php echo $image1?>" name="image1" id="age" required />
					<label for="age" class="form__label">image 1</label>
				</div>
				<div class="form__group field">
					<textarea type="input" class="form__field" placeholder="para1" name="para1" id="last name" required><?php echo $para1?></textarea>
					<label for="last name" class="form__label">para 1</label>
				</div>
				<div style="margin-top: 2vh;">
					<input type="submit" value="Submit">
				</div>
			</form>
		</div>
	</div>
</body>

</html>