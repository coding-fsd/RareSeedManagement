<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seed Order</title>
</head>
    <style>
        body{
        background-image: linear-gradient(to bottom, #d1eee9, #d8eff2, #e3eff5, #edf0f4, #ffffff);
        background-repeat: no-repeat;
        background-size: 1500px 1000px;
        }
        h1{
            text-align: center;
        }
        </style>
<body>
    <h1>Seed Order</h1>
    <style>
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

    <form name="byshopid" method="post">
            <h2>Take Order</h2>
            
            <input class="w3-input w3-animate-input" name="seedid" type="number" placeholder=" Enter Seed ID" size="40%"><br>
            <input class="w3-input w3-animate-input" name="custid" type="text" placeholder=" Enter Customer ID" size="40%"><br>
            <input class="w3-input w3-animate-input" name="seedqty" type="text" placeholder=" Enter Seed Quantity" size="40%"><br>
            <input name="submit" type="submit" value="Generate Bill">
            </form>

    <table class="content-table">
    <thead>
        <tr>
            <th>Seed ID</th>
            <th>Seed Name</th>
            <th>Seed Cost</th>
            <th>Seed Stock</th>

        </tr>
</thead>

</tr>

<?php
include "connectdb.php";
$seedid="";
$custid="";
$seedqty="";
$cookie="";
                if(isset($_COOKIE['id'])) {
                    $cookie=$_COOKIE['id'];
                    
               } else {
                    echo "Cookie is set!<br>";
               }
  

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $seedid= $_POST['seedid'];
    $custid= $_POST['custid'];
    $seedqty= $_POST['seedqty'];

    $sql1 = "SELECT seed_stock FROM stock_seed WHERE seed_id=$seedid AND shop_id=$cookie;";
    $result = mysqli_query($conn, $sql1);
    if($result->num_rows > 0){
        while($row = $result-> fetch_assoc()){
            $stockcheck = $row["seed_stock"];       
    }

    $checkqty = $stockcheck - $seedqty;
    if( $stockcheck < $seedqty){
        echo "Not Enough Seeds";
    }

    $sql1 ="SELECT customer_id,customer_name FROM customer_info WHERE customer_id=$custid;";
    $result = mysqli_query($conn, $sql1);

        $count = mysqli_num_rows($result);
        if($count > 0){

            $dataqty = -$seedqty;
            $sql = "SELECT cost_seed FROM seed_details WHERE seed_id = $seedid;";
            $result = $conn-> query($sql);
            
            if($result->num_rows > 0){
                while($row = $result-> fetch_assoc()){
                    $seedcst = $row["cost_seed"];       
            }
        }
           $rate= $seedcst * $seedqty;
           $sql3 = "INSERT INTO transaction_seed VALUES ('','$cookie', '$seedid', '$custid',curdate(), '$dataqty', '$rate');";
            if ($conn->query($sql3) === TRUE) {
                header("Location: Billseed.php");
                
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
        }
        else{
             echo "Customer ID Not found";
        }
    
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

$sql = "SELECT d.seed_id,d.seed_name,d.cost_seed,s.seed_stock FROM stock_seed AS s JOIN seed_details AS d ON d.seed_id = s.seed_id WHERE s.shop_id='$cookie';";

$result = $conn-> query($sql);

if($result->num_rows > 0){
    while($row = $result-> fetch_assoc()){
        echo "<tr><td>" . $row["seed_id"]. "</td><td>". $row["seed_name"]. "</td><td>". $row["cost_seed"]. "</td><td>". $row["seed_stock"]. "</td></tr>";       
}
}
else{
    echo "No Result";
} 
?>
    
</body>
</html>