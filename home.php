<?php

  if (!isset($_SESSION)) {
    session_start();
  }

  if ($_SESSION['loggedin'] != true) {
    header('Location: index.php');
    session_destroy();
  }

  if ($_POST['logout']) {
    $_SESSION['loggedin'] = "";
    header('Location: index.php');
    session_destroy();
  }
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
  <link rel"stylesheet" href="style.css" />
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
