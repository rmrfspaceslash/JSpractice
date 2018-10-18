<?php

//name variables
$cookie_name = "visit";
$cookie_value = mktime();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    //if cookies is or is not set
      if (isset($_COOKIE['visit'])) {
        $seconds = $_COOKIE['visit'];
        $current = mktime();
        $secondsCalc = ($current - $seconds);
        echo "You been here before boy.";
        echo "<br> Your last visit was when - " . date("g:i:s - m/d/y");
        echo "<br> It has been $secondsCalc seconds since you been here boy";
      }
      else {
        echo "This is your first time here.";
        echo "<br>";
      }
      //set timezone
      date_default_timezone_set('America/New_York');
      //set cookies
      setcookie($cookie_name, $cookie_value, time() + (600), "/");
    ?>
  </body>
</html>
