<?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "medical_imaging";
     
     // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);
     if ($conn->connect_error) {
          die("Connection failed: " . mysqli_connect_error());
        }

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$user_type = $_POST['user_type'];

//patient does not have these inputs so must check type before loading them
if($user_type != 'patient'){ 
  $hospital = $_POST['hospital'];;
  $provider_id = $_POST['provider_id'];;
}

// verify only 1 email
$stmt = $conn->prepare("SELECT * FROM users WHERE email=(?) LIMIT 1");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

//$sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
//$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo $errors['email'] = "Email already exists";
    ?> <a href='registration.html'>Try Again</a> <?php
}


else{

  $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, type) VALUES (?,?,?,?,?)");
  $stmt->bind_param("sssss", $fname, $lname, $email, $password, $user_type);
  if (!$stmt->execute()) {
  echo "Invalid Entry <a href = './registration.html'>try again</a>";
  exit;
  }

  if($user_type == 'patient'){
    //mysqli_query($conn,"INSERT INTO patient (first_name, last_name, patient_email) VALUES ('$fname', '$lname', '$email')");
    $stmt = $conn->prepare("INSERT INTO patient (first_name, last_name, patient_email) VALUES (?,?,?)");
    $stmt->bind_param("sss", $fname, $lname, $email);
    if (!$stmt->execute()) {
      echo "Invalid Entry <a href = './registration.html'>try again</a>";
      exit;
    }
  }

  elseif($user_type == 'doctor'){
    //mysqli_query($conn,"INSERT INTO primarydoctor (first_name, last_name, primarydoctor_email) VALUES ('$fname', '$lname', '$email')");
    $stmt = $conn->prepare("INSERT INTO primarydoctor (first_name, last_name, primarydoctor_email, hospital, provider_id) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss", $fname, $lname, $email, $hospital, $provider_id);
    if (!$stmt->execute()) {
      echo "Invalid Entry <a href = './registration.html'>try again</a>";
      //echo("Error: ". $stmt->error);
      exit;
    }
  }
  
  elseif($user_type == 'radiologist'){
    //$sql = "INSERT INTO radiologist (first_name, last_name, radiologist_email) VALUES ('$fname', '$lname', '$email')";
    //mysqli_query($conn,$sql);
    $stmt = $conn->prepare("INSERT INTO radiologist (first_name, last_name, radiologist_email, hospital, provider_id) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss", $fname, $lname, $email, $hospital, $provider_id);
    if (!$stmt->execute()) {
      echo "Invalid Entry <a href = './registration.html'>try again</a>";
      //echo("Error: ". $stmt->error);
      exit;
    }
  }  
    /* Will add back later*/
    $message = "A new registration occurred for a $user_type.\n
    Name: $fname $lname
    Hospital: $hospital
    Provider ID: $provider_id
    Please confirm by using the link below \n
    localhost/medicalImaging/confirm.php?email=$email \n
    Decline by using link below \n
    localhost/medicalImaging/decline.php?email=$email ";
    $to = 'medicalimagingsolutions21@gmail.com';
    $subject = 'New Registration';
    $from = 'From: $email';
    
    $retval = mail ($to,$subject,$message,$from);
         
    if( $retval == true ) {
       echo "Message sent successfully...";

       header("Location: login2.php");
    }else {
       echo "Message could not be sent...";
    }

    

    
  echo "Successfully registered! <a href = './login2.php'>Click here to go back to login</a>";
}
?>