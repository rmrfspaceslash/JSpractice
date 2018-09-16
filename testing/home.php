<?php

  //start session
  if (!isset($_SESSION)) {
    session_start();
  }

  //check user is logged in
  if ($_SESSION['loggedin'] != true) {
    header('Location: index.php');
    session_destroy();
  }

  //control logout button
  if ($_POST['logout']) {
    $_SESSION['loggedin'] = "";
    header('Location: index.php');
    session_destroy();
  }

  ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
<link rel="stylesheet" href="style.css" />
   <head>
     <meta charset="utf-8">
     <title>Homepage</title>
   </head>
   <body>
     <div class="menucontainer">
       <div class="menu">
         <h1>Noah's Website</h1>
         <form action="" method="post">
           <input class="buttons" type="submit" name="upload">
           <input class="buttons" type="submit" name="store" value="Upload">
           <input class="buttons" type="submit" name="logout" value="Logout"/>
           <hr></hr>
         </form>
       </div>
    </div>
   </body>
 </html>
