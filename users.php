<?php

//echo "hello";
//echo "test";
//connect to database
require('dbconnect.php');

//check if session started
if (!isset($_SESSION)) {
  session_start();
}

//Check if logged in
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
}

if ($_POST['id'] != null && $_POST['kill'] != null) {
  $sql = "DELETE FROM users WHERE userid = " . $_POST['id'];
  $result = $conn->query($sql);
}

//create SQL query
$sql = "SELECT * FROM users";

//Execute the SQL query
$result = $conn->query($sql);

//close db connection
$conn->close();

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 <link rel="stylesheet" href="style.css" />
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <div class="container">
         <table class="table" bgcolor="#ffffff">
          <tr class="table">
            <th>User ID</th>
            <th>username</th>
            <th>password hash</th>
            <th colspan="2">Actions</th>
          </tr>
<?php
  //loop through all table records
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
      echo "<td>".$row['userid']."</td>";
      echo "<td>".$row['username']."</td>";
      echo "<td>".$row['password']."</td>";
      echo "<td>
        <form action='edituser.php' method='get'>
          <input type='hidden' value='".$row['userid']."' name='id'>
          <input type='submit' value='edit' name='edit'>
        </form>
        </td>";

      echo "<td>
        <form action='' method='post'>
        <input name='id' type='hidden' value='".$row['userid']."'>
        <input type='submit' value='delete' name='kill'>
        </form>
        </td>";
    echo "</tr>";
  }
?>
          <form action="" method="post">
            <input class="buttons" type="submit" name="users" value="Users" style="font-weight: bold;">
            <input class="buttons" type="submit" name="home" value="Home">
            <?php if ($_POST['users'] != null) {header("Location: home.php"); }?>
          </form>
        </table>
    </div>
   </body>
 </html>
