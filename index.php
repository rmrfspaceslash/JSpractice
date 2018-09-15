<?php

  //require database connection before continue
  require('dbconnect.php');
  require('index.js');

  //start session if need to
  if (!isset($_SESSION)) {
    session_start();
  }

  //Match username and password to database
  if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //create query for username and password match
    $sql = "SELECT username, password FROM users WHERE username = '$username'";

    //get results from query
    $result = $conn->query($sql);

    //extract results from query and set login variable if succeed else error
    while ($row = $result->fetch_assoc()) {
      if ($username === $row['username'] && password_verify($password, $row['password'])) {
        $_SESSION['loggedin'] = true;
      }else {
        <script>alert("Hello");</script> 
      }
    }

    if ($_SESSION['loggedin'] === true) {
      header('Location: home.php');
    }
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" href="style.css" />
  <head>
    <meta charset="utf-8">
    <title>login</title>
  </head>
  <body>
    <div class="container">
      <div class="login">
        <form action="" method="post">
          <div class="top">
            <h1>Noah's Website</h1>
            <input class="textbox" type="text" name="username" placeholder="username*"/><br />
            <input class="textbox" type="password" name="password" placeholder="password*"/><br />
          </div>
          <div class="bottom">
            <input class="buttons" type="submit" name="submit" value="Login"/>
            <input class="buttons" type="submit" name="register" value="Register"/>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
