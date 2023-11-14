<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
* {
  font-family: sans-serif;
}

.content-table {

  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 400px;
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
  padding: 12px 15px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}

tr:hover {
    background-color: #009879;
}
h1{
    text-align: center;
}
form{
    padding-left: 900px;
    padding-top: 30px;
position: fixed;
}

input[type="submit"]{

margin: 2px 10px;
background-color: #009879;
padding: 2px 10px;
color: white;
border: none;
text-align: center;
border-radius: 12px;
}
body{
    padding-left: 25px;
}




</style>


<body>

    <h1>Sapling Transaction</h1>
    <form name="byshopid" method="post">
            <h2>Sort</h2>
            
            <input class="w3-input w3-animate-input" name="shopid" type="number" placeholder=" Enter Shop Name" size="40%"><br>
            <input name="submit" type="submit" value="Sort By Shop ID"> <br> <br>
            <input class="w3-input w3-animate-input" name="custid" type="text" placeholder=" Enter Customer ID" size="40%"><br>
            <input name="submit" type="submit" value="Sort By Customer ID"> <br> <br>
            <input class="w3-input w3-animate-input" name="date" type="text" placeholder=" Enter Date" size="40%"><br>
            <input name="submit" type="submit" value="Sort By Date">
            </form>

    <table class="content-table">
    <thead>
        <tr>
            <th>Customer ID</th>
            <th>Customer Name</th>
            <th>Customer Phone Number</th>
        </tr>
</thead>

</tr>

<?php
include "connectdb.php";






include "connectdb.php";

$sql = "SELECT * FROM customer_info";

$result = $conn-> query($sql);

if($result->num_rows > 0){
    while($row = $result-> fetch_assoc()){
        echo "<tr><td>". $row["customer_id"]. "</td><td>". $row["customer_name"]. "</td><td>". $row["phone_number_customer"]."</td></tr>";       
}
}
else{
    echo "No Result";
} 
?> 

</body>
</html>