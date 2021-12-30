
<!DOCTYPE HTML>
<?php
     include "server.php";
  //    include "Store_imgid.php";
    $_SESSION['imageid'] = $_GET['id'];
  //  echo $id;
 ?>
  <html>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <body onload = "load()">
      <h1>This service will cost $40<h1>
      <div class="billing_info" id="billing">
      <a href="payment.php" class="w3-text-teal waves-effect waves-light" style="text-align:center">Choose a different radiologist?</a>
      <form method="post" id="bill" action="insert_billing_info.php?">
        <div class="form__group">
          <input type="text" placeholder="Name" class="form__input" name="name" required/>
        </div>
        <div class="form__group">
         <input type="text" placeholder="Credit Card Number" class="form__input" name="ccnum" required/>
        </div>
        <div class="form__group">
          <input type="date" placeholder="exp" class="form__input" name="exp" required />
        </div>
        <div class="form__group">
          <input type="text" placeholder="CVC" class="form__input" name="cvv" required/>
        </div>
        <button class="btn" type="submit" name="Submit" id="Submit">Register</button>
      </form>
      </div>
  </body>
</html>
<script>
  function load(){
  let thisemail = sessionStorage.getItem('thisemail');
  document.getElementById("bill").action="insert_billing_info.php?q="+thisemail;
}
</script>
