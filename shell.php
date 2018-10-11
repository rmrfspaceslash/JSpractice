<?php
  $output = shell_exec('ls -lah');
  echo "<pre>$output</pre>";

  $pwd = shell_exec('pwd');
  echo " <pre>$pwd</pre>";

  $check = file_exists("test");
if ($check != null) {
  $checkDir = is_dir("test");
  if ($checkDir) {
    echo "This exists and is a directory!";
  }
  else {
    echo "This exists, but it's not a directory.";
  }
}
else {
  mkdir("test");
}

$test = "test/";
$testarray = scandir("test/");
foreach ($testarray as $key => $value) {
  if ($value == "." || $value == "..") {
    continue;
  }
  echo $value . "<br/>";
}


 ?>
