<?php

include_once "radiologist_profile_modify_page.php";
include_once "server.php";

if ($dbSuccess) {


        // be careful the module inside the $_POST[] is the td name of the form from radiologist_profile_modify_page.php
        if(isset($_POST['Fname'])&& isset($_POST['Lname'])&&isset($_POST['Phone_number'])&& isset($_POST['Bio'])&&isset($_POST['Password'])){
          $Fname = $_POST['Fname'];
          $Lname = $_POST['Lname'];
          $Phone_number = $_POST['Phone_number'];
          $Bio = $_POST['Bio'];
          $Password = $_POST['Password'];
        }else{
          echo "something wrong with data fetching";
        }

            // SQL Query
            $sql = "UPDATE radiologist SET first_name = '$Fname', last_name = '$Lname', phone_number ='$Phone_number' ,bio='$Bio' WHERE radiologist_email = '$user_email';";
            //Execute Query
            $result= mysqli_query($conn,$sql);

            $sql1 = "UPDATE users SET password = '$Password' WHERE email = '$user_email';";
            $result1 =mysqli_query($conn,$sql1);

        if($result && $result1){
?>

            <div class="w3-panel w3-green">
            <h3>Success!</h3>
            <p>You have successfully updated you profile!</p>
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


}
echo "<br /><hr /><br />";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo '<a href="radiologist_page.php">Back to main page</a><br />';

 ?>
