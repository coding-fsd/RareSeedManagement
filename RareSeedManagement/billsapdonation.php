<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Donation</title>
</head>
<body>
<h1>Bill</h1>
<P>-------------------------------------------</p>
<?php
include "connectdb.php";

$sqlforshopdate = "SELECT transaction_id_sap,shop_id,date_sap,stock_change_sap,sale_total_sap,sd.sap_name FROM transaction_sapling JOIN sapling_details AS sd ON sd.sap_id=transaction_sapling.sap_id WHERE transaction_sapling.sap_id=sd.sap_id ORDER BY transaction_id_sap DESC LIMIT 1 ;";
    $resultforshopdate = $conn-> query($sqlforshopdate);
    if($resultforshopdate->num_rows > 0){
        while($row = $resultforshopdate-> fetch_assoc()){
            echo "Transaction ID: ".$row['transaction_id_sap']."<br>";
            echo "Shop ID: ".$row['shop_id']."<br>";
            echo "Sapling Name: ".$row['sap_name']."<br>";
            echo "Transaction Date: ".$row['date_sap']."<br>";
            $pos = $row['stock_change_sap'];
            $realpos= $pos;
            echo "Quantity: ".$realpos."<br>";
            echo "Total Price: ".$row['sale_total_sap']."<br>";
          
            }
    }


?>
<P>-------------------------------------------</p>
<h2> Thank You Pls Do Not Visit</h2>
<P>-------------------------------------------</p>
</body>
    
</body>
</html>