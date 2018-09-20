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
       <div class="table">
         <table>
          <tr>
            <th>User ID</th>
            <th>username</th>
            <th>password hash</th>
          </tr>
<?php
  //loop through all table records
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
      echo "<td>".$row['userid']."</td>";
      echo "<td>".$row['username']."</td>";
      echo "<td>".$row['password']."</td>";
    echo "</tr>";
  }
?>
        </table>
      </div>
    </div>
   </body>
 </html>
