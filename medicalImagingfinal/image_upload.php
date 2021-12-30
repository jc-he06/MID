<?php
    include_once "server.php";
  //$conn = mysqli_connect("localhost","root","","medical_image_system");
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

      <link rel = "stylesheet" type="text/css" href="imgae_upload_style.css">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div id = "content">
        <form method="post" action="image_upload.php" enctype="multipart/form-data">
            <input type="hidden" name="size" value="1000000">
                <div>
                    <input type="file" name="image">
                </div>
                <tr>
                  <!--td name is Email right here-->
                  <td>Email:             <input name="Email" type="text"  placeholder="email" /></td>
                </tr>
                <div>

                </div>

                <div>
                    <button type="submit" name="upload" value="Upload"/>Upload</button>
                </div>
        </form>
    </div>
    <a href="radiologist_page.php" class="w3-text-teal waves-effect waves-light w3-button" style="text-align:center">Back to home page</a>
  </body>
</html>


<?php
// if upload button is pressed
//
if(isset($_POST['upload'])){
  $Email = $_POST['Email'];
  $Image = $_FILES['image']['name'];  // the file name
//  $Feedback = $_POST['feedback'];
  $target = "./uploads/".basename($Image);  // setting the destination file where the images will be uploaded

  $sql = "INSERT INTO image(imgdata, pat_email, uploaddate) VALUES('$Image','$Email', NOW());";
  $result = mysqli_query($conn, $sql);

  if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
      $msg = "Image upload successfully.";
  }else{
      $msg="Error";
  }
}
//
//  $result = mysqli_query($conn, "SELECT * FROM image");


 ?>
