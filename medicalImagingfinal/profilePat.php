<!DOCTYPE html>
<?php
// Create connection
    include_once './login_validation.php';
    include 'sql_connection.php';
    $thisemail = $_SESSION['pat_email'];
    $feedbackcount = 0;
    //this should be done with ajax
    $sql = "SELECT feedback FROM image WHERE pat_email='$thisemail'";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck >0){
      while($row = mysqli_fetch_assoc($result)){
        $feedback = $row['feedback'];
        if($feedback != "")
          $feedbackcount += 1;
      }
    }

        $_SESSION['pat_email'] = $thisemail;
?>
<html>

    <link rel="stylesheet" href="radiologist_page_style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <body>
    <html lang="en">
<meta charset="UTF-8">
<title>User Home Page</title>
<meta name="viewport" content="width=device-width,initial-scale=1">

<body>
  <div class="w3-display-container" style="width: 500px" >

    <div class="w3-bar w3-teal">
      <a href="login2.php" class="w3-text-white waves-effect waves-light w3-button" style="text-align:center">Sign out</a>
    <img src="patient.png" style="width:100%">
      <h1 style="text-align: center">
              <?php
              $sql = "SELECT first_name, last_name FROM users WHERE email = '$thisemail'";
              $result = mysqli_query($conn,$sql);
              $row = mysqli_fetch_assoc($result);
                  echo $row['first_name'];
                  echo ' ';
                  echo $row['last_name'];
              ?><br>Patient</h1>

      <div class="w3-container">


  <div class="w3-container w3-card w3-white">
   <a href="view_images_patient.php" class="w3-bar-item w3-button fa fa-diamond fa-fw w3-margin-right w3-xlarge w3-text-teal" style="width:200px text-align:center">View Images Uploaded</a>
   <a href="payment.php" class="w3-bar-item w3-button fa fa-star fa-fw w3-margin-right w3-xlarge w3-text-teal" style="width:200px text-align:center">Purchase Interpretation</a>
   </div>


 </div>

</div>
</div>
  </body>

</html>
<script>
  function load(){
      sessionStorage.setItem("thisemail", "'patient@gmail.com'");
      if(<?php echo $feedbackcount ?>>0)
        document.getElementById("rad").innerHTML="You have recieved feedback on "+<?php echo $feedbackcount ?>+" of your images!";
  }
  window.addEventListener("load", load());
</script>
