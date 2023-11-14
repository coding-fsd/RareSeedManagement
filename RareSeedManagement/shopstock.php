<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Stock</title>
</head>
<style>
    body{
            background-image: linear-gradient(to bottom, #d1eee9, #d8eff2, #e3eff5, #edf0f4, #ffffff);
            background-repeat: no-repeat;
            background-size: 1500px 1000px;
            padding-top: 80px;
            padding-left: 80px;
    }

    * {
  font-family: sans-serif; /* Change your font family */
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
   
    padding-right: 80px;
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

    </style>

<body>
<form name="byshopid" method="post">
            <h2>Search Stock</h2>
            
            <input class="w3-input w3-animate-input" name="seedname" type="text" placeholder=" Enter Seed Name" size="40%"><br>
            <input name="submit" type="submit" value="Search">
            </form>

<table class="content-table">
    <thead>
        <tr>
            <th>Shop ID</th>
            <th>Shop Name</th>
            <th>Shop Location</th>
            <th>Seed ID</th>
            <th>Seed Stock</th>
            <th>Seed Name</th>
        </tr>
</thead>

</tr>


<?php
include "connectdb.php";
$seedname="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $seedname= $_POST['seedname'];

    $sql1 = "SELECT ss.seed_id,sd.seed_name,ss.shop_id,sa.shop_name,ss.seed_stock,sa.shop_location FROM stock_seed AS ss, seed_details AS sd,shop_all AS sa WHERE sd.seed_id=ss.seed_id AND sa.shop_id=ss.shop_id and sd.seed_name = '$seedname';";
    $result = mysqli_query($conn, $sql1);
    if($result->num_rows > 0){
        while($row = $result-> fetch_assoc()){
            echo "<tr><td>" . $row["shop_id"]. "</td><td>". $row["shop_name"]. "</td><td>". $row["shop_location"]. "</td><td>". $row["seed_id"]. "</td><td>". $row["seed_stock"]. "</td><td>". $row["seed_name"]. "</td></tr>";       
    }
}else{
        echo "No Result";
    }
    }

?>


<?php
include "connectdb.php";

            $cookie="";
                if(isset($_COOKIE['id'])) {
                    $cookie=$_COOKIE['id'];
                
               } else {
                    echo "Cookie is set!<br>";
               }

$sql = "SELECT ss.seed_id,sd.seed_name,ss.shop_id,sa.shop_name,ss.seed_stock,sa.shop_location FROM stock_seed AS ss, seed_details AS sd,shop_all AS sa WHERE sd.seed_id=ss.seed_id AND sa.shop_id=ss.shop_id;";

$result = $conn-> query($sql);

if($result->num_rows > 0){
    while($row = $result-> fetch_assoc()){
        echo "<tr><td>" . $row["shop_id"]. "</td><td>". $row["shop_name"]. "</td><td>". $row["shop_location"]. "</td><td>". $row["seed_id"]. "</td><td>". $row["seed_stock"]. "</td><td>". $row["seed_name"]."</td></tr>";       
}
}
else{
    echo "No Result";
} 
?>
    
</body>
</html>