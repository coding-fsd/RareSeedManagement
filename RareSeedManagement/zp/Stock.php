<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock</title>
</head>
<body>
<style>

<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

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
  text-align: left;
  color: green;
}
span{
    padding-left: 430px;
}

.float-container {
    padding: 10px;
}
.t1{
    width: 50%;
    float: left;
    padding: 10px;
    
}
h1{
    padding-left:40px;
}





</style>


<body>
<h1>Sapling Stock  <span>Seed Stock</span></h1>

<div class="float-container">
<div class="t1">
<table class="content-table">
  <thead>
  <tr>
    <th>Sapling ID</th>
    <th>Shop ID</th>
    <th>Sapling Stock</th>
    <th>Shop Email</th>
</tr>
</thead>


<?php
include "connectdb.php";

$sql = "SELECT sap_id,stock_sap,ls.shop_id,ls.email_shop FROM stock_sapling AS ss JOIN logins_shops AS ls on ss.shop_id;";

$result = $conn-> query($sql);

if($result->num_rows > 0){
    while($row = $result-> fetch_assoc()){
        echo "<tr><td>".$row["sap_id"]."</td><td>".$row["shop_id"]."</td><td>".$row["stock_sap"]."</td><td>".$row["email_shop"]."</td></tr>";
        $shop_id2=$row["shop_id"];
}
}
else{
    echo "No Result";
}
?>
</table>
</div>


<div class="t1">
<table class="content-table">
  <thead>
  <tr>
    <th>Seed ID</th>
    <th>Shop ID</th>
    <th>Sapling Stock</th>
    <th>Shop Email</th>
</tr>
</thead>


<?php
include "connectdb.php";

$sql = "SELECT seed_id,seed_stock,ls.shop_id,ls.email_shop FROM stock_seed AS ss JOIN logins_shops AS ls on ss.shop_id";

$result = $conn-> query($sql);

if($result->num_rows > 0){
    while($row = $result-> fetch_assoc()){
        echo "<tr><td>".$row["seed_id"]."</td><td>".$row["seed_stock"]."</td><td>".$row["shop_id"]."</td><td>".$row["email_shop"]."</td></tr>";
        $shop_id2=$row["shop_id"];
}
}
else{
    echo "No Result";
}
?>
</table>
</div>
</div>
</body>
</html>