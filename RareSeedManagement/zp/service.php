<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
body {
font-family: Arial, Helvetica, sans-serif;
height: 100%;
background: url(test.gif);
background-repeat: no-repeat;
background-position: bottom;

}



div {
  float: left;
  margin-top: 5px;
  clear: right;
  content: "";
}

.div1 {
    display: block;   
}

.div2 {
  
 
}


.flip-card {
  background-color: transparent;
  width: 400px;
  height: 500px;
  perspective: 1000px;
  display: block;
  padding-right: 430px;
  padding-left: 60px;
  padding-top: 30px
  
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #ffffff;
  padding-top: 140px;
  color: black;
}

.flip-card-back {
  background-color: #F9F6E3;
  
  transform: rotateY(180deg);
}

.flip-card1 {
  background-color: transparent;
  width: 400px;
  height: 500px;
  perspective: 1000px;
  padding-top: 30px
}

.flip-card-inner1 {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card1:hover .flip-card-inner1 {
  transform: rotateY(180deg);
}

.flip-card-front1, .flip-card-back1 {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front1 {
  background-color: #ffffff;
  padding-top: 140px;
  color: black;
}

.flip-card-back1 {
  background-color: #F9F6E3;
  
  transform: rotateY(180deg);
}
.height{
  padding-left: 70px;
}


input[type="text"]{
    margin: 2px 40px;
    background: transparent;
    border: none;
    border-bottom: 2px solid #35848B;
    accent-color: #35848B;
}
input[type="submit"]{

  margin: 10px 70px;
  background-color: #35848B;
  padding: 6px 50px;
  color: white;
  border: none;
  text-align: center;
  border-radius: 12px;
}

input::placeholder{
    font-size: medium;
}
a {
    margin: 2px 265px;
    color: #35848B;
    text-decoration: none; 
}
.error {
  color: #FF0000;
  margin: 100px;
}
h2{
  color: #35848B;
  
  font-family:"Times New Roman";
}

</style>
</head>


<body>



<div class="div1">
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
    <img src="t3.png" alt="Avatar" style="width:250px;height:100px;">
      <img src="t2.png" alt="Avatar" style="width:250px;height:100px;">
    </div>
    <div class="flip-card-back">
    <?php
# First Card
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "experiment4";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
        $email = " ";
        $password = " ";
        $sql3 = "";
        $count="";
        $invalid="";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql1 = "SELECT * FROM form_info WHERE email='$email' and password='$password'";
        $result=mysqli_query($conn, $sql1);
        $count=mysqli_num_rows($result);
        if($count>0){
            header("Location: http://localhost/DBMSPRO/Admin_Dash.php");
            exit;
        }
        else{
            $invalid = "*Invalid Email or Password";
        }

        }
        
?>

<form name="studentform" method="post">
    
<h2>Admin Login</h2>
    <div class="height">
      
      <img src="admin.jpg" alt="Avatar" style="width:250px;height:230px;">
    </div>
    <input name="email" type="text" placeholder=" Email" size="40%"><br><br>
    <input name="password" type="text" placeholder=" Password" size="40%"><br>
    <span class="error"><?php echo $invalid; ?></span>
    <br><input name="submit" type="submit" value="Login" > 
</form>
    </div>
  </div>
</div>
</div>

<div class="div2">
<div class="flip-card1">
  <div class="flip-card-inner1">
    <div class="flip-card-front1">
      <img src="t1.png" alt="Avatar" style="width:200px;height:100px;">
      <img src="t2.png" alt="Avatar" style="width:250px;height:100px;">
    </div>
    <div class="flip-card-back1">
    <?php


#second card


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "experiment4";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
        $email = " ";
        $password = " ";
        $sql3 = "";
        $count="";
        $invalid="";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql1 = "SELECT * FROM form_info WHERE email='$email' and password='$password'";
        $result=mysqli_query($conn, $sql1);
        $count=mysqli_num_rows($result);
        if($count>0){
            header("Location: http://localhost/DBMSPRO/Admin_Dash.php");
            exit;
        }
        else{
            $invalid = "*Invalid Email or Password";
        }

        }
        
?>

<form name="studentform" method="post">
    <div class="height">
    <h2>Shop Login</h2>
      <img src="shop.jpg" alt="Avatar" style="width:250px;height:230px;">
    </div>
    <input name="email" type="text" placeholder=" Email" size="40%"><br><br>
    <input name="password" type="text" placeholder=" Password" size="40%">
    <span class="error"><?php echo $invalid; ?></span>
    <br><input name="submit" type="submit" value="Login" > 
</form>
    </div>
  </div>
</div>
</div>


</body>
</html>