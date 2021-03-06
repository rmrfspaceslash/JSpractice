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

    //echo "HELOO HELOO";
    $target_dir = "uploads/".$_SESSION['username']."/";
    echo "$target_dir";
    //echo $_SESSION['username'];

    if (!file_exists("uploads")) {
      mkdir("./uploads");
    }
    //check to see if directory exists
    if (file_exists($target_dir)) {
      $target_file = $target_dir . basename($_FILES['upload']['name']);
      $uploadver = true;
    }else {
      //if uploads directory does not exist, create it
      mkdir($target_dir, 0777, true);
      chmod($target_dir, 0777);
      $target_file = $target_dir . basename($_FILES['upload']['name']);
      $uploadver = true;
    }

  }

  //check if the file is already submitted
  if (file_exists($target_file)) {
    $uploadver = false;
    $ret = true;
    $output = "The file you are trying to upload already exists";
  }

  //get the uploaded file type
  $file_type = $_FILES['upload']['type'];

  //switch statement for the correct file types
/*    case 'image/jpeg':
      $uploadver = true;
      break;
    case 'image/png':
      $uploadver = true;
      break;
    case 'image/gif':
      $uploadver = true;
      break;
    case 'application/pdf':
      $uploadver = true;
      break;
    default:
      $uploadver = false;
      echo "This file type is not supported. Sorry.";
      break;
  } */

  //If file is too large
  //if ($_FILES['upload']['size'] > 1000000) {
  //  echo "Sorry, file is too large";
  //  $uploadver = false;
  //}

  //if file hasnt been uploaded, upload it
  if ($uploadver) {
    move_uploaded_file($_FILES['upload']['tmp_name'], $target_file);
    $_FILES['upload'] = null;
    $uploadver = false;
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
           <input class="buttons" type="submit" name="upload" value="Upload">
           <input class="buttons" type="submit" name="users" value="Users">
           <input class="buttons" type="submit" name="users" value="Home" style="font-weight: bold;">
           <?php if ($_POST['users'] != null) {header("Location: users.php"); }?>
           <input class="buttons" type="submit" name="logout" value="Logout"/>
           <h5><?php if ($ret) {echo $output; } ?></h5>
         </form>
       </div>
    </div>
   </body>
 </html>
