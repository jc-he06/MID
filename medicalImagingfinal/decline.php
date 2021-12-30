<?php
    include 'sql_connection.php';

    $email = $_GET['email'];
    $sql = "DELETE FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "Account has been declined";
    }else{
        echo mysqli_connect_error();
    }
?>