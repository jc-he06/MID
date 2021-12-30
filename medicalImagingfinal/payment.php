<!DOCTYPE html>
<?php
// Create connection
    include_once './server.php';
    $rad_email = "";
?>
<html>
  <link rel="stylesheet" href="style_patient.css">
  <link rel="stylesheet" href="radiologist_page_style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <body>
    <a href="profilePat.php">back</a>
    <div class="pick_radiologist">
      <div class ="select">
        <div class="dropdown">
          <button id="dropbtn" onclick="toggleDropdown()" class="dropbtn">Click Here to choose a different radiologist</button>
          <div id="myDropdown" class="dropdown-content">
            <input class="search-bar" type="text" placeholder="Search.." id="searchInput" onkeyup="filterFunction()">
              <?php
              $sql = "SELECT * FROM radiologist";
              $result = mysqli_query($conn,$sql);
              $resultCheck = mysqli_num_rows($result);
              if($resultCheck >0){
                while($row = mysqli_fetch_assoc($result)){
                  echo "<a id=radiologists onclick=loadBio('";
                  echo $row['radiologist_email'];
                  echo "')>";
                  echo $row['first_name'];
                  echo ' ';
                  echo $row['last_name'];
                  echo "</a>";
                }
              }
              ?>
          </div>
        </div>
      </div>
      <div id="info" class="bio">
        Select a Radiologist!
      </div>
    </div>
      <button id="choose" onclick="select_images()" class="dropbtn">Choose this radiologist?</button>
  </body>
</html>
<script type="text/javascript">
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function toggleDropdown() {
  document.getElementById("myDropdown").classList.toggle("hide");
  document.getElementById("dropbtn").classList.toggle("show");
  document.getElementById("choose").classList.toggle("show");
  document.getElementById("info").innerHTML="Select a Radiologist";
}

function select_images(){
  sessionStorage.setItem("rad_email", $rad_email);
  document.location.href = "select_images.php";
}

function loadBio(email){
  if (email == "") {
    document.getElementById("info").innerHTML = "";
    return;
  }
  $rad_email = email;
  toggleDropdown();
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("info").innerHTML = this.responseText;
    }
  xhttp.open("GET", "getBio.php?q="+email);
  xhttp.send();
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
</script>
