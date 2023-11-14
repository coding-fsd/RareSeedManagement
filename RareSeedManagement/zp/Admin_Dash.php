<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_Dashboard</title>
</head>

<style>

body{
            
}

@import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  text-decoration: none;
  font-family: 'Josefin Sans', sans-serif;
}

body{
   background-color: #ffffff;
}

.wrapper{
  display: flex;
  position: relative;
}

.wrapper .sidebar{
  width: 200px;
  height: 100%;
  background-image: linear-gradient(to bottom, #d1eee9, #d8eff2, #e3eff5, #edf0f4, #ffffff);
            background-repeat: no-repeat;
            background-size: 1500px 1000px;
  padding: 30px 0px;
  position: fixed;
}

.wrapper .sidebar h2{
  color: green;
  text-transform: uppercase;
  text-align: center;
  margin-bottom: 30px;
}

.wrapper .sidebar ul li{
  padding: 20px;
  border-bottom: 100px green;
  border-bottom: 1px #20272B;
  border-top: 1px #20272B;
}    

.wrapper .sidebar ul li a{
  color: #20272B;
  display: block;
}

.wrapper .sidebar ul li a .fas{
  width: 25px;
}

.wrapper .sidebar ul li:hover{
  background-color: green;
}

 

.wrapper .main_content{
  width: 100%;
  margin-left: 200px;
}

.wrapper .main_content .header{
  padding: 20px;
  background: #ffffff;
  color: #20272B;
  border-bottom: 1px solid #20272B;
}

.wrapper .main_content .info{
  margin: 20px;
  color: #20272B;
  line-height: 25px;
}

.wrapper .main_content .info div{
  margin-bottom: 20px;
}

.button {
  position: absolute;
  right: 10px;
  top: 15px;
  border-radius: 4px;
  background-color: green;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 20px;
  padding: 10px;
  width: 150px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  
  background-color: #f1f1f1;
}
h3{
    color: green;
}

</style>

<body>

<div class="wrapper">
    <div class="sidebar">
        <h2><img src="logo2.png" alt="Logo"></h2>
        <ul>
            <li><a href="Shop_list.php"><i class="fas fa-home"></i>Shop List</a></li>
            <li><a href="Sapling.php"><i class="fas fa-user"></i>Sapling Transaction</a></li>
            <li><a href="Seed.php"><i class="fas fa-user"></i>Seed Transaction</a></li>
            <li><a href="Stock.php"><i class="fas fa-address-card"></i>Stock</a></li>
            <li><a href="Customer.php"><i class="fas fa-project-diagram"></i>Customer</a></li>
        </ul> 
    </div>
    <div class="main_content">
        <div class="header">
        <h1>Admin Dashboard<a href="testhome.html"><button class="button"><span>Logout</span></button></a> </h1>
        
    </div>
    
        <div class="info">
        <div class="row">

  
  <div class="column">
    <div class="card">
      <h3>Total Seed Sale</h3>
      <?php
        include "connectdb.php";

            $sql = "SELECT SUM(sale_total_seed) FROM transaction_seed ;";

            $result = $conn-> query($sql);

            if($result->num_rows > 0){
                while($row = $result-> fetch_assoc()){
                    echo implode(" ",$row);
                }       
        }
        else{
                echo "No Result";
                } 
    ?>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <h3>Total Sapling Sale</h3>
      <?php
        include "connectdb.php";

            $sql = "SELECT SUM(sale_total_sap) FROM transaction_sapling ;";

            $result = $conn-> query($sql);

            if($result->num_rows > 0){
                while($row = $result-> fetch_assoc()){
                    echo implode(" ",$row);
                }       
        }
        else{
                echo "No Result";
                } 
    ?>
    </div>
  </div>
  <div class="column">
    <div class="card">
      <h3>Total Customer</h3>
      <?php
        include "connectdb.php";

            $sql = "SELECT COUNT(customer_id) FROM customer_info;";

            $result = $conn-> query($sql);

            if($result->num_rows > 0){
                while($row = $result-> fetch_assoc()){
                    echo implode(" ",$row);
                }       
        }
        else{
                echo "No Result";
                } 
    ?>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <h3>Total Shop</h3>
      <?php
        include "connectdb.php";

            $sql = "SELECT COUNT(shop_id) FROM shop_all;";

            $result = $conn-> query($sql);

            if($result->num_rows > 0){
                while($row = $result-> fetch_assoc()){
                    echo implode(" ",$row);
                }       
        }
        else{
                echo "No Result";
                } 
    ?>
      
    </div>
  </div>
</div>
          
    </div>
    </div>
</div>

    
</body>
</html>