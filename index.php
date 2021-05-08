<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<title>Home Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
.hback {background-image:url(pexels-pixabay-259027.jpg) }
.wide {
  width:100%;
  height:200%;
  height:calc(100% - 50px);
  
  background-size:cover;
}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
  
    <a href="userlist.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Users</a>
    <a href="transaction.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Transaction History</a>
 
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
   
    <a href="userlist.php" class="w3-bar-item w3-button w3-padding-large">User list</a>
    <a href="transaction.php" class="w3-bar-item w3-button w3-padding-large">Transaction History</a>

  </div>
</div>

<!-- Header -->
<header  class="w3-container w3-red w3-center hback wide" style="padding:128px 16px" >
    
    <h1 class="w3-margin w3-jumbo"><strong>Sparks Bank</strong </h1><br>
  
  <a href="userlist.php" class="btn btn-primary w3-red w3-padding-large w3-large">see users</a>
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
      <h1>Feature 1 : See Users</h1>
      <h5 class="w3-padding-32">In this website you can view all bank users and their respective names,id and bank balance.</h5>

      <p class="w3-text-grey"></p>
    </div>

    <div class="w3-third w3-center" style="font-size: 170px">
     <i class="fa fa-users fa-6x w3-text-red"></i>
    </div>
  </div>
</div>

<!-- Second Grid -->
<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-third w3-center " style="font-size: 200px">
      <i class="fa fa-credit-card fa-7x w3-text-red"></i>
    </div>

    <div class="w3-twothird">
      <h1>Feature 2: See transaction details</h1>
      <h5 class="w3-padding-32">You can also view the transaction details like the sender,receiver and the amount of money that was transferred between them.</h5>

      <p class="w3-text-grey"></p>
    </div>
  </div>
</div>



<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity">  
  <div class="w3-xlarge w3-padding-32">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
 </div>
 <p>Developed by Rahul R. All rights reserved.</p>
</footer>

<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html>
