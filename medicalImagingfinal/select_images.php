<!DOCTYPE html>
<?php
// Create connection
    include_once './server.php';
    $thisemail = $_SESSION['pat_email'];
?>
<html>
  <link rel="stylesheet" href="style_patient_images.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <body>
  	<a href="payment.php">back</a>
  	<h1 class="w3-text-teal waves-effect waves-light">Select the images you wish to recieve feedback on:</h1>

      <div class="gallery">
  		<?php
      $sql = "SELECT imgdata, imageid, rad_email FROM image WHERE pat_email = '$thisemail'";
  		//querying code to database
  		$result = mysqli_query($conn,$sql);
  		$resultCheck = mysqli_num_rows($result);
  		if($resultCheck >0){
  			while($row = mysqli_fetch_assoc($result)){
  				if($row['rad_email'] == ""){
	  				$img = $row['imgdata'];
	          		$imgid = $row['imageid'];
	  				echo "<div class=gallery_item>";
	  				echo "<img src='./uploads/".$img."' alt='Oh no! this image is not loading' width=600 height=400>";
	          		echo "<button id=image_select onclick=choose_img(".$imgid.")>Select this image?</button></div>";
          		}
        	}
          }
        ?>
    	</div>
  </body>
</html>

<script>
  function choose_img(id){
  var xhttp = new XMLHttpRequest();

  xhttp.open("GET", "Store_imgid.php?id="+id, true);
  xhttp.send();
  document.location.href = "./billing.php?id=" +id;
  document.location.href = "https://buy.stripe.com/test_aEU1686ayeQS7EA288";
  //$_SESSION['imageid'] = id;
  }
</script>
