<?php
    include "server.php";
  //  echo $_SESSION['radiologist_email'];
 ?>
<!DOCTYPE HTML>
<script type ='text/javascript'>
  function insertRadEmail(){
  let remail = sessionStorage.getItem('rad_email');
  let id = <?php echo $_SESSION['imgid']; ?>
  const xhttp = new XMLHttpRequest();
  xhttp.open("GET", "insertRadEmail.php?remail="+remail+"&id="+id);
  xhttp.send();
  //document.body.innerHTML = "test";
  }
</script>
<html>
<body>
  <?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "medical_imaging";

     // Create connection
     $conn = mysqli_connect($servername, $username, $password, $dbname);
     if (!$conn){
          die("Connection failed: " . mysqli_connect_error());
        }

//$ccnum = $_POST['ccnum'];
//$cvv = $_POST['cvv'];
//$exp = $_POST['exp'];
//$mail = $_GET['q'];
$pat_email = $_SESSION['pat_email'];
$rad_email = $_SESSION['radiologist_email'];
$imageid = $_SESSION['imgid'];

$sql = "INSERT INTO payment(pat_email, card_number, cvv, expiration_date) VALUES ('$mail', '$ccnum', '$cvv', '$exp')";

$flag=1;

// if (mysqli_query($conn, $sql)) {
//      echo "Payment successful!";
//      echo "<script type='text/javascript'>"."insertRadEmail();"."</script>";
//      echo("<a href= profilePat.php>back</a>");
//      $flag=1;
//    }
// else {
//      echo "Invalid Entry try again<br>";
//      echo("<a href=billing.php>back</a>");
//    }




   if($flag==1){
     $sql1 =  "INSERT INTO appointment(radiologist_email,patient_email,comfirm_time,imageid) VALUES('$rad_email','$pat_email',now(), '$imageid');";
     $result=mysqli_query($conn,$sql1);
?>
       <div class="w3-panel w3-green">
       <h3>Success!</h3>
       <p>Appointment is comfirmed!</p>
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
   echo '<a href="profilePat.php">Back to Profile Page</a><br />';
?>
</body>
</html>

<link rel="stylesheet" href="radiologist_page_style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
