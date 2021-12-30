<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database_name = "medical_imaging";

     // Create connection
	$conn = new mysqli($servername,$username,$password,$database_name);

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $r_email = $_GET['remail'];
    $id = $_GET['id'];

    $sql = "UPDATE image set rad_email='$r_email' WHERE imageid = $id";
    if ($conn->query($sql) === TRUE) {
  	echo "record updated successfully";
	} else {
  	echo "Error: " . $sql . "<br>" . $conn->error;
	}

$conn->close();
?>