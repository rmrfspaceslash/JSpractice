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
  <input type="text" disabled value="<?php $row['userid'];?>">
<?php
  }
}else {
  echo "Sorry, you should not be here.";
}
?>
