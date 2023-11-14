<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop List</title>
</head>

<style>

<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 510px;
  left: 700px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 370px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

tr:hover {background-color: #009879 ;}

* {
  font-family: sans-serif; /* Change your font family */
}

.content-table {
  border-collapse: collapse;
  margin: 25px 20px;
  font-size: 0.9em;
  min-width: 600px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table thead tr {
  background-color: #009879;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 20px 15px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 5px solid #009879;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}
h1{
  text-align: center;
  color: green;
}

</style>


<body>
<h1>Shop List</h1>
<button class="open-button" onclick="openForm()">Add Shop</button>

<div class="form-popup" id="myForm">
  <form action="/DBMSPRO/Admin_Tra.php" class="form-container" method="post">
    <h1>Add Shop</h1>

    <label for="email"><b>Shop Name</b></label>
    <input type="text" placeholder="Enter Shop Name" name="shop_name" required>

    <label for="psw"><b>Shop Location</b></label>
    <input type="text" placeholder="Enter Shop Location" name="shop_location" required>

    <label for="psw1"><b>Shop Email</b></label>
    <input type="text" placeholder="Enter Shop Email" name="shop_email" required>

    <label for="psw2"><b>Shop Password</b></label>
    <input type="password" placeholder="Enter Shop Password" name="shop_password" required>

    <button type="submit" class="btn">Add Shop</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
<table class="content-table">
  <thead>
<tr>
    <th>Shop ID</th>
    <th>Shop Name</th>
    <th>Shop Location</th>
</tr>
</thead>


<?php
include "connectdb.php";

$sql = "SELECT * FROM shop_all";

$result = $conn-> query($sql);

if($result->num_rows > 0){
    while($row = $result-> fetch_assoc()){
        echo "<tr><td>".$row["shop_id"]."</td><td>".$row["shop_name"]."</td><td>".$row["shop_location"]."</td></tr>";
        $shop_id2=$row["shop_id"];
        
}
}
else{
    echo "No Result";
} 


$shop_name="";
$shop_location="";
$shop_email="";
$shop_password="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $shop_name = $_POST['shop_name'];
    $shop_location = $_POST['shop_location'];
    $sql1 = "insert into shop_all (shop_id, shop_name, shop_location) VALUES ('', '$shop_name', '$shop_location')";
    $result=mysqli_query($conn, $sql1);
    $shop_email = $_POST['shop_email'];
    $shop_password = $_POST['shop_password'];
    $sql2 = "insert into  logins_shops (shop_id, email_shop, password_shop) VALUES ('$shop_id2', '$shop_email', '$shop_password')";
    $result1=mysqli_query($conn, $sql2);
}



?>
</table>
</body>
</html>