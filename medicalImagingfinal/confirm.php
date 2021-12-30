<?php
 include 'sql_connection.php';
 $email = $_GET['email'];

 $sql = "UPDATE users SET verified = 1 WHERE email = '$email'";

$result = mysqli_query($conn, $sql);
if($result){
    echo "Account has been verified";
    
}
else{
    echo mysqli_connect_error();
}
?>