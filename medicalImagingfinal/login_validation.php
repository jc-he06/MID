<?php
    session_start();
    if(isset($_POST["save"])){

        extract($_POST);
    include 'sql_connection.php';
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql=mysqli_query($conn,"SELECT * FROM users WHERE email='$email' and password='$password'");
    $row  = mysqli_fetch_array($sql);
    $type = mysqli_query($conn,"SELECT type FROM users WHERE email='$email' and password='$password'");
    $user_type = mysqli_fetch_assoc($type);
    $confirm = mysqli_query($conn,"SELECT verified FROM users WHERE email='$email' and password='$password'");
    $verified = mysqli_fetch_assoc($confirm);


    if(is_array($row))
    {
      if($verified["verified"] == 1){
       if($user_type['type'] == "doctor"){
         $_SESSION['doctor_email'] = $email;
        header("Location: profileDoc.php");
       }
       if($user_type['type'] == "patient"){
         $_SESSION['pat_email'] = $email;
        header("Location: profilePat.php");
       }
       if($user_type['type'] == "radiologist"){
         $_SESSION['rad_email'] = $email;
        header("Location: radiologist_page.php");
        exit();
       }
      }
      else{
        echo $verified;
      }

    }
    else
    {
        echo "Invalid Email ID/Password\n";
        echo "Or Account Not Yet Verified\n";
        ?> <a href="login2.php">Try Again</a><?php

    }


}
?>
