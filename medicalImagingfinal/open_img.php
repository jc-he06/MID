<!DOCTYPE html>
<?php
// Create connection
    include_once './server.php';
    $imageid = $_GET['q'];
?>
<html>
	<body>
		<div>
		<?php
			$sql = "SELECT imgdata, feedback FROM image WHERE imageid = $imageid";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($result);
			echo "<a class=dlbutton href='./uploads/".$row['imgdata']."' download> Click here to download this image <br></a>";
			echo "<img src='./uploads/".$row['imgdata']."' alt='Oh no! this image is not loading'>";
			echo "<div>".$row['feedback']."</div>";
        ?>
    	</div>
	</body>
</html>