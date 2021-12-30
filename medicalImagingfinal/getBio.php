<?php
include "server.php";
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "medical_imaging";

 // Create connection
 $mysqli = mysqli_connect($servername,$username,$password,$database_name);

 if($mysqli->connect_error){
    die("Connection failed: " . $mysqli->connect_error);
 }

$sql = "SELECT first_name, last_name, bio, radiologist_email, phone_number FROM radiologist WHERE radiologist_email = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($fname, $lname, $thebio,$email,$num);
$stmt->fetch();
$stmt->close();

echo "<div id=first_name>";
echo $fname;
echo " ";
echo $lname;
echo "<br>";
echo "Email: ";
echo $email;
echo "<br>";
if($num){
    echo "Phone Number: ";
    echo $num;
}
echo "<br><br>";
echo "</div>";
echo "<div style=text-align:left>";
echo $thebio;
echo "<div";

$_SESSION['radiologist_email']= $email;
 ?>
