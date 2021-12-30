<?php

$servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "medical_imaging";
     
     // Create connection
     $conn = mysqli_connect($servername, $username, $password, $dbname);
     if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }


    $targetDir = "uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    $email = $_POST["email"];
    $hospital = $_POST['hospital'];



    if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database
                $insert = $conn->query("INSERT into image (pat_email, imgData, uploadDate) VALUES ('$email', '$fileName', NOW())");
               // mysqli_query($conn,"UPDATE primarydoctor SET hospital = '$hospital' WHERE primarydoctor_email = '$_SESSION['doctor_email']'");
                if($insert){
                    $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                    header("Location: profileDoc.php");
                }else{
                    //$statusMsg = "File upload failed";
                    die(mysqli_error($conn));
                } 
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }else{
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        }
    }else{
        $statusMsg = 'Please select a file to upload.';
    }

    echo $statusMsg;

    ?>
    