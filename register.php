<?php

  //require database connection before continue
  require('dbconnect.php');
  require('index.js');

  //start session if need to
  if (!isset($_SESSION)) {
    session_start();
  }

  //Match username and password to database
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //assign user inputs to variables
    $username = $_POST['username'];
    //Scrub that username for those bad eggs!
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    //trim whitespace
    $username = trim($username);
    //No slashes permitted here
    $username = stripslashes($username);
    //remove spaces in $username
    $username = str_replace(' ','',$username);
    //grab and encrypt password, need not be cleaned because it is hashed!
    $password = $_POST['password'];

    //encrypt the password
    $password = password_hash($password, PASSWORD_BCRYPT);

    //add entry into database
    $sql = "INSERT INTO users (username,password) VALUES ('$username','$password')";
    $conn->query($sql);
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
            <?php if ($_SESSION['fail'] === true){echo "<h5>Please enter a valid username and password</h5>";}?>
            <input class="textbox" type="text" name="username" placeholder="Please enter a username"/><br />
            <input class="textbox" type="password" name="password" placeholder="Please enter a password"/><br />
          </div>
          <div class="bottom">
            <input class="buttons" type="submit" name="submit" value="Create Account"/>
            Already have an account? <a href="index.php">Log in</a>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
