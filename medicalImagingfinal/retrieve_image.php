

<?php
// Include the database configuration file
  require_once 'server.php';

?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<h1>View Medical Images</h1>
    (Enter the registered email address of the patient)<br><br><br>
<form method="post" action="retrieve_image.php" enctype="multipart/form-data">
  <td>Email:             <input name="email" type="text"  placeholder="email" /></td>
  <input type="submit" name="submit">
</form>


<?php
  if (isset($_POST['submit'])) {
        $email = $_POST['email'];
  //      $_SESSION['patient_email'] = $email;
?>


  <html>
    <link rel="stylesheet" href="style_patient_images.css">
    <body>
    	<h1>Your medical images:</h1>
    	<h2>Click on an image to add feedback or download the image</h2>
    		<div class="gallery">

    		<?php
        		$sql = "SELECT imgdata, imageid FROM image WHERE pat_email = '$email'";
        		$result = mysqli_query($conn,$sql);
        		$resultCheck = mysqli_num_rows($result);

      			while($row = mysqli_fetch_assoc($result)){

      	//		echo "<img src='./uploads/".$row['imgdata']."'> <br>";
        $img = $row['imgdata'];
        echo "<div class=gallery_item><a target=_blank href=add_feedback.php?ID=".$row['imageid'].">";
        echo "<img src='uploads/".$img."' alt='Oh no! this image is not loading' width=600 height=400></a></div>";
          }
          ?>
      	</div>
    </body>
  </html>

<?php

  }



?>

<!-- <form method="POST" action="add_feedback.php?ID=<? //php echo $row['imageid']?>" enctype="multipart/form-data">
  <?php //$_SESSION['image_data']= $row['imgdata']; ?>
  <textarea name="feedback" cols="40" rows="4" placeholder="add your feedback right here..."/></textarea>
 <input type="submit" name="upload" value="Upload"/>
</form> -->


<footer class="w3-container w3-grey w3-center w3-margin-top"><br><br><br><br><br><br>
<a href="radiologist_page.php" class="w3-text-black waves-effect waves-light w3-button" style="text-align:center">Back to home page</a>
