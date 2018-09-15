<?php
  if (!isset($_SESSION)) {
    session_start();
  }

  if ($_SESSION['loggedin'] != true) {
    header('Location: index.php');
  }

  if ($_POST['logout']) {
    $_SESSION['loggedin'] = "";
  }
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Homepage</title>
   </head>
   <body>
     <form action="" method="post">
       <input type="submit" name="logout" value="Logout"/>
     </form>
   </body>
 </html>
