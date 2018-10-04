<?php

//connect to database
$db_user = "noah";
$db_password = "thumbwar";
$db_host = "localhost";
$db_name = "php";

//establish connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if (!$conn) {
  echo "Sorry about your luck";
}

//

?>
