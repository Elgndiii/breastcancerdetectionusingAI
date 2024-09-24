<?php include 'connection.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <style media="screen">
    *,
*:before,
*:after{
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
body{
  background-color: #080710;
}
body {
  background-color: #f5f5f5;
  font-family: 'Poppins', sans-serif;
}

.background {
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  z-index: -1;
}

.background .shape {
  height: 200px;
  width: 200px;
  position: absolute;
  border-radius: 50%;
}

.shape:first-child {
  background: linear-gradient(#ff9bb3, #cb798c);
  left: -80px;
  top: -80px;
}

.shape:last-child {
  background: linear-gradient(to right, #ed88f8, #f304eb);
  right: -30px;
  bottom: -80px;
}

form {
  width: 360px;
  background-color: rgba(255, 255, 255, 0.9);
  border-radius: 10px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  padding: 40px;
  margin: 80px auto;
}

form * {
  color: #333;
}

form h3 {
  font-size: 28px;
  font-weight: 600;
  text-align: center;
  margin-bottom: 30px;
}

label {
  display: block;
  margin-top: 20px;
  font-size: 16px;
  font-weight: 500;
}

input {
  height: 40px;
  width: 100%;
  background-color: #f9f9f9;
  border: 1px solid #ddd;
  border-radius: 5px;
  padding: 0 10px;
  margin-top: 8px;
  font-size: 14px;
}

button {
  margin-top: 30px;
  width: 100%;
  background-color: #d224cf;
  color: #fff;
  padding: 12px 0;
  font-size: 18px;
  font-weight: 600;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.social {
  margin-top: 20px;
  display: flex;
  justify-content: center;
}

.social div {
  width: 150px;
  border-radius: 3px;
  padding: 10px;
  background-color: #3b5998;
  color: #fff;
  text-align: center;
  margin: 0 10px;
  cursor: pointer;
}

.social div:nth-child(1) {
  background-color: #ea4335;
}

.social div:hover {
  opacity: 0.8;
}

.social i {
  margin-right: 4px;
}


  </style>
</head>
<body>
  <div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
  </div>
  <form action="login.php">
    <h3>Login Here</h3>

    <label for="username">Email</label>
    <input type="text" placeholder="Email or Phone" id="email" name="email">

    <label for="password">Password</label>
    <input type="password" placeholder="Password" id="password"  name="pass">

    <button>Login</button>

  </form>
  <?php

  $r=$y->query("SELECT * FROM tbl_customers");
  while ($row=$r->fetch_array(MYSQLI_ASSOC)){
    

    if(isset($_GET['email'])==true && $_GET['email']==$row['email'] && isset($_GET['pass'])==true && $_GET['pass']==$row['pass']  )
    {
         header("Location: index.php?id=".$row['id']); 
    }
  }
  ?>


  </body>
</html>