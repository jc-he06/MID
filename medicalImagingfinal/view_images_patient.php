<!DOCTYPE html>
<?php
// Create connection
    include_once './server.php';

    $thisemail = $_SESSION['pat_email'];
  //  echo $thisemail;
?>
<html>
  <link rel="stylesheet" href="style_patient_images.css">
  <link rel="stylesheet" href="radiologist_page_style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <body>
  	<a class="w3-text-teal waves-effect waves-light w3-button" style="text-align:center" href="profilePat.php">back</a>
  	<h1>Your medical images:</h1>
    <p>View all the images that have been uploaded by your primary doctor</p><br><p id="rad"></p>
  	<h2>Click on an image to view feedback or download the image</h2>
  		<div class="gallery">

  		<?php
		$sql = "SELECT imgdata, imageid FROM image WHERE pat_email = '$thisemail'";
      $result = mysqli_query($conn,$sql);
    		$resultCheck = mysqli_num_rows($result);


        if($resultCheck>0){
    			while($row = mysqli_fetch_assoc($result)){
    				$img = $row['imgdata'];
    				echo "<div class=gallery_item><a target=_blank href=open_img.php?q=".$row['imageid'].">";
    				echo "<img src='uploads/".$img."' alt='Oh no! this image is not loading' width=600 height=400></a></div>";
    			  }
        }

        ?>
    	</div>
  </body>
</html>
