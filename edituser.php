<?php

//Check if running session
if (!isset($_SESSION)) {
  session_start();
}

//Check if logged in
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
}


if (isset($_GET['id']) && $_GET['edit'] == "edit") {
  require('dbconnect.php');
  $sql="SELECT * FROM users WHERE userid=".$_GET['id']; //int need not be quoted because they are ints
  $result=$conn->query($sql); //get and store the sql statement results
?>
 <form action="" method="post">
<?php
  while ($row = $result->fetch_assoc()) {
?>
  <input name="userid" type="text" disabled value="<?php echo $row['userid'];?>"> <br>
  <input name="username" type="text" placeholder="<?php echo $row['username'];?>"> <br>
  <input name="password" type="text" placeholder="<?php echo $row['password'];?>"> <br>
  <input name="submit" type="submit" value="change">

<?php
    $olduserid = $row['userid'];
  }
?>
</form>
<?php
}else {
  echo "Sorry, you should not be here.";
}

//check if user changed the username text box
if ($_POST['username'] != null) {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require('dbconnect.php');

    //assign user inputs to variables
    $username = $_POST['username'];
      //add entry into database
      $sql = "UPDATE users SET username = '$username' WHERE userid='$olduserid'";
      $conn->query($sql);

      //testing
      header("Location: users.php");
  }
}
//Check if user changed password text box
if ($_POST['password'] != null) {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require('dbconnect.php');

    //assign user inputs to variables
    $password = $_POST['password'];

    //encrypt the new password
    $password = password_hash($password, PASSWORD_BCRYPT);
      //add entry into database
      $sql = "UPDATE users SET password = '$password' WHERE userid = '$olduserid'";
      $conn->query($sql);

      //testing
      header('Location: users.php');
  }
}
?>
