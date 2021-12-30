<?php
// Create connection
    include_once 'server.php';
    $user_email = $_SESSION['rad_email'];
?>

<title>Profile Modify Page</title>
<link rel="stylesheet" href="radiologist_page_style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<h2 class="w3-text-black w3-bar-item " style="width:200px text-align:center">
                 User Information Update
             </h2>

  <form class="col s12" action="modify_update.php" method="post">
    <?php
          // retrieve data from database, using the information the database already has of certain user as the default information of that user
          $sql = "SELECT * FROM radiologist where radiologist_email = '$user_email';";
          $Fname="";
          $Lname="";
          $Phone_number="";
          $Bio="";
        //querying code to database
          $result = mysqli_query($conn,$sql);
          $resultCheck = mysqli_num_rows($result);
          //
          while($row = mysqli_fetch_assoc($result)){
                    $Fname = $row['first_name'];
                    $Lname = $row['last_name'];
                    $Phone_number= $row['phone_number'];
                    $Bio = $row['bio'];

        }

          $sql1 = "SELECT * FROM users where email = '$user_email';";
          $result1 = mysqli_query($conn,$sql1);
          $resultCheck1 = mysqli_num_rows($result1);
          //
          while($row = mysqli_fetch_assoc($result1)){
                    $Password = $row['password'];
                    //
        }
     ?>
     <!-- <input type="hidden" name="infoID" value="$Id"/> -->
      <table>
        <tr>
          <!--td name is Name-->

          <td>First Name:    <input name="Fname" type="text"  placeholder="first name"  value= <?php echo $Fname; ?> ></td>

        </tr>

        <tr>
          <!--td name is Name-->

          <td>Last Name:    <input name="Lname" type="text"  placeholder="last name"  value= <?php echo $Lname; ?> ></td>

        </tr>


        <tr>
          <!--td name is Email right here-->

          <td>Password:     <input name="Password" type="password" id="myInput"  value=<?php echo $Password; ?> >
          <input type="checkbox" onclick="myFunction()">Show

              <script>
                      function myFunction() {
                          var x = document.getElementById("myInput");
                          if (x.type === "password") {
                            x.type = "text";
                          } else {
                            x.type = "password";
                          }
                        }
                </script>
        </td>
        </tr>


        <tr>
          <!--td name is Phone_number right here-->

          <td>Phone Number:<input name="Phone_number" type="text"  placeholder="(xxx)-xxx-xxxx"  value= <?php echo $Phone_number; ?> ></td>
          </tr>

      <!-- <form action = "/cgi-bin/hello_get.cgi" method = "get"> -->
        <tr>
                 <br>
                 <!--td name is Bio right here-->
                 <textarea rows = "5" cols = "60" name = "Bio"/>
    <?php echo $Bio; ?>
                 </textarea><br>

            <!-- </form> -->
        </tr>

        <tr>
        <td align="right"><input type="submit" value="update" /></td>
        </tr>
</table>

  <a href="radiologist_profile_page.php" class="w3-text-black waves-effect waves-light w3-button" style="text-align:center">Back to profile page</a>

    </form>
