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

  if (isset($_FILES['upload'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES['upload']['name']);
    //echo $target_file;
    $uploadver = true;
  }

  if (file_exists($target_file)) {
    $uploadver = false;
    echo "sorry, file already exists";
    $ret = true;
  }

  if ($uploadver) {
    move_uploaded_file($_FILES['upload']['tmp_name'], $target_file);
  }

  ?>

  <h5 style="color:red;">
    <?php if ($ret) {echo $ret; } ?>
  </h5>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
<link rel="stylesheet" href="style.css" />
   <head>
     <meta charset="utf-8">
     <title>Homepage</title>
   </head>
   <body>
     <div class="container">
       <div class="login">
         <h1>Noah's Website</h1>
         <form action="" method="post">
           <input class="textbox" type="file" name="upload"> <br />
           <input class="buttons" type="submit" name="store" value="upload">
           <input class="buttons" type="submit" name="logout" value="Logout"/>
         </form>
       </div>
    </div>
   </body>
 </html>
