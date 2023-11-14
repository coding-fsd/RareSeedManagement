<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Shop Login-Page</title>
</head>
<style>
  body {
    background-image: linear-gradient(to bottom, #d1eee9, #d8eff2, #e3eff5, #edf0f4, #ffffff);
            background-repeat: no-repeat;
            background-size: 1500px 1000px;
            padding-top: 80px;
            Overflow: hidden;

  }

  div {
  float: left;
  
  clear: right;
  content: "";
  
}

.div1 {
    display: block;
    border-bottom-left-radius: 7px;
    border-top-left-radius: 7px;
    width: 500px;
    height: 600px;
    background-image: url("shop1.gif");
    background-repeat: no-repeat;
    margin-left: 150px;
}

.div2 {
  background-color: white;
  border-bottom-right-radius: 7px;
  border-top-right-radius: 7px;
  width: 550px;
  height: 449px;
}

p{
  padding-top: 16%;
  margin: 2px 100px;
  font-size: 24px;
  padding-bottom: 5%;
  font-family: Georgia;
  color: #293b29;
}

input[type="text"]{
    margin: 2px 100px;
    background: transparent;
    border: none;
    border-bottom: 2px solid #3c5e3c;
    accent-color: #3c5e3c;
}
input[type="password"]{
    margin: 2px 100px;
    background: transparent;
    border: none;
    border-bottom: 2px solid #3c5e3c;
    accent-color: #3c5e3c;
}
input[type="submit"]{

  margin: 2px 150px;
  background-color: #3c5e3c;
  padding: 2px 90px;
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
    color: #293b29;
    text-decoration: none; 
}
.error {
  color: #FF0000;
  margin: 100px;
}

</style>

<body>







<?php

        include "connectdb.php";
        
        $email = "";
        $password = "";
        $sql3 = "";
        $count=0;
        $invalid="";
        $id="";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $id = $_POST['id'];
            setcookie("id",$id,time() + 3600*24);
            $_COOKIE['id'];
        $sql1 = "SELECT * FROM logins_shops WHERE email_shop='$email' and password_shop='$password'";
        $result = mysqli_query($conn, $sql1);
        $count = mysqli_num_rows($result);
        if($count > 0){
            header("Location: Shop_Dash.php");
            exit;
        }
        else{
            $invalid = "*Invalid Email or Password";
        }
        
        }
    
        
?>

<div class="div1">
      <div class="img1">  
      </div>
    </div>
    <div class="div2"> 
        <span class="error"></span>
      <form name="studentform" method="post">
        <p>Welcome To Planthie </p>
        <input name="id" type="text" placeholder=" Shop ID" size="40%"><br><br>
        <input name="email" type="text" placeholder=" Email" size="40%"><br><br>
        <input name="password" type="password" placeholder=" Password" size="40%">
        <span class="error"><?php echo $invalid; ?></span>
        <br><input name="submit" type="submit" value="Shop Login" >
         
    </form>
    </div>
    
</body>
</html>