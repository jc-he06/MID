<?php
include_once './login_validation.php';
include 'sql_connection.php';
  $thisemail = $_SESSION['doctor_email'];
  ?>
<html>

    <link rel="stylesheet" href="style_doc.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <body>
    <!-- <div class="topnav">
      <a class="active" href="profileDoc.php">Home</a>
      <a class="active" href="login2.php">Sign Out</a>
    </div> -->
  <!-- <h1>Welcome Doctor</h1> -->
  <!-- <div class="container">
  <div class="card">
    <div class="text">
      <h3><b><a href="doctorUploadPage.php">Upload Image</b></h3>
    </div>
  </div>
  </div> -->
<div class="w3-display-container" style="width: 500px" >

  <div class="w3-bar w3-teal">
    <a href="login2.php" class="w3-text-white waves-effect waves-light w3-button" style="text-align:center">Sign out</a>
  <img src="doc_page.png" style="width:100%">
    <h1 style="text-align: center">
            <?php
            $sql = "SELECT first_name, last_name FROM users WHERE email = '$thisemail'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
                echo $row['first_name'];
                echo ' ';
                echo $row['last_name'];
            ?><br>Doctor</h1>

    <div class="w3-container">


<div class="w3-container w3-card w3-white">
 <a href="doctorUploadPage.php" class="w3-bar-item w3-button fa fa-diamond fa-fw w3-margin-right w3-xlarge w3-text-teal" style="width:200px text-align:center">View Images Uploaded</a>

 </div>


</div>

</div>
</div>


  </body>


</html>
