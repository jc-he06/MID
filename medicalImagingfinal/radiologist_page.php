<?php
     // Create connection
     include 'server.php';
     $user_email = $_SESSION['rad_email'];
  //   $name = $row1['name'];
?>

<link rel="stylesheet" href="radiologist_page_style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<html lang="en">
<meta charset="UTF-8">
<title>User Home Page</title>
<meta name="viewport" content="width=device-width,initial-scale=1">

<body>

  <!-- <div class="w3-display-container" style="width:600px" >
    <div class="w3-container w3-cursive w3-teal">
            <a href="login2.php" class="w3-text-white waves-light w3-button" style="text-align:center">Sign out</a> -->


<div class="w3-display-container" style="width: 600px" >
  <div class="w3-bar w3-teal">
    <a href="login2.php" class="w3-text-white waves-effect waves-light w3-button" style="text-align:center">Sign out</a>

        <img src="doc.png" style="width:100%">
        <h1 style="text-align: center">
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
           ?></br> Radiologist</h1>



                 <!-- <div class="w3-container"> -->


             <div class="w3-container w3-card w3-white">
              <a href="radiologist_profile_page.php" class="w3-bar-item w3-button fa fa-star fa-fw w3-margin-right w3-xlarge w3-text-teal waves-light" style="width:100px text-align:center">Profile</a>
              <a href="view_appointment.php" class="w3-bar-item w3-button fa fa-certificate fa-fw w3-center w3-xlarge w3-text-teal" style="width:100px text-align:center">View Appointment</a>
              <a href="retrieve_image.php" class="w3-bar-item w3-button fa fa-diamond fa-fw w3-margin-left w3-xlarge w3-text-teal" style="width:100px text-align:center">View Image</a>
              </div>


            <!-- </div> -->

           </div>
           </div>

          <!-- <div class="w3-container">
            <div class="w3-container w3-card w3-white">
          	      <a href="radiologist_profile_page.php" class="w3-bar-item w3-button fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal" style="width:300px text-align:center text-color: teal">Profile</a><br>
            	    <a href="view_appointment.php" class="w3-bar-item w3-button fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal" style="width:200px text-align:center">View Appointment</a><br>
          	      <a href="retrieve_image.php" class="w3-bar-item w3-button fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal" style="width:200px text-align:center">view</a><br>
            </div>
        </div>
    </div>

</div> -->

</body>
</html>
