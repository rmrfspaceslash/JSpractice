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
        $_SESSION['fail'] = null;
      }else {
        $_SESSION['fail'] = true;
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>

    <%
      string javahidereg = "\'javahidereg\'"
      string javehide = "\'javehide\'"
    %>

    <div class="container">
      <div class="login" id="javahide">
        <form action="" method="post" name="login">
          <div class="top">
            <h1>Noah's Website</h1>
            <?php if ($_SESSION['fail'] === true){echo "<h5>Please enter a valid username and password</h5>";}?>
            <input class="textbox" type="text" name="username" placeholder="username*"/><br />
            <input class="textbox" type="password" name="password" placeholder="password*"/><br />
          </div>
          <div class="bottom">
            <input class="buttons" type="submit" name="submit" value="Login"/>
            <input class="buttons" type="button" name="register" value="Register" onclick="selectform("'<%=javahidereg %>','<%=javahide %>'")"/>
          </div>
        </form>
      </div>

      <div class="register hidden" id="javahidereg">
        <form action="" method="post" name="login">
          <div class="top">
            <h1>Noah's Website</h1>
            <?php if ($_SESSION['fail'] === true){echo "<h5>Please enter a valid username and password</h5>";}?>
            <input class="textbox" type="text" name="username" placeholder="username*"/><br />
            <input class="textbox" type="password" name="password" placeholder="password*"/><br />
          </div>
          <div class="bottom">
            <input class="buttons" type="submit" name="submit" value="Create Account"/>
            <input class="button" type="submit" name="Login" value="Login" onclick="selectform("'<%=javahide %>','<%=javahidereg %>'")"/>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
