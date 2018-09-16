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

  //if upload is triggered, store the file
  if ($_FILES['upload'] != null) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES['upload']['name']);
    echo $target_file;
    $uploadver = true;
  }

  //check if the file is already submitted
  if (file_exists($target_file)) {
    $uploadver = false;
    $ret = true;
    $output = "sorry, file already exists";
  }

  //if file hasnt been uploaded, upload it
  if ($uploadver) {
    move_uploaded_file($_FILES['upload']['tmp_name'], $target_file);
    $_FILES['upload'] = null;
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
     <div class="container">
       <div class="login">
         <h1>Noah's Website</h1>
         <form action="" method="post" enctype="multipart/form-data">
           <input class="textbox" type="file" name="upload"> <br />
           <input class="buttons" type="submit" name="store" value="Upload">
           <input class="buttons" type="submit" name="logout" value="Logout"/>
           <h5><?php if ($ret) {echo $output; } ?></h5>
         </form>
       </div>
    </div>
   </body>
 </html>
