<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>
</head>

<body>
    
    
<h1>Bill</h1>
<P>-------------------------------------------</p>
<?php
include "connectdb.php";

$sqlforshopdate = "SELECT transaction_id_seed,shop_id,date_seed,stock_change_seed,sale_total_seed,sd.seed_name FROM transaction_seed JOIN seed_details AS sd ON sd.seed_id=transaction_seed.seed_id WHERE transaction_seed.seed_id=sd.seed_id ORDER BY transaction_id_seed DESC LIMIT 1 ;";
    $resultforshopdate = $conn-> query($sqlforshopdate);
    if($resultforshopdate->num_rows > 0){
        while($row = $resultforshopdate-> fetch_assoc()){
            echo "Transaction ID: ".$row['transaction_id_seed']."<br>";
            echo "Shop ID: ".$row['shop_id']."<br>";
            echo "Seed Name: ".$row['seed_name']."<br>";
            echo "Transaction Date: ".$row['date_seed']."<br>";
            $pos = $row['stock_change_seed'];
            $realpos= $pos * -1;
            echo "Quantity: ".$realpos."<br>";
            echo "Total Price: ".$row['sale_total_seed']."<br>";
          
            }
    }


?>
<P>-------------------------------------------</p>
<h2> Thank You Pls Do Not Visit</h2>
<P>-------------------------------------------</p>
</body>
</html>