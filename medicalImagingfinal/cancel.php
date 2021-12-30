<?php

    include 'server.php';
    $pat_email= $_GET['pat_email'];
    $rad_email =$_GET['rad_email'];
    $appointment_id =$_GET['appointment_id'];
    // echo $pat_email;
    // echo "<br>";
    // echo $rad_email;

      $sql1 = "DELETE FROM appointment WHERE radiologist_email = '$rad_email' AND appointment_id='$appointment_id' AND patient_email='$pat_email';";
      $result = mysqli_query($conn,$sql1);

      if($result){
?>

          <div class="w3-panel w3-green">
          <h3>Success!</h3>
          <p>You have successfully cancel this appointment!</p>
          </div>

<?php
        }else{
?>
          <div class="w3-panel w3-red">
          <h3>Error!</h3>
          <p>Something wrong happens!</p>
          </div>
<?php
      }

      echo "<br /><hr /><br />";
      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
      echo '<a href="view_appointment.php">Back</a><br />';

 ?>



 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <link rel="stylesheet" href="radiologist_page_style.css">
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
