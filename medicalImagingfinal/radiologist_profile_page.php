<?php
// Create connection
    include_once './server.php';
//   $name = $row1['name'];
    $user_email = $_SESSION['rad_email'];
 ?>
<html>
<title>Profile Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">

    <!-- Left Column -->
    <div class="w3-third">
      <a href="radiologist_page.php" class="w3-text-teal waves-effect waves-light w3-button" style="text-align:center">Back to home page</a>


      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          <img src="./doc.png" style="width:100%" alt="Avatar"><br><br>
        </div>

        <div class="w3-container">

            <h2 class="w3-text-teal">
              <?php
                    $sql = "SELECT * FROM radiologist where radiologist_email = '$user_email';";
                    //querying code to database
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if($resultCheck >0){
                        $row = mysqli_fetch_assoc($result);
                            echo $row['first_name'];
                            echo " ";
                            echo $row['last_name'];

                    }
               ?>
            </h2>


          <p class="w3-text-teal"><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal" class="w3-text-teal"></i>Radiologist</p>
          <p class="w3-text-teal"><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal" class="w3-text-teal"></i>
            <?php
                  $sql = "SELECT * FROM radiologist where radiologist_email = '$user_email';";
                  //querying code to database
                  $result = mysqli_query($conn,$sql);
                  $resultCheck = mysqli_num_rows($result);

                  if($resultCheck >0){
                      $row = mysqli_fetch_assoc($result);
                          echo $row['radiologist_email'];

                  }
             ?>
          </p>
          <p class="w3-text-teal"><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal" class="w3-text-black"></i>
            <?php

                  $sql = "SELECT * FROM radiologist where radiologist_email = '$user_email';";
                  //querying code to database
                  $result = mysqli_query($conn,$sql);
                  $resultCheck = mysqli_num_rows($result);

                  if($resultCheck >0){
                      $row = mysqli_fetch_assoc($result);
                          echo $row['phone_number'];

                  }
             ?>
          </p>
          <hr>
          <p><!--spot--></p>



          <br>

          <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i><!--spot--></b></p>
          <p><!--spot--></p>
          <div class="w3-light-grey w3-round-xlarge">

          </div>
          <p><!--spot--></p>
          <div class="w3-light-grey w3-round-xlarge">

          </div>
          <p><!--spot--></p>
          <div class="w3-light-grey w3-round-xlarge">

          </div>
          <br>
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">

      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Radiologist's Bio</h2>
        <div class="w3-container">
            <!-- Bio should be here -->
            <h2 class="w3-text-grey"><i class="w3-text-teal">
            <?php
                  $sql = "SELECT * FROM radiologist where radiologist_email = '$user_email';";
                  //querying code to database
                  $result = mysqli_query($conn,$sql);
                  $resultCheck = mysqli_num_rows($result);

                  if($resultCheck >0){
                      $row = mysqli_fetch_assoc($result);
                          echo $row['bio'];

                  }
             ?>
        </div>
      </div>


    <!-- End Right Column -->
    <a href="radiologist_profile_modify_page.php" class="w3-text-teal waves-effect waves-light w3-button" style="text-align:center">Modify Profile</a>
    </div>

  <!-- End Grid -->

  </div>

  <!-- End Page Container -->
</div>
<br><br><br><br><br><br><br><br>
<footer class="w3-container w3-teal w3-center w3-margin-top">
  <p class="w3-text-white w3-padding-16">Medical Image System</p>
</footer>

</body>
</html>
