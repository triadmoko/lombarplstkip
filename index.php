<?php 
  $conn = mysqli_connect("localhost","root","","rpl");

session_start();

if (isset($_POST["login"])) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username ='$username'");
  // cek username
  if (mysqli_num_rows($result) === 1) {

    // cek password
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    if (password_verify($password, $row["password"])) {

      // set session
      $_SESSION["login"] = true;
      $_SESSION['id'] = $row['id'];
      $user = $_SESSION['id'];
      

      header("Location: alert/index.php");
      exit;
    }
      echo "<script>
          alert('Password anda salah !');
          </script>";
  }

  $error = true;
}




 ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>LogIn Form</title>
  <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Hind:300' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="login-button">
  <img src="img/login-w-icon.png">
  </img>
</div>
<div id="container">
  <h1>Log In</h1>
  <span class="close-btn">
    <img src="img/black-close-icon-3.png"></img>
  </span>

  <form action="" method="POST">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" name="login" value="Login">

</form>
</div>


<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>

</body>
</html>
