<!DOCTYPE html>
<html>
<body>
    <link rel="stylesheet" href="viewImages_style.css">
<div class="topnav">
      <a class="active" href="profilePat.html">Home</a>
    </div>

    <h1> Patient Images</h1>


<form method="post">
  <label for="fname">Please enter email:</label><br>
  <input type="text" id="email" name="email" value="Email"><br>
  <input type="submit" name="submit" value="Submit">
</form> 
</body>
</html>

<?php
 include 'sql_connection.php';
 $query = $conn->query("SELECT * FROM images WHERE email='patient@gmail.com' ORDER BY uploadDate DESC");

 if($query->num_rows > 0){
     while($row = $query->fetch_assoc()){
         $imageURL = 'uploads/'.$row["imgData"];
        ?>
        <img src="<?php echo $imageURL; ?>" alt="" />
        <?php }
 } else{?>
 <p>No Images found </p><?php } ?>


