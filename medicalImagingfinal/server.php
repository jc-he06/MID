<?php
     include "login_validation.php";
     include "sql_connection.php";

     if($conn->query("SELECT DATABASE()")){

       $dbSuccess =true;
    //
      $result = $conn->query("SELECT DATABASE()");
      $row = $result->fetch_row();
  //  printf("Default database is %s.\n", $row[0]);
        $result->close();
    }


  //  $user_email = $_SESSION['rad_email'];



?>
