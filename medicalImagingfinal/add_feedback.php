<link rel="stylesheet" href="radiologist_page_style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php
    include "server.php";
  //  session_start();

    $imageid= $_GET['ID'];
    echo "Image ID: ";
    echo $imageid;
    echo "<br>";
    $sql = "SELECT * FROM image WHERE imageid = '$imageid'";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);

    while($row = mysqli_fetch_assoc($result)){

    $img = $row['imgdata'];
    echo "<img src='./uploads/".$row['imgdata']."'> <br>";
    $feedback = $row['feedback'];
  }
?>

 <form method="POST"  enctype="multipart/form-data">
   <textarea name="feedback" cols="40" rows="4" placeholder="
   <?php if(!$feedback){echo "add your feedback right here...";}?>">
  <?php if($feedback){echo $feedback;  }?>

  </textarea>

  <input type="submit" name="upload" value="Upload"/>
 </form>


<?php
    if(isset($_POST['feedback'])){
      $fb  = $_POST['feedback'];
      $sql = "UPDATE image SET feedback = '$fb' WHERE imageid = '$imageid'";
      $result = mysqli_query($conn,$sql);

      if($result){
?>
        <div class="w3-panel w3-green">
        <h3>Success!</h3>
        <p>You have successfully added feedback!</p>
        </div>

<?php
      }else{
        mysqli_error($conn);
?>
        <div class="w3-panel w3-red">
        <h3>Error!</h3>
        <p>Something wrong happens!</p>
        </div>

<?php
      }
    }


 ?>





  <a href="retrieve_image.php" class="w3-text-black waves-effect waves-light w3-button" style="text-align:center">View Image</a>
  <a href="radiologist_page.php" class="w3-text-black waves-effect waves-light w3-button" style="text-align:center">Home</a>
  <a href="view_appointment.php" class="w3-text-black waves-effect waves-light w3-button" style="text-align:center">View Appointment </a>
