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
background: url(backser.jpg);
background-repeat: no-repeat;
background-position: bottom;
background-attachment: fixed;
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
  padding-right: 90px;
  padding-left: 230px;
  
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
  opacity: 0.6;
  color: black;
}

.flip-card-back {
  background-color: #2980b9;
  color: white;
  transform: rotateY(180deg);
}

.flip-card1 {
  background-color: transparent;
  width: 400px;
  height: 500px;
  perspective: 1000px;
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
  background-color: #bbb;
  color: black;
}

.flip-card-back1 {
  background-color: #2980b9;
  color: white;
  transform: rotateY(180deg);
}

</style>
</head>
<body>




<div class="div1">
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="img_avatar.png" alt="Avatar" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
    <?php

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
    
    <p>Welcome</p>

    <input name="email" type="text" placeholder=" Email" size="40%"><br><br>
    <input name="password" type="text" placeholder=" Password" size="40%">
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
      <img src="img_avatar.png" alt="Avatar" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back1">
    <?php

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
    
    <p>Welcome</p>

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