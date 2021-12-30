<a href="view_appointment.php" class="w3-text-black waves-effect waves-light w3-button"> Back </a>
<br><br>

Here is your appointments:
<br><br>
          <?php
            include "server.php";

              $patient_email = $_GET['email'];
              $rad_email = $_SESSION['rad_email'];
              $appointment_id = $_GET['appointment_id'];
              $sql1 = "SELECT * FROM appointment WHERE radiologist_email = '$rad_email' AND patient_email='$patient_email' AND appointment_id = '$appointment_id';";
              $result1 = mysqli_query($conn, $sql1);


              if(mysqli_num_rows($result1)){
                  while($row=mysqli_fetch_array($result1)){
                    $imageid = $row['imageid'];
                    $patient_email = $row['patient_email'];
                    $comfirm_time = $row['comfirm_time'];
                    $sql2 = "SELECT * FROM image WHERE imageid = '$imageid' ";
                    $result2 = mysqli_query($conn, $sql2);

                        if(mysqli_num_rows($result2)>0){
                            while($row=mysqli_fetch_array($result2)){

                                          $feedback = $row['feedback'];
                                          echo "--------------------------------------------------------------------------------------------------------------------------------------------";
                                          echo "<br>";
                                          echo "Appointment ID: ";
                                          echo $appointment_id;
                                          echo "<br>";
                                          echo "Patient Email: ";
                                          echo $patient_email;
                                          echo "<br>";
                                          echo "Image id: ";
                                          echo $row['imageid'];
                                          echo "<br><br>";
                                          echo "Image Link: ";
                                          echo "<a target=_blank href=add_feedback.php?ID=".$row['imageid'].">Open the image</a>";
                                          echo "<br><br>";
                                          echo "Appointment Comfirmed Date: ";
                                          echo $comfirm_time;
                                          echo "<br><br>";

                                          if($feedback){
                                              echo "Image's feedback:  ";
                                              echo $feedback;
                                              echo "<br>";
                                          }

                                          echo "-------------------------------------------------------------------------------------------------------------------------------------------";
                                          echo "<br><br><br><br>";

                          }
                        }
                  }
                }


              // $data = array(
              //     'notification' => $output,
              //     'unseen_notification' => $count
              // );
              //echo json_encode($data);


           ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<link rel="stylesheet" href="radiologist_page_style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<br><br>
<a href="retrieve_image.php" class="w3-text-black waves-effect waves-light w3-button">Add Feedback</a>
<a class="w3-text-black waves-effect waves-light w3-button" href="cancel.php?pat_email=<?php echo $patient_email; ?>&rad_email=<?php echo $rad_email; ?>&appointment_id=<?php echo $appointment_id ?>">Cancel This Appointment</a>
