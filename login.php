<?php

session_start();

if(isset($_SESSION["login"]))

require 'function.php';

$error = false;
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT * FROM user WHERE username = '$username'";
  $result = mysqli_query($koneksi, $query);

  if (mysqli_num_rows($result) > 0) {
    
    if (password_verify($password, $user['password'])) 
    { 
      $_SESSION["login"] = $user["id"];
      header ("location: datamahasiswa.php");
      exit;
    }
  } 

  $eror = true;

}
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LOGIN | WEB INFORMATIKA</title>
  </head>
  <body>
    <h1 style="text-align: left;">LOGIN</h1>
    <?php if ($eror) : ?>
      <p style="color: red;">Usrname/password salah </p> 
      ?>
    <form action="" method="post" enctype="multipart/form-data">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required />
      <br /><br />

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required />
      <br /><br />

      <input type="checkbox" id="remember" name="remember" value="yes" />
      <label for="remember">Remember me</label>
      <br /><br />

      <input type="submit" name="login" value="Login" />
      <p>Belum Punya Akun? <a href="register.html">Daftar</a></p>
    </form>
  </body>
</html>
