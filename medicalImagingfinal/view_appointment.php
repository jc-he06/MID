
<?php
    include "server.php";
    $rad_email = $_SESSION['rad_email'];
      $sql1 = "SELECT * FROM appointment WHERE radiologist_email = '$rad_email'";
      $result = mysqli_query($conn, $sql1);
      $patient_email = '';
      $time = '';
 ?>
<!DOCTYPE html>
<html>
 <head>
  <title>View Appointment</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="radiologist_page_style.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
   <a href="radiologist_page.php" class="w3-text-teal waves-effect waves-light w3-button" style="text-align:center">Back to home page</a>

  <br /><br />
  <div class="container">
   <nav class="navbar navbar-inverse">
    <div class="container-fluid">
     <div class="navbar-header">
      <a class="navbar-brand" href="#">Appointment</a>
     </div>
     <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
       <a href="appointment_fetch.php" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span>
          <span class="glyphicon glyphicon-envelope" style="font-size:18px;"></span> notification</a>
          <ul class="dropdown-menu">
            <?php
            if(mysqli_num_rows($result)>0){

                while($row=mysqli_fetch_array($result)){
                    $appointment_id = $row['appointment_id'];
                    $patient_email = $row['patient_email'];
                    $_SESSION['pat_email_appointment'] = $patient_email;
                    $imageid = $row['imageid'];
            ?>

            <a class="dropdown-content" style="width: 50px;" href="appointment_fetch.php?email=<?php echo $patient_email; ?> & appointment_id=<?php echo $appointment_id; ?>">
              <?php

                    $sql2 = "SELECT * FROM image WHERE imageid = '$imageid' ";
                    $result2 = mysqli_query($conn, $sql2);

                    if(mysqli_num_rows($result2)>0){
                        while($row=mysqli_fetch_array($result2)){
                              $feedback = $row['feedback'];
                              if($feedback){
                                echo $appointment_id;
                                echo ". ";
                                echo $patient_email;
                                echo " (Feedback added)";
                              }else{
                                echo $appointment_id;
                                echo ". ";
                                echo $patient_email;
                              }
                        }
                    }
                  ?>

            </a>
            <br>
            ______________________
            <?php
                  }
                }
             ?>

          </ul>
      </li>
     </ul>
    </div>
   </nav>

  </div>
 </body>
</html>
