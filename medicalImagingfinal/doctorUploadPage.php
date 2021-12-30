<?php
?>
<html>

    <a class="w3-text-teal waves-effect waves-light w3-button" href="profileDoc.php">Home</a>

  <h1 class="w3-text-teal waves-effect waves-light">Patient Image Upload</h1>
  <link rel="stylesheet" href="style_doc.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="file-upload">

  <div>
    <form action="doctorUpload.php" method="post" enctype="multipart/form-data" style="align: center">
      <input class="w3-text-teal" type="file" name="file" id="file"><br><br>
    <label class="w3-text-teal" for="email">Enter email of patient</label>
      <input type="text" id="email" name="email" value="">
      <input class="w3-text-teal waves-effect waves-light w3-button" type="submit" name="submit" value="Submit">
    </form>
  </div>

</div>

</html>
