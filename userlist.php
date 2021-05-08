
<?php
session_start();
 include 'connection.php';
 $conn = Connect();

if (isset($_POST['submit'])) {
    $from=$_POST['from'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from user where name='$from'";
    $query = mysqli_query($conn, $sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from user where name='$to' ";
    $query = mysqli_query($conn, $sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount) < 0) {
        echo '<script>';
        echo ' alert("Oops! Negative values cannot be transferred")';  
        echo '</script>';
    }



    // constraint to check insufficient balance.
    else if ($amount > ($sql1['balance'])) {

        echo '<script>';
        echo ' alert("Bad Luck! Insufficient Balance")';  
        echo '</script>';
    }



    // constraint to check zero values
    else if (($amount) == 0) {

        echo '<script>';
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    } else {

        // deducting amount from sender's account
        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE user set balance=$newbalance where name='$from'";
        mysqli_query($conn, $sql);


        // adding amount to reciever's account
        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE user set balance=$newbalance where name='$to'";
        mysqli_query($conn, $sql);
        
        //updating transaction table
         $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $sql = "INSERT INTO `transaction`(`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$amount')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "<script> alert('Transaction Successful');
                                     window.location='transaction.php';
                           </script>";
        }
       

        $newbalance = 0;
        $amount = 0;
    }
}
?>



<html lang="en">
<title>User List</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type = "text/css" href ="css/userlist.css">
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

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 80%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}


#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #4CAF50;
  color: white;
}
#customers td {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
 
}
.center {
  margin-left: auto;
  margin-right: auto;
}

</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
   
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Users</a>
    <a href="transaction.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Transaction History</a>
 
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">

    <a href="userlist.php" class="w3-bar-item w3-button w3-padding-large">User list</a>
    <a href="transaction.php" class="w3-bar-item w3-button w3-padding-large">Transaction History</a>

  </div>
</div>

    
<header  class="w3-container w3-white w3-center" style="padding:50px 10px" >
    
    <h1 class="w3-margin w3-jumbo "><strong style="color:green">User List</strong </h1><br>
  
 
</header>
<?php
   
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);

    ?>

<!--table list-->



<table id="customers" class="center">
  <tr>
    <th>user id</th>
    <th>Name</th>
    <th>e-mail id</th>
    <th>bank balance</th>
    <th>Operation</th>
  </tr>
 <?php
                            if (isset($result)) {
                            while ($rows = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr style="color : black;">
                                    <td class="center py-2"><?php echo (isset($rows['id']) ? $rows['id'] : ''); ?></td>
                                    <td class="center py-2"><?php echo (isset($rows['name']) ? $rows['name'] : ''); ?></td>
                                    <td class="center py-2"><?php echo (isset($rows['email']) ? $rows['email'] : ''); ?></td>
                                    <td class="center py-2"><?php echo (isset($rows['balance']) ? $rows['balance'] : ''); ?></td>
                                    <td> <button id= "<?php echo $rows['id'];?>" type="button" class="btn " onclick="openForm()">Transfer</button></td>
                                </tr>
                            <?php
                            }
                        }
                            ?>
</table>



 <div class="form-popup" id="myForm">
  <form action="" method="post" class="form-container">
    <h1>transaction</h1>

    <label ><b>from</b></label>
    <input type="text" placeholder="Enter text" name="from" id="from" required>
    
    
    <label ><b>send to</b></label>
    <input type="text" placeholder="Enter text" name="to" id="to" required>
        
               
                
            

    <label for="psw"><b>amount</b></label>
    <input type="number" placeholder="Enter number" name="amount" id="amount" required>

    <button type="submit" name="submit" class="btn">transfer</button>
    <button type="submit" name="close" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
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
  if (x.className.indexOf("w3-show") === -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}


</script>

</body>
</html>


